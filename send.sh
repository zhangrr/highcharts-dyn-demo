#!/bin/sh
xzhou='192.168.1.2'
yzhou=`date '+%Y-%m-%d %H:%M'`
shuzhi=`sar 1 1|grep Average|awk '{print $3}'`
curl -d "xzhou=$xzhou" -d "yzhou=$yzhou" -d "shuzhi=$shuzhi" http://192.168.1.1/highcharts/receive.php
