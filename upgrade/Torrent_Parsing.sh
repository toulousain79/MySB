#!/bin/bash

source /opt/MySB/inc/vars
# shellcheck source=/dev/null
source ${MySB_InstallDir}/inc/funcs_by_script/funcs_MySB_CreateUser

# cmdMySQL 'MySB_db' "DELETE FROM torrents;" -v
# cmdMySQL 'MySB_db' "DELETE FROM trackers_list;" -v

sRequestValues="$(cmdMySQL 'MySB_db' "SELECT public_tracker_allow,annoncers_udp,annoncers_check FROM system WHERE id_system='1';" | sed 's/\t/|/g;')"
sTrackerModeAllowed="$(echo "$sRequestValues" | awk '{split($0,a,"|"); print a[1]}')"
bAnnoncersUdp="$(echo "$sRequestValues" | awk '{split($0,a,"|"); print a[2]}')"
bAnnoncersCheck="$(echo "$sRequestValues" | awk '{split($0,a,"|"); print a[3]}')"

gfnListCountUsers 'normal'
for sUser in ${gsUsersList}; do
    echo

    # Start rTorrent session
    gfnManageServices stop "rtorrent-${sUser}"
    gfnManageServices start "rtorrent-${sUser}"

    #### VARs
    nCgiPort="$(cmdMySQL 'MySB_db' "SELECT scgi_port FROM users WHERE users_ident='${sUser}';")"
    sDownloadList="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} download_list \"\"")"
    sDownloadList="$(echo "${sDownloadList}" | sed -e "s/,//g;s/'//g;s/\[//g;s/\]//g;" | tr '[:upper:]' '[:lower:]')"
    sTempSessionsFile="$(mktemp /tmp/${gsScriptName}.${sUser}.XXXXXXXXXX)"

    find /home/${sUser}/rtorrent/.session/ -name '*.torrent' -type f >"${sTempSessionsFile}"
    # Delete empty lines
    sed -i '/^$/d' "${sTempSessionsFile}"
    while [ -s "${sTempSessionsFile}" ]; do
        while IFS= read -r sTorrentLoaded; do
            # Get torrent infos
            sInfoHash="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Hash: ' | awk '{printf $2}')"
            sName="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Name: ')"
            sName="$(echo "${sName}" | sed -e "s/Name: //g;s/'/\\\'/g;")"
            sPrivacy="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Privacy: ' | awk '{printf $2}' | tr '[:upper:]' '[:lower:]')"
            su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.open ${sInfoHash} >/dev/null"

            # Functions
            function fnCleaning() {
                sed -i "/$(echo "${sInfoHash}" | tr '[:lower:]' '[:upper:]')/d" "${sTempSessionsFile}"
                continue
            }

            # Check if hash is in download list
            (! grep -qi "${sInfoHash}" <<<"${sDownloadList}") && {
                rm -fv "/home/${sUser}/rtorrent/.session/${sInfoHash}"*
                continue
            }

            # Don't waiting after check hash, next
            [ "$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.get_hashing ${sInfoHash}")" -ne 0 ] && continue

            # Get vars
            sBasePath="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.base_path ${sInfoHash}")"
            sBasePath="$(echo "${sBasePath}" | sed -e "s/'/\\\'/g;")"
            sDirectory="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.directory ${sInfoHash}")"
            sDirectory="$(echo "${sDirectory}" | sed -e "s/'/\\\'/g;")"
            nLeftBytes="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.get_left_bytes ${sInfoHash}")"
            bState="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.state ${sInfoHash}")"
            sLabel="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.custom1 ${sInfoHash} 2>/dev/null")"
            isStart="$(su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.custom5 ${sInfoHash} 2>/dev/null" | cut -d ':' -f 1)"

            echo "################################################################################"
            echo "SCGI port: ${nCgiPort}"
            echo "Name: ${sName}"
            echo "Hash: ${sInfoHash}"
            echo "State: ${bState}"
            echo "Left bytes: ${nLeftBytes}"
            echo "Base path: ${sBasePath}"
            echo "Directory: ${sDirectory}"
            [ -n "${sLabel}" ] && echo "sLabel: ${sLabel}"
            echo "Is start: ${isStart}" | sed 's/0/NO/g;' | sed 's/1/YES/g;'
            echo "Annoncer check: ${bAnnoncersCheck}" | sed 's/0/NO/g;' | sed 's/1/YES/g;'
            echo "Annoncer UDP: ${bAnnoncersUdp}" | sed 's/0/NO/g;' | sed 's/1/YES/g;'
            echo "Tracker privacy: ${sPrivacy}"
            echo "Trackers allowed: ${sTrackerModeAllowed}"
            echo "Torrent loaded: ${sTorrentLoaded}"
            echo "--------------"
            bClean=0
            [ -z "${nCgiPort}" ] && bClean=1
            [ -z "${sInfoHash}" ] && bClean=1
            [ -z "${sName}" ] && bClean=1
            [ -z "${sPrivacy}" ] && bClean=1
            [ -z "${sBasePath}" ] && bClean=1
            ([ -z "${sTorrentLoaded}" ] || [ ! -f "${sTorrentLoaded}" ]) && bClean=1
            ([ -z "${sDirectory}" ] || [ ! -d "${sDirectory}" ]) && bClean=1

            # Remove hash from file list
            [ "${bClean}" -eq 1 ] && fnCleaning

            #### Step 1 - List & count annoncers
            declare -A aAnnoncers
            aAnnoncersUdp=()
            aAnnoncersIpv=()
            aAnnoncersHttp=()
            aAnnoncersHttps=()
            nCountAnnoncers=0
            nId=0
            for sAnnoncer in $(transmission-show "${sTorrentLoaded}" | grep 'udp://\|http://\|https://' | grep -v 'Magnet URI' | grep -v 'Comment' | sed -e 's/ //g;'); do
                if (grep -q 'udp://' <<<"${sAnnoncer}"); then
                    [[ ${bAnnoncersUdp} -eq 1 ]] && nEnable=1 || nEnable=0
                    ((nCountAnnoncers++))
                    aAnnoncersUdp+=("${sAnnoncer}")
                    aAnnoncers[${nId}]="t${nId} ${nEnable}"
                    echo "${sAnnoncer}"
                    ((nId++))
                    continue
                elif (grep -q 'ipv6' <<<"${sAnnoncer}"); then
                    ((nCountAnnoncers++))
                    aAnnoncersIpv+=("${sAnnoncer}")
                    aAnnoncers[${nId}]="t${nId} 0"
                    echo "${sAnnoncer}"
                    ((nId++))
                    continue
                elif (grep -q 'http://' <<<"${sAnnoncer}"); then
                    ((nCountAnnoncers++))
                    aAnnoncersHttp+=("${sAnnoncer}")
                    aAnnoncers[${nId}]="t${nId} 1"
                    echo "${sAnnoncer}"
                    ((nId++))
                    continue
                elif (grep -q 'https://' <<<"${sAnnoncer}"); then
                    ((nCountAnnoncers++))
                    aAnnoncersHttps+=("${sAnnoncer}")
                    aAnnoncers[${nId}]="t${nId} 1"
                    echo "${sAnnoncer}"
                    ((nId++))
                    continue
                else
                    ((nId++))
                fi
            done
            echo "There is ${nCountAnnoncers} annoncer(s) in ${sTorrentLoaded}"
            echo "UDP: ${#aAnnoncersUdp[*]}"
            echo "IPv6: ${#aAnnoncersIpv[*]}"
            echo "HTTP: ${#aAnnoncersHttp[*]}"
            echo "HTTPs: ${#aAnnoncersHttps[*]}"
            echo "--------------"
            if [ "${nCountAnnoncers}" -eq 0 ]; then
                su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.stop ${sInfoHash}"
                su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.close ${sInfoHash}"
                fnCleaning
            else
                nCountAnnoncers=$((nCountAnnoncers - ${#aAnnoncersIpv[@]}))
                [[ ${bAnnoncersUdp} -eq 0 ]] && nCountAnnoncers=$((nCountAnnoncers - ${#aAnnoncersUdp[@]}))
                if [ "${nLeftBytes}" -eq 0 ]; then
                    if [ -z "$(cmdMySQL 'MySB_db' "SELECT id_torrents FROM torrents WHERE info_hash='${sInfoHash}' AND name='${sName}' AND tree='${sBasePath}';")" ]; then
                        cmdMySQL 'MySB_db' "INSERT INTO torrents (info_hash,name,privacy,state,tree) VALUES ('${sInfoHash}', '${sName}', '${sPrivacy}', 'completed', '${sBasePath}');" -v
                    else
                        cmdMySQL 'MySB_db' "UPDATE torrents SET state='completed' WHERE info_hash='${sInfoHash}' AND tree='${sBasePath}'" -v
                    fi
                fi
            fi

            #### Step 2 - Disable UDP & IPv6 annoncers
            bCleaned=0
            for ((i = 0; i < ${#aAnnoncers[@]}; i++)); do
                nId="$(echo "${aAnnoncers[${i}]}" | awk '{printf $1}')"
                bState="$(echo ${aAnnoncers[${i}]} | awk '{printf $2}')"
                if [ "${bState}" -eq 0 ]; then
                    su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} t.is_enabled.set ${sInfoHash}:${aAnnoncers[${i}]} >/dev/null"
                    bCleaned=1
                else
                    [[ ${bAnnoncersCheck} -eq 1 ]] && cmdMySQL 'MySB_db' "INSERT INTO annoncers (scgi_port,info_hash,id,user) VALUES ('${nCgiPort}', '${sInfoHash}', '${nId}', '${sUser}');" --verbose
                fi
            done
            if [ ${bCleaned} -eq 1 ]; then
                echo "Cleaning annoncers completed !"
                echo "--------------"
            fi

            #### Step 3 - Prepare annoncers (HTTP & HTTPs) list for GetTrackersCert.bsh script
            if [[ ${bAnnoncersCheck} -eq 1 ]]; then
                bExecute=0
                sTempLocalFile="$(mktemp)"
                for sAnnoncer in "${aAnnoncersHttps[@]}"; do
                    if [ -n "${sAnnoncer}" ]; then
                        sProto="$(echo "${sAnnoncer}" | grep '://' | sed -e's,^\(.*://\).*,\1,g')"
                        [ -z "${sProto}" ] && sProto="https://"
                        sShortAnnouncer=$(echo "${sAnnoncer}" | sed -e s,${sProto},,g)
                        sUrlUser="$(echo "${sShortAnnouncer}" | grep @ | cut -d@ -f1)"
                        sShortAnnouncer=$(echo "${sShortAnnouncer}" | sed -e s,${sUrlUser}@,,g | cut -d/ -f1)
                        if (! grep -q "${sAnnoncer}" <<<${sTempLocalFile}); then
                            echo "${nCountAnnoncers}|${sInfoHash}|${sPrivacy}|${nCgiPort}|${sShortAnnouncer}|${sAnnoncer}" >>${sTempLocalFile}
                            bExecute=1
                        fi
                    fi
                done
                for sAnnoncer in "${aAnnoncersHttp[@]}"; do
                    if [ -n "${sAnnoncer}" ]; then
                        sProto="$(echo "${sAnnoncer}" | grep '://' | sed -e's,^\(.*://\).*,\1,g')"
                        [ -z "${sProto}" ] && sProto="http://"
                        sShortAnnouncer=$(echo "${sAnnoncer}" | sed -e s,${sProto},,g)
                        sUrlUser="$(echo "${sShortAnnouncer}" | grep @ | cut -d@ -f1)"
                        sShortAnnouncer=$(echo "${sShortAnnouncer}" | sed -e s,${sUrlUser}@,,g | cut -d/ -f1)
                        if (! grep -q "${sAnnoncer}" <<<${sTempLocalFile}); then
                            echo "${nCountAnnoncers}|${sInfoHash}|${sPrivacy}|${nCgiPort}|${sShortAnnouncer}|${sAnnoncer}" >>${sTempLocalFile}
                            bExecute=1
                        fi
                    fi
                done
                if [[ ${bAnnoncersUdp} -eq 1 ]]; then
                    for sAnnoncer in "${aAnnoncersUdp[@]}"; do
                        if [ -n "${sAnnoncer}" ]; then
                            sProto="$(echo "${sAnnoncer}" | grep '://' | sed -e's,^\(.*://\).*,\1,g')"
                            [ -z "${sProto}" ] && sProto="udp://"
                            sShortAnnouncer=$(echo "${sAnnoncer}" | sed -e s,${sProto},,g)
                            sUrlUser="$(echo "${sShortAnnouncer}" | grep @ | cut -d@ -f1)"
                            sShortAnnouncer=$(echo "${sShortAnnouncer}" | sed -e s,${sUrlUser}@,,g | cut -d/ -f1)
                            if (! grep -q "${sAnnoncer}" <<<${sTempLocalFile}); then
                                echo "${nCountAnnoncers}|${sInfoHash}|${sPrivacy}|${nCgiPort}|${sShortAnnouncer}|${sAnnoncer}" >>${sTempLocalFile}
                                bExecute=1
                            fi
                        fi
                    done
                fi
                sort ${sTempLocalFile} | uniq -u >>"/home/.check_annoncers_${sUser}"
                rm -f ${sTempLocalFile}
            fi

            ( [[ ${bAnnoncersCheck} -eq 0 ]] && [[ ${isStart} -eq 1 ]] ) && su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.start ${sInfoHash}"
            [[ ${bAnnoncersCheck} -eq 0 ]] && su -s /bin/bash "${sUser}" -c "xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} session.save ${sInfoHash}"

            # Remove hash from file list
            sed -i "/$(echo "${sInfoHash}" | tr '[:lower:]' '[:upper:]')/d" "${sTempSessionsFile}"
            # Delete empty lines
            sed -i '/^$/d' "${sTempSessionsFile}"
        done <"${sTempSessionsFile}"

        if [ -s "/home/.check_annoncers_${sUser}" ] && [[ ${bExecute} -eq 1 ]]; then
            sudo /bin/bash "${MySB_InstallDir}/scripts/GetTrackersCert.bsh" USER "${sUser}" "${sInfoHash}" &
        fi
    done
    rm "${sTempSessionsFile}"
    /bin/bash /home/"${sUser}"/.rTorrent_tasks.sh 'quota'
done
