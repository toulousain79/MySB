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
# https://hub.docker.com/r/_/alpine/
# https://github.com/just-containers/s6-overlay#usage
######################################################################
#### Arguments (outside of a build stage)
ARG PROJECT_NAMESPACE
ARG PROJECT_NAME

##### Base image
FROM alpine:latest

#### Arguments (inside of a build stage)
ARG PROJECT_NAMESPACE
ARG PROJECT_NAME
ARG BUILD_DATE
ARG BUILD_VERSION
ARG BUILD_REF
ARG PROJECT_NAME
ARG PROJECT_DESCRIPTION
ARG PROJECT_URL

#### Environment variables
# Use in multi-phase builds, when an init process requests for the container to gracefully exit, so that it may be committed
# Used with alternative CMD (worker.sh), leverages supervisor to maintain long-running processes
ENV PROJECT_NAMESPACE=${PROJECT_NAMESPACE} \
	PROJECT_NAME=${PROJECT_NAME} \
	BUILD_DATE=${BUILD_DATE} \
	BUILD_VERSION=${BUILD_VERSION} \
	BUILD_REF=${BUILD_REF} \
	PROJECT_DESCRIPTION=${PROJECT_DESCRIPTION} \
	PROJECT_URL=${PROJECT_URL} \
	S6_KILL_GRACETIME=3000 \
	S6_KILL_FINISH_MAXTIME=5000 \
	S6_BEHAVIOUR_IF_STAGE2_FAILS=2 \
	SIGNAL_BUILD_STOP=99 \
	PKG_BASE="bash tzdata" \
	PKG_TEMP="curl mlocate libcap bind-tools"

#### Metadata
LABEL maintainer=${PROJECT_NAMESPACE} \
	org.label-schema.build-date=${BUILD_DATE} \
	org.label-schema.build-version=${BUILD_VERSION} \
	org.label-schema.build-ref=${BUILD_REF} \
	org.label-schema.name=${PROJECT_NAME} \
	org.label-schema.description=${PROJECT_DESCRIPTION} \
	org.label-schema.url=${PROJECT_URL} \
	org.label-schema.vendor="MySB - ${PROJECT_NAMESPACE}" \
	org.label-schema.usage="${PROJECT_URL}/blob/${BUILD_VERSION}/cd/docker/README.md" \
	org.label-schema.changelog-url="${PROJECT_URL}/blob/${BUILD_VERSION}/cd/docker/Changelog.md"

#### Copy files
COPY ./rootfs /tmp/rootfs

#### Scripts
RUN cp -rv /tmp/rootfs/* / \
	&& chmod +x /tmp/rootfs/scripts/*.bsh \
	&& chmod +x /usr/local/bin/*

#### APK
# - Add additional repositories to pull packages from
# - Add S6 for zombie reaping, boot-time coordination, signal transformation/distribution: @see https://github.com/just-containers/s6-overlay#known-issues-and-workarounds
# - Add goss for local, serverspec-like testing
RUN echo '@edge http://dl-cdn.alpinelinux.org/alpine/edge/testing' >> /etc/apk/repositories \
	&& apk update \
	&& apk upgrade \
	&& apk fix \
	&& apk --no-cache add ${PKG_BASE} ${PKG_TEMP}

#### S6 Overlay
# https://github.com/gliderlabs/docker-alpine/issues/11#issuecomment-106233554
RUN echo 'hosts: files mdns4_minimal [NOTFOUND=return] dns mdns4' > /etc/nsswitch.conf \
	&& sLatestUrl=$(curl --retry 3 -k -L -S https://api.github.com/repos/just-containers/s6-overlay/releases/latest | grep 'browser_' | grep 'amd64' | grep -v '.sig' | cut -d '"' -f4) \
	&& curl --retry 3 -k -L -S -o /tmp/s6-overlay-amd64.tar.gz ${sLatestUrl} \
	&& tar zxvf /tmp/s6-overlay-amd64.tar.gz -C /

#### Goss
# Add goss for local, serverspec-like testing
RUN sLatestUrl=$(curl --retry 3 -k -L -S https://api.github.com/repos/aelsabbahy/goss/releases/latest | grep 'browser_' | grep 'amd64' | grep -v '.sig' | cut -d '"' -f4) \
	&& curl --retry 3 -k -L -S -o /usr/local/bin/goss ${sLatestUrl} \
	&& chmod -v +x /usr/local/bin/goss

#### Cleaning
RUN bash /scripts/99-clean.bsh

#### END
# NOTE: intentionally NOT using s6 init as the entrypoint
# This would prevent container debugging if any of those service crash
CMD ["/bin/bash"]
