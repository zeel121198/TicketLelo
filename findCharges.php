<?php
$show=$_REQUEST['show'];

$con = mysql_connect('localhost', 'root', ''); 
mysql_select_db('moviedb');

$sql="select ticketcharges from showdetail where 
	showid=$show";

$result=mysql_query($sql);

$row=mysql_fetch_array($result);

echo $row[0];

?>
