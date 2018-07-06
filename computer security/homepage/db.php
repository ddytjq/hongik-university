<?php

include("db_connect.php");

// 회원가입 db 연동
$id = $_POST[id];
$pw = $_POST[pw];
$name = $_POST[name];
$tel = $_POST[tel];

if($id==NULL || $pw==NULL || $name==NULL || $tel==NULL){
	echo "<script>window.alert('You haven`t entered all');</script>";
	echo "<script>history.back(-1)</script>";
}

else{

	$result = mysqli_query($connect,"select * from login where id = '".$id."';");
	$num = mysqli_num_rows($result);
	if($num>0){
		echo "alert('id already taken. Please try another one!!');";
	}
	else{
		$sql = "insert into login(id, pw, name, tel) value('$id', '$pw', '$name', '$tel')";
		mysqli_query($connect, $sql);
		echo "<script>window.alert('join success!!');</script>";
		if(!$sql)
			die("mysql error".mysqli_error());
		echo "<script>location.href='index.php';</script>";
	}
}

?>
