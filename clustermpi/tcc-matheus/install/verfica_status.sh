#!/bin/bash


for i in $(cat ids_vms.txt);do
    st=$(onevm show -x $i | grep STATE | head -1 | cut -d\> -f2 | cut -d\< -f1)
    if [ $st -eq 3  ];then
        (($soma=($st+$st)))
        echo $st
    fi 
   echo $st
done
