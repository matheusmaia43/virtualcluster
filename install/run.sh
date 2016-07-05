#!/bin/bash

#-----------------------------------------------------------#
opcao=$1
path_file=$2
user=$3
#-----------------------------------------------------------------W
function executa(){
   path_cg=/var/lib/one/$user/configura_cluster/configura_vm

   ip_master=$(cat $path_cg/ips_cluster.txt | awk '{print $1}' | head -1)
   senha_mpi='mpiuser' 
    sshpass -p $senha_mpi ssh mpiuser@$ip_master "cd /home/mpiuser/cloud/ && rm -f *" &> /dev/null
    sshpass -p $senha_mpi scp $path_file mpiuser@$ip_master:/home/mpiuser/cloud &> /dev/null
    rm -f saida.txt
    sshpass -p $senha_mpi ssh mpiuser@$ip_master "cd /home/mpiuser/cloud/  && mpicc * -o executa && cd /home/mpiuser && mpiexec -n 10 -f machine cloud/executa" 2> saida.txt
    cat saida.txt
}
#-----------------------------------------------------------------#
function uso(){
        "Uso:
             Utilizar:$0        -f para executar o código"
}
#----------------------------------------------------------------#
case $opcao in
-f)executa;;
*)uso;;
esac

