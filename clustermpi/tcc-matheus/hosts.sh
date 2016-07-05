#!/bin/bash

cat /etc/hosts > hosts

ip_maquina1=$(ifconfig | awk '{print $3}' | head -2 | tail -1)
ip_maquina3=$(sudo arp-scan 200.129.39.67/27 | grep d0:27:88:c1:f2:c6 | awk '{print $1}')
ip_maquina2=$(sudo arp-scan 200.129.39.67/27 | grep d0:27:88:c1:ef:4e | awk '{print $1}')

sed '/maquina1/d' hosts > hosts
sed '/maquina2/d' hosts >> hosts
sed '/maquina3/d' hosts >> hosts

echo "$ip_maquina1         maquina1" >> hosts
echo "$ip_maquina2         maquina2" >> hosts
echo "$ip_maquina3         maquina3" >> hosts

sudo cp -f hosts /etc/hosts

