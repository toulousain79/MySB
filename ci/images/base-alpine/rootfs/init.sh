#!/bin/bash

RUN_SCRIPTS=/run.d
STATUS=0

# Run shell scripts (ending in .sh) in run.d directory

# When .sh run scripts fail (exit non-zero), container run will fail
# NOTE: if a .sh script exits with 99, this is a stop signal, container must exit cleanly

if ls ${RUN_SCRIPTS}/*.sh &>/dev/null
then
  for file in $RUN_SCRIPTS/*.sh; do

	echo "[init] executing ${file}"

	# Note: -e will enforce that any subcommand that fails will fail the entire script run
	/bin/bash -e $file

	STATUS=$?  # Captures exit code from script that was run

	if [[ $STATUS == "$SIGNAL_BUILD_STOP" ]]
	then
	  echo "[init] exit signalled - ${file}"
	  exit $STATUS
	fi

	if [[ $STATUS != 0 ]]
	then
	  echo "[init] failed executing - ${file}"
	  exit $STATUS
	fi

  done
else
  echo "[init] no run.d scripts"
fi
