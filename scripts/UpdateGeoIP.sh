#!/bin/bash 
# ----------------------------------
source /etc/MySB/inc/includes_before
# ----------------------------------
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

if [ -f /etc/MySB/files/GeoIP.dat.gz ]; then
	rm -f /etc/MySB/files/GeoIP.dat.gz
fi
if [ -f /etc/MySB/files/GeoIPv6.dat.gz ]; then
	rm -f /etc/MySB/files/GeoIPv6.dat.gz
fi
if [ -f /etc/MySB/files/GeoLiteCity.dat.gz ]; then
	rm -f /etc/MySB/files/GeoLiteCity.dat.gz
fi

cd /etc/MySB/files/
wget http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz
wget http://geolite.maxmind.com/download/geoip/database/GeoIPv6.dat.gz
wget http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz

if [ -f /etc/MySB/files/GeoIP.dat.gz ]; then
	gunzip GeoIP.dat.gz
	cp -f GeoIP.dat /usr/share/GeoIP/GeoIP.dat
	rm GeoIP.dat
fi
if [ -f /etc/MySB/files/GeoIPv6.dat.gz ]; then
	gunzip GeoIPv6.dat.gz
	cp -f GeoIPv6.dat /usr/share/GeoIP/GeoIPv6.dat
	rm  GeoIPv6.dat
fi
if [ -f /etc/MySB/files/GeoLiteCity.dat.gz ]; then
	gunzip GeoLiteCity.dat.gz
	cp -f GeoLiteCity.dat /usr/share/GeoIP/GeoIPCity.dat
	cp -f GeoLiteCity.dat /usr/share/GeoIP/GeoLiteCity.dat
	rm GeoLiteCity.dat
fi

# -----------------------------------------
source /etc/MySB/inc/includes_after
# -----------------------------------------
##################### LAST LINE ######################################