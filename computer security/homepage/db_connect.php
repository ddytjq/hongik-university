<?php
$db_host = "localhost"; 
$db_user = "root";     
$db_password = "0813"; 
$db_name = "xss";  

$connect=mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$connect)
{
	echo "Fail to connect DB" . mysqli_connect_error();
}
?>
