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

echo && echo -e "${CBLUE}*** Current branch ***${CEND}"
if [ -n "${CI_COMMIT_REF_NAME}" ]; then
    echo "${CI_COMMIT_REF_NAME}"
else
    git branch | grep "^* "
fi

echo && echo -e "${CBLUE}*** Check bash version ***${CEND}"
if (! bash --version); then
    echo -e "${CYELLOW}bash version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check shellcheck version ***${CEND}"
if (! shellcheck --version); then
    echo -e "${CYELLOW}shellcheck version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check shellcheck version ***${CEND}"
if (! shellcheck --version); then
    echo -e "${CYELLOW}shellcheck version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check dos2unix version ***${CEND}"
if (! dos2unix --version); then
    echo -e "${CYELLOW}dos2unix version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check xz version ***${CEND}"
if (! xz --version); then
    echo -e "${CYELLOW}xz version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check rsync version ***${CEND}"
if (! rsync --version); then
    echo -e "${CYELLOW}rsync version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check yamllint version ***${CEND}"
if (! yamllint --version); then
    echo -e "${CYELLOW}yamllint version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check php-fpm7.3 version ***${CEND}"
if (! php-fpm7.3 --version); then
    echo -e "${CYELLOW}php-fpm7.3 version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check pylint version ***${CEND}"
if (! pylint --version); then
    echo -e "${CYELLOW}pylint version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

echo && echo -e "${CBLUE}*** Check pylint3 version ***${CEND}"
if (! pylint3 --version); then
    echo -e "${CYELLOW}pylint3 version:${CEND} ${CRED}Failed${CEND}"
    nReturn=$((nReturn + 1))
fi

export nReturn

##################### LAST LINE ######################################
