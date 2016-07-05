#!/bin/bash

./hosts.sh

scp hosts.sh maquina2:/home/oneadmin
scp hosts.sh maquina3:/home/oneadmin
ssh oneadmin@maquina2 "./hosts.sh" 
ssh oneadmin@maquina3 "./hosts.sh" 
