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

# gfnValidateMail
if (! gfnValidateMail 'toulousain79@github.com'); then
    echo -e "${CYELLOW}gfnValidateMail${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    echo -e "${CYELLOW}gfnValidateMail${CEND} ${CGREEN}Passed${CEND}"
fi

# gfnValidateIP
[ -z "$(gfnValidateIP 192.168.0.1)" ] && nReturn=$((nReturn + 1))
[ -n "$(gfnValidateIP 192.168.0.333)" ] && nReturn=$((nReturn + 1))
if [ -z "$(gfnValidateIP 192.168.0.1)" ] || [ -n "$(gfnValidateIP 192.168.0.333)" ]; then
    echo -e "${CYELLOW}gfnValidateIP${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    echo -e "${CYELLOW}gfnValidateIP${CEND} ${CGREEN}Passed${CEND}"
fi

# gfnStatistics
gfnStatistics
if [ ! -f "${MySB_InstallDir}"/statistics ] || (! grep -q '77ae4c9263e68f87596f9a57b6cab4870102e8af0e88eaf3de660deed69df673' "${MySB_InstallDir}"/statistics); then
    echo -e "${CYELLOW}gfnStatistics${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
else
    echo -e "${CYELLOW}gfnStatistics${CEND} ${CGREEN}Passed${CEND}"
fi

export nReturn

##################### LAST LINE ######################################
