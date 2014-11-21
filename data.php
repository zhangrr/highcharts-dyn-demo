<?php
$con = mysql_connect("localhost","test","test");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("cmdb", $con);
/*
mysql> select * from monit01;
+----+-------------+---------------------+--------+
| id | xzhou       | yzhou               | shuzhi |
+----+-------------+---------------------+--------+
|  9 | 192.168.1.4 | 2014-08-20 17:15:00 |   0.22 |
| 10 | 192.168.1.5 | 2014-08-20 17:15:00 |   0.09 |
| 11 | 192.168.1.2 | 2014-08-20 17:15:00 |   0.06 |
| 12 | 192.168.1.4 | 2014-08-20 17:16:00 |   0.16 |
| 13 | 192.168.1.2 | 2014-08-20 17:16:00 |   0.06 |
| 14 | 192.168.1.5 | 2014-08-20 17:16:00 |   0.13 |
| 15 | 192.168.1.4 | 2014-08-20 17:17:00 |   0.13 |
| 16 | 192.168.1.2 | 2014-08-20 17:17:00 |   0.03 |
| 17 | 192.168.1.5 | 2014-08-20 17:17:00 |   0.13 |
+----+-------------+---------------------+--------+
*/

$category = array();
$category['name'] = 'Time';
$query = mysql_query("SELECT substring(yzhou,12,5) FROM monit01 WHERE xzhou='192.168.1.2' order by id desc limit ".$_REQUEST['limit']);
while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r[0];
}
$category['data']=array_reverse($category['data']);

$series1 = array();
$series1['name'] = '192.168.1.2';
$query1 = mysql_query("SELECT shuzhi FROM monit01 WHERE xzhou='192.168.1.2' order by id desc limit ".$_REQUEST['limit']);
while($r1 = mysql_fetch_array($query1)) {
    $series1['data'][] = $r1['shuzhi'];
}
$series1['data']=array_reverse($series1['data']);

$series2 = array();
$series2['name'] = '192.168.1.4';
$query2 = mysql_query("SELECT shuzhi FROM monit01 WHERE xzhou='192.168.1.4' order by id desc limit ".$_REQUEST['limit']);
while($r2 = mysql_fetch_array($query2)) {
    $series2['data'][] = $r2['shuzhi'];
}
$series2['data']=array_reverse($series2['data']);

$series3 = array();
$series3['name'] = '192.168.1.5';
$query3 = mysql_query("SELECT shuzhi FROM monit01 WHERE xzhou='192.168.1.5' order by id desc limit ".$_REQUEST['limit']);
while($r3 = mysql_fetch_array($query3)) {
    $series3['data'][] = $r3['shuzhi'];
}
$series3['data']=array_reverse($series3['data']);

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
