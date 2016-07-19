#!/bin/bash

opcao=$1
user=$2
function cria(){
    rm -r $user
    mkdir -f $user
#    cp -r tcc-matheus $user
    cp -r scripts $user
}

function uso(){
        "Uso:
             Utilizar:$0        -c para criar ambiente"
}
#----------------------------------------------------------------#
case $opcao in
-c)cria;;
*)uso;;
esac

