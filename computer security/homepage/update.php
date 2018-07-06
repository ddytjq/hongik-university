<?php
session_start();
include("db_connect.php");
?>

<html>
<head>
<meta charset="UTF-8">
<title>Q&A</title>
<style>

<!--
td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none; 
font-family : 굴림; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { text-decoration : underline; color : black; 
font-size : 9pt; }
-->
</style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>

 <?php

 		$title = $_POST['title'];

                  if($_SESSION['id']==NULL)
                  {
					  echo "<script>window.alert('login please')</script>";
					  echo "<script>location.href='index.php';</script>";
				  }
					
				  else{
                  ?>

<center>
<BR>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form name=csrf  action=update_check.php method='GET'>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 align=center bgcolor=#999999>
        <font color=white><B>수정하기</B></font>
        </td>
    </tr>
    <!-- 입력 부분 -->
    <tr>
        <td bgcolor=white>&nbsp;
        <table>
	<tr>
	<?php
	$query = "select * from board order by date desc";
	$result = mysqli_query($connect,$query);
	$boardnum = mysqli_num_rows($result);
	?>
	<td width=60 align=left >번호</td>
	<td align=left >
	<INPUT type=hidden name=num size=60 maxlength=35 value=
	<?php
	$query = "select * from board where title='".$title."'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	echo "".$row['num']."";
	?>>
	<?php
	$query = "select * from board where title='".$title."'";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	echo "".$row['num']."";
	?>
	</td>
	</tr>
            <tr>
                <td width=60 align=left >ID</td>
                <td align=left >
                <INPUT type=hidden name=id size=60 maxlength=35 value=
		<?php
		$query = "select * from board where title='".$title."'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		echo "".$row['id']."";
		?>>
		<?php
		$query = "select * from board where title='".$title."'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		echo "".$row['id']."";
		?>
		</td>
            </tr>
            <tr>
          
                <td width=60 align=left >제목</td>
                <td align=left >
                <INPUT type=text name=title size=60 maxlength=35 value=
		<?php
		$query = "select * from board where title='".$title."'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		echo "".$row['title']."";
		?>>
		</td>
            </tr>
            <tr>
                <td width=60 align=left >내용</td>
                <td align=left >
		<TEXTAREA name=content cols=65 rows=15><?php
		$query = "select * from board where title='".$title."'";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		echo "".$row['content']."";
		?></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td colspan=10 align=center>
                    <INPUT type=submit value="수정하기">
                    &nbsp;&nbsp;
                    <INPUT type=reset value="다시쓰기">
                    &nbsp;&nbsp;
                    <INPUT type=button value="되돌아가기" 
                    onclick="history.back(-1)"> 
                    <!--버튼이 클릭되었을때 발생하는 이벤트로 자바스크립트를 실행함. 이렇게 하면 바로 이전페이지로 감-->
                </td>
            </tr>
        </TABLE>
</td>
</tr>
<!-- 입력 부분 끝 -->
</table>
</form>
</center>
					<?php
						}
						?>
</body>
</html>
