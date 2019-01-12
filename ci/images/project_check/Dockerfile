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
######################################################################
#### Arguments (outside of a build stage)
ARG REGISTRY_IMAGE

##### Base image
FROM ${REGISTRY_IMAGE}/base-debian/base-debian:latest

#### Arguments (inside of a build stage)
ARG PROJECT_NAMESPACE
ARG PROJECT_NAME
ARG BUILD_DATE
ARG BUILD_VERSION
ARG BUILD_REF
ARG PROJECT_NAME
ARG PROJECT_DESCRIPTION
ARG PROJECT_URL

#### Metadata
LABEL maintainer=${PROJECT_NAMESPACE} \
	org.label-schema.build-date=${BUILD_DATE} \
	org.label-schema.build-version=${BUILD_VERSION} \
	org.label-schema.build-ref=${BUILD_REF} \
	org.label-schema.name=${PROJECT_NAME} \
	org.label-schema.description=${PROJECT_DESCRIPTION} \
	org.label-schema.url=${PROJECT_URL} \
	org.label-schema.vendor='MySB - '${PROJECT_NAMESPACE} \
	org.label-schema.usage=${PROJECT_URL}'/blob/'${BUILD_VERSION}'/cd/docker/README.md' \
	org.label-schema.changelog-url=${PROJECT_URL}'/blob/'${BUILD_VERSION}'/cd/docker/Changelog.md'

#### Environment variables
ENV PKG_BASE="php7.0-fpm dos2unix yamllint python3-pkg-resources pylint pylint3 xz-utils" \
	PKG_TEMP="curl openssl ca-certificates"

#### Copy files
COPY ./rootfs /tmp/rootfs

#### Scripts
RUN cp -rv /tmp/rootfs/* /

#### Install
RUN apt-get update -o 'Acquire::Check-Valid-Until=false' \
    && apt-get install -y --assume-yes -q -f -V -o Dpkg::Options::="--force-confold" --no-install-recommends ${PKG_BASE} ${PKG_TEMP}

#### Shellcheck
RUN curl --retry 3 -k -L -S -o /tmp/shellcheck-stable.linux.x86_64.tar.xz https://storage.googleapis.com/shellcheck/shellcheck-stable.linux.x86_64.tar.xz \
	&& tar --xz -xvf /tmp/shellcheck-stable.linux.x86_64.tar.xz -C /tmp/ \
	&& cp /tmp/shellcheck-stable/shellcheck /usr/local/bin/shellcheck \
	&& chmod -v +x /usr/local/bin/shellcheck

#### Cleaning
RUN bash /scripts/99-clean.bsh

#### Goss validation
RUN /usr/local/bin/goss -g /goss.base.yaml validate
