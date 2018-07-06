<meta charset="utf-8">
<?php   
session_start();
session_destroy();
echo "<script>window.alert('logout success');</script>";
echo "<script>location.href='index.php';</script>"; 
?>
