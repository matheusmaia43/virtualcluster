#!/bin/bash

user=$1
path_l=/var/lib/one/$user/install

vms=$(cat $path_l/ids_vms.txt | awk '{print $2}')

for ids in $vms; do
    echo "Excluindo "$ids
    onevm delete $ids
done
