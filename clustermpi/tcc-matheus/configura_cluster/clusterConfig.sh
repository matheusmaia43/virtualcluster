#!/bin/bash


#-----------------------------------------------------#
# Configuração do cluster
#-----------------------------------------------------#

opcao=$1
path_cc=/opt/lampp/htdocs/clustermpi/tcc-matheus/configura_cluster

function getIP(){

tmp=$(cat $path_cc/id_vms_slave.txt | wc -l | cut -d" " -f1)

id_vm_master=$(cat $path_cc/id_vm_master.txt | awk '{print $2}')
ip_master=$(onevm show -x $id_vm_master | grep IP | head -2 | tail -1 | cut -d\[ -f3 | cut -d\] -f1)
echo "$ip_master          master" > $path_cc/ips_cluster.txt
for i in $(seq $tmp); do

    id_vms_slaves=$(cat $path_cc/id_vms_slave.txt | head -n $i | tail -1 |  awk '{print $2}')
    ips_slaves=$(onevm show -x $id_vms_slaves | grep IP | head -n $i | tail -1 | cut -d\[ -f3 | cut -d\] -f1)
    echo "$ips_slaves          slave$i" >> $path_cc/ips_cluster.txt
done
    cp -f $path_cc/ips_cluster.txt $path_cc/configura_vm

}

function enviaFiles(){
    getIP
    senha="root"
    senha_mpi="mpiuser"
    for ips in $(cat $path_cc/ips_cluster.txt | awk '{print $1}');do
       echo "Configurando nó $ips..."
       echo "Copiando scripts para os nós..."
       sshpass -p $senha scp -r $path_cc/configura_vm/  root@$ips:/home/mpiuser
# &>/dev/null
       echo "Executando scripts.."
       sshpass -p $senha ssh root@$ips "cd /home/mpiuser/configura_vm/ && ./install.sh"
       sshpass -p $senha_mpi ssh mpiuser@$ips "cd /home/mpiuser/configura_vm/ && ./configuraCHAVES.sh -c" 
# &>/dev/null
    done
}
function uso(){
	"Uso:
             Utilizar:$0        -c para configurar o cluster"
}
case $opcao in
-c)enviaFiles;;
*)uso;;
esac
