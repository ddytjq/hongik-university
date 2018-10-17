## Mobile system convergence and practicd

#### Environment
* language : python 2.7.10
* os : Linux Ubuntu 14.04

#### SDN Control with two controllers (onos, pox)
* Mininet을 이용한 SDN 구성
* ONOS Controller 를 이용해 SDN을 Control 
* ONOS로 Flow Rule을 추가하여 흐름 변화 확인
* POX Controller 를 이용해 SDN을 Control
* POX로 Firewall Rule을 추가하여 흐름 변화 확인
* Python GUI를 통한 동작 Control

#### SDN - ONOS Controller Execution
* ONOS Controller Connect

export ONOS_ROOT=~/onos

source $ONOS_ROOT/tools/dev/bash_profile

export ONOS_IP=127.0.0.1

export ONOS_APPS=drivers,openflow,proxyarp,mobility,fwd

ok clean

* ONOS Controller UI execution

http://127.0.0.1:8181/onos/ui/login.html

id : karaf

pw : karaf

* MININET execution

sudo python tree.py

* Ping Test

pingall

* Flow rule add

./flow_rule.sh


* Ping Test

pingall


#### SDN - POX Controller Execution

* POX Controller Connect ( not rule )

./pox/pox.py log.level --DEBUG openflow.of_01 forwarding.l2_learning

* MININET execution

sudo python tree.py

* Ping Test

pingall

* POX Controller redo ( add rule )

./pox/pox.py log.level --DEBUG openflow.of_01 forwarding.l2_learning misc.firewall

* MININET redo

sudo python tree.py

* Ping Test

ping all

#### Demo

* SDN - ONOS Control : https://youtu.be/-csGH1HJ79g
* SDN - POX Control : https://youtu.be/XnyvhnT98KM









