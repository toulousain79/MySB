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

echo && echo -e "${CBLUE}*** Check global variables ***${CEND}"

# sProjectDir
if [ -z "${sProjectDir}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${sProjectDir}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$sProjectDir:${CEND} ${sValue}"

# sDirToScan
if [ -z "${sDirToScan}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${sDirToScan}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$sDirToScan:${CEND} ${sValue}"

# MySB_InstallDir
if [ -z "${MySB_InstallDir}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${MySB_InstallDir}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$MySB_InstallDir:${CEND} ${sValue}"

# MySB_Files
if [ -z "${MySB_Files}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${MySB_Files}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$MySB_Files:${CEND} ${sValue}"

# EnvLang
if [ -z "${EnvLang}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${EnvLang}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$EnvLang:${CEND} ${sValue}"

# gsCurrentVersion
if [ -z "${gsCurrentVersion}" ]; then
    sValue="${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    sValue="${CGREEN}${gsCurrentVersion}${CEND}"
fi
echo -e "${CYELLOW}Secret Variable \$gsCurrentVersion:${CEND} ${sValue}"

if [ -f /.dockerenv ]; then
    echo && echo -e "${CBLUE}*** Check GitLab CI Secret Variables ***${CEND}"

    # CI_PROJECT_PATH
    if [ -z "${CI_PROJECT_PATH}" ]; then
        sValue="${CRED}Failed${CEND}"
        nReturn=$((nReturn + 1))
    else
        sValue="${CGREEN}${CI_PROJECT_PATH}${CEND}"
    fi
    echo -e "${CYELLOW}Secret Variable \$CI_PROJECT_PATH:${CEND} ${sValue}"

    # CHECK_METHOD
    if [ -z "${CHECK_METHOD}" ]; then
        sValue="${CRED}Failed${CEND}"
        nReturn=$((nReturn + 1))
    else
        sValue="${CGREEN}${CHECK_METHOD}${CEND}"
    fi
    echo -e "${CYELLOW}Secret Variable \$CHECK_METHOD:${CEND} ${sValue}"
fi

export nReturn

##################### LAST LINE ######################################
