#!/bin/bash
# ----------------------------------
#  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___
#   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_
#	_\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_
#	 _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__
#	  _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_
#	   _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_
#		_\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_
#		 _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__
#		  _\///______________\///___\////__________\///////////_____\/////////////_____
#			By toulousain79 ---> https://github.com/toulousain79/
#
######################################################################
#
#	Copyright (c) 2013 toulousain79 (https://github.com/toulousain79/)
#	Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
#	The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
#	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
#	IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
#	--> Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
#
##################### FIRST LINE #####################################

nReturn=${nReturn}

if [ "${CHECK_METHOD}" == "full" ]; then
    [[ ${nReturn} -gt 0 ]] && exit "${nReturn}"

    if [ -z "${vars}" ] || [ "${vars}" -eq 0 ]; then
        # shellcheck source=ci/check/00-load_vars.bsh
        source "$(dirname "$0")/00-libs.bsh"
    else
        nReturn=${nReturn}
    fi

    gfnCopyProject

    #### Replace systemctl
    sFilesList="$(grep -IRl "systemctl " --exclude-dir ".git" --exclude-dir ".vscode" --exclude-dir "ci" --exclude-dir "lang" --exclude-dir "logrotate" --exclude-dir "web" "${MySB_InstallDir}/")"
    if [ -n "${sFilesList}" ]; then
        echo && echo -e "${CBLUE}*** Replace all systemctl commands ***${CEND}"
        for sFile in ${sFilesList}; do
            nRes=0
            while read -r sROW; do
                ## DO NOT REMOVE FOLLOWING ELSE LOOP WILL FAILING !!!
                echo "${sROW}" >/dev/null

                sColumns=()
                for sString in ${sROW}; do
                    sColumns+=("${sString}")
                done

                nCount=0
                for ((col = nCount; col <= ${#sColumns[@]}; col++)); do
                    (! grep -q '^systemctl' <<<"${sColumns[${col}]}") && {
                        /bin/true
                        continue
                    }

                    nCount=${col}

                    [[ ${nCount} -gt 0 ]] && {
                        /bin/true
                        break
                    }
                done

                nCount=$((nCount + 1))
                sSwitch="${sColumns[${nCount}]}"
                nCount=$((nCount + 1))
                sService="${sColumns[${nCount}]//.service/}"

                if (grep -q 'daemon-reload' <<<"${sROW}"); then
                    # echo "${sFile}: systemctl daemon-reload --> #systemctl daemon-reload"
                    (! sed -i -e "s/systemctl daemon-reload/#systemctl daemon-reload/g" "${sFile}") && {
                        /bin/true
                        ((nRes++))
                    }
                elif (grep -q 'systemctl reboot' <<<"${sROW}"); then
                    # echo "${sFile}: systemctl reboot --> #systemctl reboot"
                    (! sed -i -e "s/systemctl reboot/#systemctl reboot/g" "${sFile}") && {
                        /bin/true
                        ((nRes++))
                    }
                elif (grep -q ' disable' <<<"${sROW}"); then
                    # echo "${sFile}: systemctl disable ${sService} --> update-rc.d ${sService} disable"
                    (! sed -i -e "s/systemctl disable ${sService}/update-rc.d ${sService} disable/g" "${sFile}") && {
                        /bin/true
                        ((nRes++))
                    }
                elif (grep -q ' enable' <<<"${sROW}"); then
                    # echo "${sFile}: systemctl enable ${sService} --> update-rc.d ${sService} enable"
                    (! sed -i -e "s/systemctl enable ${sService}/update-rc.d ${sService} enable/g" "${sFile}") && {
                        /bin/true
                        ((nRes++))
                    }
                else
                    # echo "${sFile}: systemctl ${sSwitch} ${sService} --> service ${sService} ${sSwitch}"
                    (! sed -i -e "s/systemctl ${sSwitch} ${sService}/service ${sService} ${sSwitch}/g" "${sFile}") && {
                        /bin/true
                        ((nRes++))
                    }
                fi
            done < <(grep 'systemctl ' "${sFile}")

            # shellcheck disable=SC2181
            if [[ ${nRes} -eq 0 ]]; then
                echo -e "${CYELLOW}${sFile}:${CEND} ${CGREEN}Passed${CEND}"
            else
                echo -e "${CYELLOW}${sFile}:${CEND} ${CRED}Failed${CEND}"
                nReturn=$((nReturn + 1))
            fi
        done
    fi

    [[ ${nReturn} -gt 0 ]] && exit "${nReturn}"

    #### Install packages (standard)
    echo && echo -e "${CBLUE}*** MySB - Install needed Debian packages ***${CEND}"
    # aAllPackages=()
    # MySB_Install_Packages="$(grep -rni 'TOOLS=' "${MySB_InstallDir}"/install/MySB_Install.bsh | awk -F'[(|)]' '{print $2}')"
    # for sPackage in ${MySB_Install_Packages}; do
    #     aAllPackages+=("${sPackage}")
    # done
    # apt-get update
    # apt-get -y --assume-yes install "${aAllPackages[@]}"
    bash "${MySB_InstallDir}/install/MySB_Install.bsh" 'fr'

    #### Install MySQL
    # echo && echo -e "${CBLUE}*** MySB - ${MySB_InstallDir}/install/MySQL ***${CEND}"
    # bash "${MySB_InstallDir}/install/MySQL" 'INSTALL'

    # if (! cmdMySQL 'MySB_db' "UPDATE system SET mysb_version='${gsCurrentVersion}' WHERE id_system='1';" -v); then
    #     nReturn=$((nReturn + 1))
    # fi
    # if (! cmdMySQL 'MySB_db' "INSERT INTO users (users_ident,users_email,language,admin) VALUES ('MySB','MySB','${EnvLang}','1');" -v); then
    #     nReturn=$((nReturn + 1))
    # fi
    # if (! cmdMySQL 'MySB_db' "UPDATE users SET users_passwd='${gsMainUserPassword}' WHERE admin='1';" -v); then
    #     nReturn=$((nReturn + 1))
    # fi

    # sFilesListBash="$(grep -IRl "\(#\!/bin/\|shell\=\)bash" --exclude-dir ".git" --exclude-dir ".vscode" --exclude-dir "ci" "${MySB_InstallDir}/")"
    # sFilesList="${sFilesListSh} ${sFilesListBash}"
    # if [ -n "${sFilesList}" ]; then
    #     echo && echo -e "${CBLUE}*** Check scripts with 'set -n' ***${CEND}"
    #     for file in ${sFilesList}; do
    #         sed -i '/includes_before/d' "${file}"
    #         sed -i '/includes_after/d' "${file}"

    #         if (bash "${file}"); then
    #             echo -e "${CYELLOW}${file}:${CEND} ${CGREEN}Passed${CEND}"
    #         else
    #             echo -e "${CYELLOW}${file}:${CEND} ${CRED}Failed${CEND}"
    #             nReturn=$((nReturn + 1))
    #         fi
    #     done
    # fi
fi

export nReturn

##################### LAST LINE ######################################
