<?php
session_start();
include('db_connect.php');

// 데이터 가저오기
$num = $_GET['num'];
$id = $_GET['id'];
$title = $_GET['title'];
$content = $_GET['content'];
$result = strtolower($content);

// db 전송
$query = "update board set title='$title', content='$content', date=now() where num='$num'";

$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);
$boardnum = mysqli_num_rows($result);

echo "<script>location.href='notice.php'</script>";
?>
