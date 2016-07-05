#!/bin/bash

opcao=$1

path_mpiuser=/home/mpiuser

function configuraHOSTNAME(){
     echo "Configurando /etc/hosts.."
     #mpiuser executa sudo sem senha
     sed -i -e '$a\' -e 'mpiuser ALL=NOPASSWD:ALL' /etc/sudoers
     #copia ips e hostnames para /etc/hosts
     cat ips_cluster.txt >> /etc/hosts
     
}
function configuraNFSSlave(){
    echo "Configurando NFS Client"
    #ativa o serviço portmapper
    rpcbind &>/dev/null
    #configuracao nfs
    path_fstab=/etc/fstab
    #permissão do diretorio cloud
    chown mpiuser:mpiuser $path_mpiuser/cloud/ &>/dev/null
    #configura montagem automatica do nfs
    echo "master:/home/mpiuser/cloud       /home/mpiuser/cloud       nfs" >> $path_fstab
    mount -a &>/dev/null
}
function configuraNFSMaster(){
    echo "Configurando NFS Server"
    #ativa o serviço portmapper
    rpcbind &>/dev/null
    #configura diretorio nfs
    path_exports=/etc/exports
    #permissão do diretorio cloud
    chown mpiuser:mpiuser $path_mpiuser/cloud/ &>/dev/null
    ##configura exports
    echo "/home/mpiuser/cloud     *(rw,sync,fsid=0)" >> $path_exports
    #reinicia nfs-server
    /etc/init.d/nfs-kernel-server restart &>/dev/null 
}

function uso(){
        "Uso:
             Utilizar:$0        -h para configura /etc/hosts
             Utilizar:$0        -nm para configurar nfs server
             Utilizar:$0        -ns para configurar nfs client
                                                              "
}
case $opcao in
-h)configuraHOSTNAME;;
-nm)configuraNFSMaster;;
-ns)configuraNFSSlave;;
*)uso;;
esac

