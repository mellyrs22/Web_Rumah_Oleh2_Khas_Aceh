<?php 
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "rmholeh"; //nama database 

mysql_connect($server,$username,$password) or die ("ERROR!!!"); 
mysql_select_db($database); 
?>