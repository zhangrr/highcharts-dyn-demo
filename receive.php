<?php
$con = mysql_pconnect("localhost","test","test");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("cmdb", $con);
mysql_query("set names 'utf8'");

$sql = "INSERT INTO monit01(xzhou, yzhou, shuzhi)VALUES('".$_REQUEST["xzhou"]."', '".$_REQUEST["yzhou"]."', ".$_REQUEST["shuzhi"].")";
echo $sql;
if(!mysql_query($sql,$con)){
    echo "Error: ".mysql_error();
} else {
    echo "OK";
}
mysql_close($con);
?> 
