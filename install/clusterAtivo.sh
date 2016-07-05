#!/bin/bash

user=$1
path_cc=/var/lib/one/$user/configura_cluster

tmp=$(cat $path_cc/configura_vm/ips_cluster.txt | wc -l)
for i in $(seq $tmp); do

    ips=$(cat $path_cc/configura_vm/ips_cluster.txt |  head -n $i | tail -1 | awk '{print $1}')
    sshpass -p mpiuser ssh mpiuser@$ips "ls | grep cloud | exit" &>> ssh_test
done
t=$(cat ssh_test | grep refused > ssh_final)
t2=$(cat ssh_test | grep route >> ssh_final2)
tt=$(cat ssh_final | wc -l)
tt2=$(cat ssh_final2 | wc -l)

if [ $tt -ge 1 ] || [ $tt2 -ge 1 ];then
   echo "Cluster desativado!"
else
   echo "Cluster ativo!"
fi
rm -f ssh_test
rm -f ssh_final
rm -f ssh_final2
