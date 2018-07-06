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
<form action=notice_check.php method='GET'>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 align=center bgcolor=#999999>
        <font color=white><B>글 쓰 기</B></font>
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
	$boardnum = mysqli_num_rows($result) + 1;
	?>
	<td width=60 align=left >번호</td>
	<td align=left >
	<INPUT type=hidden name=num size=60 maxlength=35 value="<?php echo "".$boardnum."" ?>">
	<?php echo "".$boardnum."" ?>
	</td>
	</tr>
            <tr>
                <td width=60 align=left >이름</td>
                <td align=left >
                    <INPUT type=hidden name=user size=60 maxlength=35 value='<?php echo "".$_SESSION['id']."";?>'>
		    <?php echo "".$_SESSION['id']."";?>
                </td>
            </tr>
            <tr>
          
                <td width=60 align=left >제목</td>
                <td align=left >
                    <INPUT type=text name=title size=60 maxlength=35>
                </td>
            </tr>
            <tr>
                <td width=60 align=left >내용</td>
                <td align=left >
                    <TEXTAREA name=content cols=65 rows=15></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td colspan=10 align=center>
                    <INPUT type=submit value="저장하기">
                    &nbsp;&nbsp;
                    <INPUT type=reset value="다시쓰기">
                    &nbsp;&nbsp;
                    <INPUT type=button value="되돌아가기" 
                    onclick="history.back(-1)"> <!--버튼이 클릭되었을때 발생하는 이벤트로 자바스크립트를 실행함. 이렇게 하면 바로 이전페이지로 감-->
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
