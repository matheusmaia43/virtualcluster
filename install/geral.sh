#!/bin/bash

opcao=$1
qtd_nodes=$2
cpu=$3
men=$4
user=$5

function troca(){
     on=$(onehost list | grep on | wc -l)
     c=1
     if [ $on -ge $c ];then
         ./install.sh -i $qtd_nodes $cpu $men $user
         ./install.sh -t $qtd_nodes $cpu $men $user
     else
         echo "Hosts desligados ou em estado de erro! Contacte o administrador."
     fi
}

function uso(){
        "Uso:
             Utilizar:$0        -i para configurar o cluster"
}
#----------------------------------------------------------------#
case $opcao in
-i)troca;;
*)uso;;
esac

