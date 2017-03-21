<?php


$db_name="amoc";
$mysql_username="root";
$mysql_password="";
$server_name="localhost";
$conn= mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name)or die('Unable To connect');

if(!$conn)
{
	echo "connection fail";
}
?>