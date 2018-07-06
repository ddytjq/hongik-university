<?php
session_start();
include("db_connect.php");

$id=$_POST['id'];
$pw=$_POST['pw'];

$query = "select * from login where id = '$id' and pw ='$pw'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);

if($id==NULL&&$pw==NULL){
	echo "<script>window.alert('Input id and password');</script>";
	echo "<script>location.href='index.php';</script>";
}

elseif($id==$row['id']&&$pw==$row['pw']){
	$_SESSION['id']=$row['id'];
	$_SESSION['pw']=$row['pw'];
	$_SESSION['name']=$row['name'];


	echo "<script>window.alert('login success');</script>";
	echo "<script>location.href='index.php';</script>";

}

else{
	echo "<script>window.alert('Wrong id or Wrong password');</script>";

	echo "<script>location.href='index.php';</script>";
}

?>
