#!/bin/bash

path_conf=/home/mpiuser/configura_vm

ip_vm=$(ifconfig | awk '{print $2}' | head -2 | tail -1 | cut -d: -f2)
ip_master=$(cat $path_conf/ips_cluster.txt | awk '{print $1}' | head -1 | tail -1)

echo "Criando senha para o usuario MPIUSER"
passwd mpiuser << EOF
mpiuser
mpiuser
EOF

if [ $ip_vm == $ip_master  ];then
   $path_conf/configuraVMS.sh -h
   $path_conf/configuraVMS.sh -nm
   chown mpiuser:mpiuser $path_conf/configuraCHAVES.sh
else
  ./configuraVMS.sh -h
  ./configuraVMS.sh -ns
   chown mpiuser:mpiuser $path_conf/configuraCHAVES.sh
fi
