#!/bin/bash

opcao=$1

function configuraCHAVES(){
    echo "Criando par de chaves"
    path_ssh=/home/mpiuser/.ssh
    #cria par de chave
    yes "" | ssh-keygen -t rsa -N "" &>/dev/null

# Desabilita checagem de hosts ao acesso remoto.
    echo "Host *" > $path_ssh/config
    echo "    StrictHostKeyChecking no" >> $path_ssh/config
    echo "    UserKnownHostsFile /dev/null" >> $path_ssh/config
}

function trocaCHAVES(){
 senha="mpiuser"
 echo "Trocando chaves entre os nós.."
    for hostname in $(cat ips_cluster.txt | awk '{print $2}'); do
       sshpass -p $senha ssh-copy-id $hostname &>/dev/null
    done
}

function uso(){
        "Uso:
             Utilizar:$0        -c para configura par de chaves
             Utilizar:$0        -t para trocar a chave pub. com os hosts"
}

case $opcao in
-c)configuraCHAVES;;
-t)trocaCHAVES;;
*)uso;;
esac

