<?php
session_start();
include('db_connect.php');

$title = $_GET['title'];
$content = $_GET['content'];
$num = $_GET['num'];

// content 의 내용을 모두 소문자 바꾼다.
$result = strtolower($content);

// script 패턴 매칭
if ( preg_match('/<scrip/', $result ))
{
	// script 치환 공격 패턴 점검
	if (preg_match('/<<script>/',$result) or preg_match('/<s<script>/',$result) 
		or preg_match('/<sc<script>/',$result) or preg_match('/<scr<script>/',$result) 
		or preg_match('/<scri<script>/',$result) or preg_match('/<scrip<script>/',$reuslt) 
		or preg_match('/<script<script>/',$result) or preg_match('/<script/', $result))
	{
		$command="alert( 'XSS Detected : script matching' );";
	}

	// http 공격 패턴 점검
	else if (preg_match("((http)://[a-z0-9-]+.[][a-zA-Z0-9:&#@=_%;?/.+-]+)",$result))
	{
		$command="alert( 'XSS Detected : html matching' );";
	}

	// img 공격 패턴 점검
	else if (preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>i]*>/i", $result))
	{	
		$command="alert( 'XSS Detected : img matching' );";
	}

	// 방화벽에 자동 룰 추가 (ip & port deny)
	$server = $_SERVER['REMOTE_ADDR'];
	print "<script> $command </script>";
	print "<script> window.history.back(); </script>";
	shell_exec("sudo ufw deny from $server to any port 80");
	exit;
}

// iframe, div 패턴 매칭
else if (preg_match('/<iframe/', $result) or preg_match('/<div/', $result))
{
	$command="alert(' XSS Detected '); ";
	// http 공격 패턴 점검
	if (preg_match("((http)://[a-z0-9-]+.[][a-zA-Z0-9:&#@=_~%;?/,+-]+)",$result))
	{
		$command="alert(' XSS Detected : http matching' );";
	}

	// img 공격 패턴 점검
	else if (preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $result))
	{
		$command="alert(' XSS Detected : img matching' );";
	}

	// 방화벽에 자동 룰 추가 (ip & port deny)
	$server = $_SERVER['REMOTE_ADDR'];
	print "<script> $command </script>";
	print "<script> window.history.back(); </script>";
	shell_exec("sudo ufw deny from $server to any port 80");
	exit;
}

// img 패턴 점검
else if (preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i",$result))
{
	$command="alert(' XSS Detected '); ";
	// utf-8 유니코드 인코딩 공격 패턴 점검
	if( preg_match('/escape/',$result) or preg_match('/encodeURl/',$result) 
		or preg_match('/encodeURlComponent/',$result))
	{
		$command="alert( 'XSS Detected : unicode matching' );";
	}

	// hex 코드 인코딩 공격 패턴 점검
	else if( preg_match('/&#/', $result))
	{
		$command="alert( 'XSS Detected : haxcode matching' );";
	}
	
	// event tag 공격 패턴 점검
	else if( preg_match('/onmouseover/', $result))
	{
		$command="alert( 'XSS Detected : event tag matching' );";
	}
	
	// 방화벽에 자동 룰 추가 (ip & port deny)
	$server = $_SERVER['REMOTE_ADDR'];
	print "<script> $command </script>";
	print "<script> window.history.back(); </script>";
	shell_exec("sudo ufw deny from $server to any port 80");
	exit;
}

// db 데이터 전송
$query = "insert into board(num, title, content, date, id) values('$num', '$title', '$content', now(), '".$_SESSION['id']."')";

$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);
$boardnum = mysqli_num_rows($result);

echo "<script>location.href='notice.php'</script>";
?>
