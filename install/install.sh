#!/bin/bash

opcao=$1
qtd_nodes=$2
cpu=$3
men=$4
user=$5
#-------------------------------------------------------------------------------------------------------------------------------------#
path_c=/var/lib/one/$user/cria_vms
path_cg=/var/lib/one/$user/configura_cluster
#-------------------------------------------------------#
function criaVMS(){
  $path_c/createVMS.sh -v $qtd_nodes $cpu $men $user
  verificaStatus
}
function troca(){
    for ips in $(cat $path_cg/configura_vm/ips_cluster.txt | awk '{print $1}');do
    #configura a troca de chaves entre as vms
    senha_mpi="mpiuser"
    sshpass -p $senha_mpi ssh mpiuser@$ips "cd /home/mpiuser/configura_vm/ && ./configuraCHAVES.sh -t && sudo mv machine .." 
    done
#    ip_master=$(cat $path_cg/ips_cluster.txt | awk '{print $1}' | head -1)
#    sshpass -p $senha_mpi ssh mpiuser@$ip_master "cd /home/mpiuser/configura_vm/ && mv machine .."

}

#-------------------------------------------------------#
function verificaStatus(){
    #obtem status das vms slaves
    status="not"
#loop infinito até que todas as vms estejam em execucao
i=true
while [ $i  ];do
    #remove arquivo
    rm -f ids_vms.txt
    rm -f status_s.txt
    #pega o id das vms criadas e joga em um unico arquivo
    cat $path_cg/id_vm_master.txt > ids_vms.txt
    cat $path_cg/id_vms_slave.txt >> ids_vms.txt
    #obtem status das vms
    for id in $(cat ids_vms.txt | awk '{print $2}');do
        onevm show -x $id | grep STATE | head -2 | tail -1 | cut -d\> -f2 | cut -d\< -f1 >> status_s.txt
    done
    rm -f vs.txt
    #verifica se as vms estão executando ou não e joga em um arquivo 
    for st in $(cat status_s.txt);do
        if [ $st -eq 3 ];then
          echo -e "runn" >> vs.txt
        else
          echo "not" >> vs.txt
       fi
    done
    #obtem a qtd de vms em executção
    linhas=$(cat vs.txt | wc -l)
    qtd_run=$(grep -w "runn" vs.txt | wc -l)
    #verifica se as vms estão executando, se estiver encerra o laço infinito
    #e chama o script que configura o cluster
    if [ $qtd_run -eq $linhas  ];then
       echo "# Todas as VMS executando #"
       echo "Começando a configuração do cluster..."
       sleep 8
       $path_cg/clusterConfig.sh -c $user
       exit
    fi
    sleep 3
done
}
#---------------------------------------------------------------------------------------------------------------------------------------#
function uso(){
        "Uso:
             Utilizar:$0        -i para instalar o cluster"
}
#----------------------------------------------------------------#
case $opcao in
-i)criaVMS;;
-t)troca;;
*)uso;;
esac






