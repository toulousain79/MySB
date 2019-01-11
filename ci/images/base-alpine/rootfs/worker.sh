#!/bin/bash

# Entrypoint for utilizing as a worker pool instead of a web server
# Based on configuration, can run multiple instances of a single worker process

SUPERVISOR_CONF=/etc/supervisor/conf.d/worker.conf
SERVICES_D=/etc/services.d

# Signal to init processes to avoid any webserver startup
export CONTAINER_ROLE='worker'

# Begin startup sequence
/init.sh

STATUS=$?  # Captures exit code from script that was run

# TODO this exit code detection is also present in run.sh, needs to be combined
if [[ $STATUS == $SIGNAL_BUILD_STOP ]]
then
  echo "[worker] container exit requested"
  exit # Exit cleanly
fi

if [[ $STATUS != 0 ]]
then
  echo "[worker] failed to init"
  exit $STATUS
fi


WORKER_QUANTITY=$1

# Rebuild worker command as properly escaped parameters from shifted input args
# @see http://stackoverflow.com/questions/7535677/bash-passing-paths-with-spaces-as-parameters
shift
WORKER_COMMAND="$@"

if [ -z "$WORKER_COMMAND" ]
then
  echo "[worker] command is required, exiting"
  exit 1
fi

echo "[worker] command: '${WORKER_COMMAND}' quantity: ${WORKER_QUANTITY}"

for i in `seq 1 $WORKER_QUANTITY`;
do
  SERVICE_FOLDER="${SERVICES_D}/worker-${i}"
  mkdir $SERVICE_FOLDER
  echo "\
#!/usr/bin/execlineb -P

with-contenv
s6-setuidgid ${NOT_ROOT_USER}
${WORKER_COMMAND}" > "${SERVICE_FOLDER}/run"
done

# Start process manager
echo "[run] starting process manager"
exec /init

