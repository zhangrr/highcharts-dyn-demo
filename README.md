
highcharts-dyn-demo highcharts动态加载数据
==========================================

环境说明
--------

用到了php、mysql、highcharts，动态无刷新加载数据。数据来源于mysql，现在是采用在目标机器上crontab定时运行send.sh，用curl提交数据。可以改成用udp boardcast的方式接收数据，这就需要改写udp server和client，可以使用collectd的udp协议。<br>

highchart-dyn-demo highcharts动态加载数据
-----------------------------------------
![图像1](http://img.rendoumi.com/t/git/highcharts.jpg)

highcharts-dyn-demo部署
-----------------------

用test.sql灌入mysql数据库，更改receive.php中相应参数。<br>
在目标机器上编辑crontab
0-59/1 * * * * send.sh


