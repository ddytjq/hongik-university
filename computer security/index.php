<?php
session_start();
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>XSS</title>
</head>
<body>

	<!-- login -->
	<script src="./assets/js/ie10-viewport-bug-workaround.js"></script>

	<?php
	if($_SESSION['id']==NULL)
	{
		?>
		
		<form action='login_check.php' name='login' method='POST'>
			<h2 class="form-signin-heading">Welcome to homepage</h2>
			<p>ID : <input type='text'name='id' placeholder="ID"></p>
			<p>PW : <input type='password'name='pw' placeholder="PASSWORD"></p>
			<input type='submit' value='Login'>
		</form>
		<p></p>
		<a href="join.html"><strong>[회원가입]</strong></a>

		<?php
	}
		
	else
	{
		?>

		<div style=" width:30%;">
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto" style="display:flex;align-items: center; ">
					<li class="nav-item"style="display:flex;align-items: center;font-size:18px; ">
						<a class="nav-link" href="board.php" name='write' method='POST' >글쓰기</a>
						&nbsp&nbsp&nbsp
					</li>
					<li class="nav-item"style="display:flex;align-items: center; font-size:18px;">
						<a class="nav-link" href="notice.php">게시판</a>
						&nbsp&nbsp&nbsp
					</li>
							
				</ul>
			</div>
		</div>
				
		<?php
		
		echo "".$_SESSION['id']."님 환영합니다. ";
		echo " ";
		echo "&nbsp;<a href='logout.php'><input type='button' value='logout'></a><br />";
				
			
	}
			
?>
		
</body>	
</html>
