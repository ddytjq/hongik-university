<?php
session_start();
include("db_connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>NOTICE</title>
</head>
<meta charset="utf-8">
<body style="background-color:white;">
	<br/>


	<?php
	

	if($_SESSION['id']==NULL)
	{
		echo "<script>window.alert('login please')</script>";
		echo "<script>location.href='index.php';</script>";
	}
	
	else{
		?>



		<div style=" width:30%;">
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto" style="display:flex;align-items: center; ">
					<li class="nav-item"style="display:flex;align-items: center;font-size:18px; ">
						<a class="nav-link" href="board.php" name='write' method='POST' >글쓰기</a>&nbsp&nbsp&nbsp
					</li>
					<li class="nav-item"style="display:flex;align-items: center; font-size:18px;">
						<a class="nav-link" href="notice.php">게시판</a>&nbsp&nbsp&nbsp
					</li>
					
				</ul>
			</div>
		</div>
		<?php

		echo "".$_SESSION['id']."님 환영합니다. ";
		echo "&nbsp;<a href='logout.php'><input type='button' value='logout'></a><br />";
		
		?>


		<h1 align=center>자유게시판</h1>
		<table width=700 border=1 align=center cellpadding=2 cellspacing=1>
			<thead>
				<tr height=20 bgcolor=#999999>
					<td width=30 align=center>
						<font color=white>번호</font>
					</td>
					<td width=250 align=center>
						<font color=white>제목</font>
					</td>
					<td width=100 align=center>
						<font color=white>글쓴이</font>
					</td>
					<td width=170 align=center>
						<font color=white>날짜</font>
					</td>
					
				</tr>
			</thead>
			<tbody>
				
				<?php


				
				$query = "select * from board order by date desc";
				$result = mysqli_query($connect,$query);
				
				$boardnum = mysqli_num_rows($result);
				for($i=$boardnum; $i>0; $i--){
					
					$row=mysqli_fetch_array($result);

					echo "<tr height=10>";
//번호
					echo "<td width=30 align=center>".$i."</td>";
//제목
				
					echo "<td width=250 align=center><a href='view.php?date=".$row['date']."'>".$row['title']."</a></td>";

					echo "<td width=100 align=center>".$row['id']."</td>";
//시간
					echo "<td width=170 align=center>".$row['date']."</td>";

					echo "<input type='hidden' name='title' value='".$row['date']."'>";

					echo "</tr>";
				}

			}
			?>



		</tbody>
	</table>

</body>
</html>

<script>
var str='<?php echo $_SESSION['id'];?>';
</script>
