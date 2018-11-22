#!/bin/bash
for script in tests_e2e/*.py; do
	python "$script"
	if [ $? != 0 ]
	then
	  exit $?	
	fi
done
