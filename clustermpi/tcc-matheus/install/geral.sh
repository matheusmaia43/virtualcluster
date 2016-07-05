#!/bin/bash

opcao=$1
qtd_nodes=$2
cpu=$3
men=$4

function troca(){
    ./install.sh -i $qtd_nodes $cpu $men
    echo "par de chave"
    ./install.sh -t
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

