import Tkinter
from Tkinter import *
import subprocess
import os
from os import system as cmd

WINDOW_SIZE = "320x190"
top = Tkinter.Tk()
top.geometry(WINDOW_SIZE)
top.title("control")

def mininet1():
	print "Mininet execution"
	os.system("gnome-terminal -e 'sudo python tree.py'")
def mininet2():
	print "Mininet execution"
	os.system("gnome-terminal -e 'sudo python tree.py'")
def flowrule():
	print "Flow Rule execution"
	os.system("gnome-terminal -e './flow_rule.sh'")
def firewall():
	print "Firewall execution"
	os.system("gnome-terminal -e './pox/pox.py log.level --DEBUG openflow.of_01 forwarding.l2_learning misc.firewall'")

project=Tkinter.Label(top, text="REMOTE CONTROL", font=(" ",17))
onos=Tkinter.Label(top, text="ONOS : ", font=(" ", 13))
pox=Tkinter.Label(top, text="POX : ", font=(" ", 13))
mininet1_set= Tkinter.Button(top, text ="MININET", command=mininet1)
mininet2_set= Tkinter.Button(top, text ="MININET", command=mininet2)
flowrule_set = Tkinter.Button(top, text ="FLOW RULE", command=flowrule)
firewall_set= Tkinter.Button(top, text ="FIREWALL", command=firewall)

project.place(x=48, y=14)
onos.place(x=20, y=63)
pox.place(x=20, y=113)
mininet1_set.place(x=90, y=63)
flowrule_set.place(x=175, y=63)
mininet2_set.place(x=90, y=113)
firewall_set.place(x=175, y=113)
top.mainloop()

