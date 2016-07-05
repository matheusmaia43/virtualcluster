#!/bin/bash


ids=$(cat ids_vms.txt | awk '{print $2}')
qtd_ids=$(cat ids_vms.txt | awk '{print $2}' | wc -l)
rm -f t
for id in $(echo $ids);do
      st=$(onevm show -x $id | grep \<LCM_STATE\> |  cut -d\> -f2 | cut -d\< -f1)
      if [ $st -eq 1 ];then
         echo "pendente" >> t
      fi
      if [ $st -eq 3  ];then
         echo "ativa" >> t
      fi
      if [ $st -eq 36  ];then
         echo "falha" >> t
      fi
      if [ $st -eq 0  ];then
         echo "off" >> t
      fi
done
     tmpP=$(cat t | grep -e 'pendente' | wc -l)

     tmpA=$(cat t | grep -e 'ativa' | wc -l)

     tmpF=$(cat t | grep -e 'falha' | wc -l)

         echo $tmpA $tmpP $tmpF
