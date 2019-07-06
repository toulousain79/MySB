#!/bin/bash

source /opt/MySB/inc/vars
# shellcheck source=/dev/null
source ${MySB_InstallDir}/inc/funcs_by_script/funcs_MySB_CreateUser

cmdMySQL 'MySB_db' "DELETE FROM torrents;" -v
cmdMySQL 'MySB_db' "DELETE FROM trackers_list;" -v

gfnListCountUsers 'normal'
for sUser in ${gsUsersList}; do
    echo

    # Start rTorrent session
    gfnManageServices stop "rtorrent-${sUser}"
    gfnManageServices start "rtorrent-${sUser}"

    #### VARs
    nCgiPort="$(cmdMySQL 'MySB_db' "SELECT scgi_port FROM users WHERE users_ident='${sUser}';")"
    sDownloadList="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} download_list "" 2>/dev/null)"
    sDownloadList="$(echo "${sDownloadList}" | sed -e 's/,//g;' | sed -e "s/'//g;" | sed -e 's/\[//g;' | sed -e 's/\]//g;' | tr '[:upper:]' '[:lower:]')"

    find /home/${sUser}/rtorrent/.session/ -name '*.torrent' -type f >/tmp/sessions
    while IFS= read -r sTorrentLoaded; do
        # Get torrent infos
        sInfoHash="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Hash: ' | awk '{printf $2}')"
        sName="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Name: ')"
        sName="$(echo "${sName}" | sed -e 's/Name: //g;' | sed -e "s/'/\\\'/g;")"
        sPrivacy="$(transmission-show "${sTorrentLoaded}" | grep -m 1 'Privacy: ' | awk '{printf $2}' | tr '[:upper:]' '[:lower:]')"
        xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.open ${sInfoHash} >/dev/null 2>&1

        # Check if hash is in download list
        (! grep -qi "${sInfoHash}" <<<"${sDownloadList}") && {
            rm -fv "/home/${sUser}/rtorrent/.session/${sInfoHash}"*
            continue
        }

        # Waiting after check hash
        while [ "$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.get_hashing ${sInfoHash} 2>/dev/null)" -ne 0 ]; do
            echo "Waiting after checking hash of ${sInfoHash}"
            sleep 1
        done

        sBasePath="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.base_path ${sInfoHash} 2>/dev/null)"
        sBasePath="$(echo "${sBasePath}" | sed -e "s/'/\\\'/g;")"
        sDirectory="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.directory ${sInfoHash} 2>/dev/null)"
        sDirectory="$(echo "${sDirectory}" | sed -e "s/'/\\\'/g;")"
        nLeftBytes="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.get_left_bytes ${sInfoHash} 2>/dev/null)"
        bState="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.state ${sInfoHash} 2>/dev/null)"

        echo
        echo "--------------------"
        echo "SCGI port: ${nCgiPort}"
        echo "File: ${sTorrentLoaded}"
        echo "Hash: ${sInfoHash}"
        echo "Name: ${sName}"
        echo "Privacy: ${sPrivacy}"
        echo "Base path: ${sBasePath}"
        echo "Directory: ${sDirectory}"
        echo "Left bytes: ${nLeftBytes}"
        echo "State: ${bState}"
        echo "--------------------"

        [ -z "${nCgiPort}" ] && continue
        [ -z "${sInfoHash}" ] && continue
        [ -z "${sName}" ] && continue
        [ -z "${sPrivacy}" ] && continue
        [ -z "${sBasePath}" ] && continue
        ([ -z "${sTorrentLoaded}" ] || [ ! -f "${sTorrentLoaded}" ]) && continue
        ([ -z "${sDirectory}" ] || [ ! -d "${sDirectory}" ]) && continue

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
                nEnable=1
                ((nCountAnnoncers++))
                aAnnoncersUdp+=("${sAnnoncer}")
                aAnnoncers[${nId}]="t${nId} ${nEnable}"
                echo "${sAnnoncer}"
                ((nId++))
                continue
            elif (grep -q 'ipv6' <<<"${sAnnoncer}"); then
                nEnable=0
                ((nCountAnnoncers++))
                aAnnoncersIpv+=("${sAnnoncer}")
                aAnnoncers[${nId}]="t${nId} ${nEnable}"
                echo "${sAnnoncer}"
                ((nId++))
                continue
            elif (grep -q 'http://' <<<"${sAnnoncer}"); then
                nEnable=1
                ((nCountAnnoncers++))
                aAnnoncersHttp+=("${sAnnoncer}")
                aAnnoncers[${nId}]="t${nId} ${nEnable}"
                echo "${sAnnoncer}"
                ((nId++))
                continue
            elif (grep -q 'https://' <<<"${sAnnoncer}"); then
                nEnable=1
                ((nCountAnnoncers++))
                aAnnoncersHttps+=("${sAnnoncer}")
                aAnnoncers[${nId}]="t${nId} ${nEnable}"
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
            xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.stop ${sInfoHash} >/dev/null 2>&1
            xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.close ${sInfoHash} >/dev/null 2>&1
        else
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
            bState="$(echo ${aAnnoncers[${i}]} | awk '{printf $2}')"
            if [ "${bState}" -eq 0 ]; then
                xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} t.is_enabled.set ${sInfoHash}:${aAnnoncers[${i}]} >/dev/null 2>&1
                bCleaned=1
            fi
        done
        if [ ${bCleaned} -eq 1 ]; then
            echo "Cleaning annoncers completed !"
            echo "--------------"
        fi

        #### Step 3 - Prepare annoncers (HTTP & HTTPs) list for GetTrackersCert.bsh script
        bExecute=0
        for sAnnoncer in "${aAnnoncersHttps[@]}" "${aAnnoncersHttp[@]}" "${aAnnoncersUdp[@]}"; do
            if [ -n "${sAnnoncer}" ]; then
                if (! grep -q "${sAnnoncer}" <<</home/.check_annoncers_${sUser}); then
                    echo "${sAnnoncer}|${sPrivacy}" >>"/home/.check_annoncers_${sUser}"
                    bExecute=1
                fi
            fi
        done
        [ "${bExecute}" -eq 1 ] && /bin/bash "${MySB_InstallDir}/scripts/GetTrackersCert.bsh" USER "${sUser}" &>/dev/null

        if [ "${#aAnnoncersHttp[*]}" -gt 0 ] || [ "${#aAnnoncersHttps[*]}" -gt 0 ]; then
            #### Step 4 - Wait after annoncers check
            while [ -s "/home/.check_annoncers_${sUser}" ]; do
                echo "Waiting for '/home/.check_annoncers_${sUser}'"
                sleep 1
            done
            echo "--------------"

            #### Step 5 - Restore validated annoncers
            for ((i = 0; i < ${#aAnnoncers[@]}; i++)); do
                nId="$(echo ${aAnnoncers[${i}]} | awk '{printf $1}')"
                bState="$(echo ${aAnnoncers[${i}]} | awk '{printf $2}')"
                if [ "${bState}" -eq 1 ]; then
                    sGetUrl="$(xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} t.url ${sInfoHash}:${nId} 2>/dev/null)"
                    echo "sGetUrl: xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} t.url ${sInfoHash}:${nId} 2>/dev/null"
                    if [ -n "${sGetUrl}" ]; then
                        echo "Checking: ${sGetUrl}"

                        # extract the protocol
                        sProto="$(echo "${sGetUrl}" | grep '://' | sed -e's,^\(.*://\).*,\1,g')"
                        [ -z "${sProto}" ] && sProto="http://"
                        # remove the protocol
                        sURL=$(echo "${sGetUrl}" | sed -e s,${sProto},,g)
                        sProto="${sProto//:\/\//}"
                        echo "  Protocol: ${sProto}"
                        echo "  URL: ${sURL}"
                        # extract the user (if any)
                        sUrlUser="$(echo "${sURL}" | grep @ | cut -d@ -f1)"
                        # extract the host and port
                        sHostPort=$(echo "${sURL}" | sed -e s,${sUrlUser}@,,g | cut -d/ -f1)
                        echo "  Host & Port: ${sHostPort}"
                        # by request host without port
                        sHost="$(echo "${sHostPort}" | sed -e 's,:.*,,g')"
                        echo "  Host: ${sHost}"
                        # by request - try to extract the port
                        sPort="$(echo "${sHostPort}" | sed -e 's,^.*:,:,g' -e 's,.*:\([0-9]*\).*,\1,g' -e 's,[^0-9],,g')"
                        case ${sPort#[-+]} in
                            *[!0-9]* | '')
                                case "${sProto}" in
                                    'http' | 'udp') sPort=80 ;;
                                    'https')        sPort=443 ;;
                                esac
                                ;;
                        esac
                        echo "  Port: ${sPort}"
                        # extract the path (if any)
                        sURI="$(echo "${sURL}" | grep '/' | cut -d/ -f2-)"
                        echo "  URI: ${sURI}"

                        # Get if activate
                        bIsActive="$(cmdMySQL 'MySB_db' "SELECT is_active FROM trackers_list WHERE tracker='${sHost}' AND tracker_proto='${sProto}' AND tracker_port='${sPort}';")"
                        bIsActive="${bIsActive:-1}"
                        xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} t.is_enabled.set ${sInfoHash}:${nId} ${bIsActive} >/dev/null 2>&1
                        [ "${bIsActive}" -eq 1 ] && sResult="Enabled" || sResult="Disabled"
                        echo "${sResult}: ${sGetUrl}"
                    else
                        echo "sGetUrl is empty !!!"
                    fi
                fi
            done
            [ "${#aAnnoncers[@]}" -gt 0 ] && echo "--------------"
        fi

        #### Step 6 - Copy back torrent loaded & start it
        [ "${nCountAnnoncers}" -gt 0 ] && sAction=("d.open") || sAction=("d.close")
        xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} "${sAction[@]}" ${sInfoHash} >/dev/null 2>&1
        [ "${nCountAnnoncers}" -gt 0 ] && xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.start ${sInfoHash} >/dev/null 2>&1
        xmlrpc2scgi.py -p scgi://localhost:${nCgiPort} d.save_full_session ${sInfoHash} >/dev/null 2>&1
    done </tmp/sessions
    rm /tmp/sessions

    /bin/bash /home/"${sUser}"/.rTorrent_tasks.sh 'quota'
done
