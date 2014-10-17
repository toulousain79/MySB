#!/bin/bash 
# -----------------------------------------
source /etc/MySB/inc/includes_before
# -----------------------------------------
#  __/\\\\____________/\\\\___________________/\\\\\\\\\\\____/\\\\\\\\\\\\\___        
#   _\/\\\\\\________/\\\\\\_________________/\\\/////////\\\_\/\\\/////////\\\_       
#    _\/\\\//\\\____/\\\//\\\____/\\\__/\\\__\//\\\______\///__\/\\\_______\/\\\_      
#     _\/\\\\///\\\/\\\/_\/\\\___\//\\\/\\\____\////\\\_________\/\\\\\\\\\\\\\\__     
#      _\/\\\__\///\\\/___\/\\\____\//\\\\\________\////\\\______\/\\\/////////\\\_    
#       _\/\\\____\///_____\/\\\_____\//\\\____________\////\\\___\/\\\_______\/\\\_   
#        _\/\\\_____________\/\\\__/\\_/\\\______/\\\______\//\\\__\/\\\_______\/\\\_  
#         _\/\\\_____________\/\\\_\//\\\\/______\///\\\\\\\\\\\/___\/\\\\\\\\\\\\\/__ 
#          _\///______________\///___\////__________\///////////_____\/////////////_____
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

#### LOGs
if [ ! -d /etc/MySB/web/logs/scripts ]; then
	mkdir -p /etc/MySB/web/logs/scripts
fi
if [ ! -d /etc/MySB/web/logs/nginx ]; then
	mkdir -p /etc/MySB/web/logs/nginx
fi
if [ ! -d /etc/MySB/web/logs/security ]; then
	mkdir -p /etc/MySB/web/logs/security
fi
mv /etc/MySB/web/logs/NginX-* /etc/MySB/web/logs/nginx/
mv /etc/MySB/web/logs/PeerGuardian-* /etc/MySB/web/logs/security/
mv /etc/MySB/web/logs/install/*.sh-log.html /etc/MySB/web/logs/scripts/

#### Blocklist.sh
crontab -l > /tmp/crontab.tmp
sed -i '/BlockList.sh/d' /tmp/crontab.tmp
echo "0 23 * * * /bin/bash /etc/MySB/scripts/BlockList.sh NoBanner" >> /tmp/crontab.tmp
crontab /tmp/crontab.tmp
rm /tmp/crontab.tmp

#### Seedbox-Manager
LISTUSERS=`ls /etc/MySB/users/ | grep '.info' | sed 's/.\{5\}$//'`
for seedUser in $LISTUSERS; do
	sed -i '/OpenVPN/d' /usr/share/nginx/html/seedbox-manager/conf/users/$seedUser/config.ini
done

#### Correcting SSL vulnerability (poodle) for Nginx and Postfix
perl -pi -e "s/ssl_protocols SSLv3 TLSv1 TLSv1.1 TLSv1.2;/ssl_protocols TLSv1 TLSv1.1 TLSv1.2;/g" /etc/nginx/nginx.conf
echo "smtpd_tls_mandatory_protocols = !SSLv2,!SSLv3" >> /etc/postfix/main.cf
echo "smtpd_tls_protocols = !SSLv2,!SSLv3" >> /etc/postfix/main.cf
echo "smtp_tls_protocols = !SSLv2,!SSLv3" >> /etc/postfix/main.cf

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################