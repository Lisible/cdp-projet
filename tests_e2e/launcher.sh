#!/bin/bash
for script in tests_e2e/*.py; do
	python "$script"
done
