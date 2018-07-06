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
       
       $date = $_GET['date'];

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
	<form action=update.php method="post">
        <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
            <tr>
                <td height=20 align=center bgcolor=#999999>
                    <font color=white><B></B></font>
                </td>
            </tr>
            <!-- 입력 부분 -->
            <tr>
                <td bgcolor=white>&nbsp;
                    <table>
                        <tr>
                            <td width=60 align=left>이름</td>
                            <td align=left >
                                <?php 
                                $query = "select * from board where date='".$date."'";
                                $result = mysqli_query($connect,$query);
                                $row = mysqli_fetch_array($result);
                                echo "".$row['id']."";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left>제목</td>
                            <td align=left><input type="hidden" name="title" value=
                                <?php
                                $query = "select * from board where date='".$date."'";
                                $result = mysqli_query($connect,$query);
                                $row = mysqli_fetch_array($result);
                                echo "".$row['title']."";
                                ?> />
				<?php
				$query = "select * from board where date='".$date."'";
				$result = mysqli_query($connect, $query);
				$row = mysqli_fetch_array($result);
				echo "".$row['title']."";
				?>
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left >내용</td>
                            <td align=left width=65 height=15>
                               <?php
                               $query = "select * from board where date='".$date."'";
                               $result = mysqli_query($connect,$query);
                               $row = mysqli_fetch_array($result);
                               echo "".$row['content']."";
                               ?>
                           </td>
                       </tr>
		       <tr>
		       <td width=60 align=left >수정</td>
		       <td align=left width=65 height=15><INPUT type=submit value="click">
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
