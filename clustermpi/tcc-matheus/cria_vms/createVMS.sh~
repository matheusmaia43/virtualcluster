#!/bin/bash

opcao=$1
qtd_nodes=$2
cpu=$3*100
men=$4
path_c=/opt/lampp/htdocs/clustermpi/tcc-matheus/cria_vms
path_cc=/opt/lampp/htdocs/clustermpi/tcc-matheus/configura_cluster
#--------------------------------------------------------------------------------------------------------------------------------------------#
function criaVMS(){
      on=$(onehost list | grep on > $path_c/hostON.txt)
      verificaParam
      retval=$?
      soma_cpu_total=0
      soma_cpu_usada=0
      soma_men_total=0
      soma_men_usada=0
      if [ $retval == 1 ];then
          for i in $(seq $(cat $path_c/hostON.txt | wc -l | cut -d" " -f1)); do
              id_host=$(cat $path_c/hostON.txt  | head -n $i | tail -1 | awk '{print $1}')
	      ##cpu total
              qtd_cpu_total=$(onehost show -x $id_host | head -17 | tail -1 | cut -d\> -f2 | cut -d\< -f1)
              soma_cpu_total=$(($soma_cpu_total+$qtd_cpu_total))
	      ##cpu usada
              qtd_cpu_usada=$(onehost show -x $id_host | head -23 | tail -1 | cut -d\> -f2 | cut -d\< -f1)
              soma_cpu_usada=$(($soma_cpu_usada+$qtd_cpu_usada))
              ##cpu livre
              cpu_livre=$(($soma_cpu_total-$soma_cpu_usada))

              ##memoria total
              qtd_men_total=$(onehost show -x $id_host | head -16 | tail -1 | cut -d\> -f2 | cut -d\< -f1)
              soma_men_total=$(($soma_men_total+$qtd_men_total))
              ##memoria usada
              qtd_men_usada=$(onehost show -x $id_host | head -13 | tail -1 | cut -d\> -f2 | cut -d\< -f1)
              soma_men_usada=$(($soma_men_usada+$qtd_men_usada))
	      ##memoria livre
              men_livre_x=$(($soma_men_total-$soma_men_usada))
              men_livre=$(echo ${men_livre_x:0:4})

	  done
          ##men solicitada
          men_solicitada=$(($men*$qtd_nodes))
	  ##cpu solicitada
 	  cpu_solicitada=$(($cpu*$qtd_nodes))
	  ## verifica se os valores solicitados estão disponiveis
	  ## se sim cria as VMs (1 Master e o restante Slaves)
          rm -f $path_cc/id_vms_slave.txt
	  if [ $men_solicitada -le $men_livre ] && [ $cpu_solicitada -le $cpu_livre ];then
		echo "$(sed 's/men/'$men'/; s/cpu2/'$cpu'/' $path_c/modelo.tmpl)" > $path_c/templateVM.tmpl

                #cria o node master
                echo "Criando Master"
                onevm create $path_c/templateVM.tmpl > $path_cc/id_vm_master.txt
                #cria os nodes slaves
                qtd_slave=$[$qtd_nodes - 1]
                i=1
                while [ $i -le  $qtd_slave ];
                do
                     echo "Criando Slave$i"
                     echo "$(sed 's/men/'$men'/; s/cpu2/'$cpu'/; s/name1/'slave$i'/' $path_c/modeloS.tmpl)" > $path_c/templateVMSlave.tmpl
                     onevm create $path_c/templateVMSlave.tmpl >> $path_cc/id_vms_slave.txt
                     ((i=$i+1))
                done

          else
	      echo "Recurso Indisponivel, tente diminuir os recursos solicitados!"
          fi
	 
      fi
}
#--------------------------------------------------------------------------------------------------------------------------------------------#
function verificaParam(){
        if [ -z $qtd_nodes  ] || [ -z $cpu  ] || [ -z $men  ]; then
             uso
        else
             retval=1
        fi
        return $retval
}
#--------------------------------------------------------------------------------------------------------------------------------------------#
function uso(){
          uso="Uso:
                 Para verificar recursos disponíveis:
                 $0 -v qtd_nodes cpu men       (qtd_nodes nº inteiro, cpu nº inteiro, memória em MB)"
             echo "$uso"

}
#--------------------------------------------------------------------------------------------------------------------------------------------#
case $opcao in 
-v) criaVMS;;
*) uso;;
esac

