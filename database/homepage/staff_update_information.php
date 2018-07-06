<?php
ini_set('display_errors',1);

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");

$A=$_POST[TextBox041];
$B=$_POST[TextBox042];
$C=$_POST[TextBox043];
$D=$_POST[TextBox044];
$E=$_POST[TextBox045];
$F=$_POST[TextBox046];
$G=$_POST[TextBox047];
$H=$_POST[TextBox048];
$I=$_POST[TextBox049];

if($B!=""){
	$query1 = "update EMP_MANAGEMENT set EMP_NAME='$B' where EMP_ID = '$A'";
}

if($C!=""){
	$query2 = "update EMP_MANAGEMENT set EMP_SEX='$C' where EMP_ID = '$A'";
}

if($D!=""){
	$query3 = "update EMP_MANAGEMENT set EMP_AGE='$D' where EMP_ID = '$A'";
}

if($E!=""){
	$query4 = "update EMP_MANAGEMENT set EMP_POST_NUM='$E' where EMP_ID = '$A'";
}

if($F!=""){
	$query5 = "update EMP_MANAGEMENT set EMP_POST='$F' where EMP_ID = '$A'";
}

if($G!=""){
	$query6 = "update EMP_MANAGEMENT set EMP_TEL_NUM='$G' where EMP_ID = '$A'";
}

if($H!=""){
	$query7 = "update EMP_MANAGEMENT set EMP_MOB_NUM='$H' where EMP_ID = '$A'";
}

if($I!=""){
	$query8 = "update EMP_MANAGEMENT set EMP_RANK='$I' where EMP_ID = '$A'";
}


$stid1 = oci_parse($conn, $query1) or die('pa');
oci_execute($stid1) or die('ex');

$stid2 = oci_parse($conn, $query2) or die('pa');
oci_execute($stid2) or die('ex');

$stid3 = oci_parse($conn, $query3) or die('pa');
oci_execute($stid3) or die('ex');

$stid4 = oci_parse($conn, $query4) or die('pa');
oci_execute($stid3) or die('ex');

$stid5 = oci_parse($conn, $query5) or die('pa');
oci_execute($stid3) or die('ex');

$stid6 = oci_parse($conn, $query6) or die('pa');
oci_execute($stid3) or die('ex');

$stid7 = oci_parse($conn, $query7) or die('pa');
oci_execute($stid3) or die('ex');

$stid8 = oci_parse($conn, $query8) or die('pa');
oci_execute($stid3) or die('ex');




$commit = oci_parse($conn, 'commit');
oci_execute($commit);

echo '1';
oci_close($conn);
?>



<script>
	window.open('staff_update.html','second');
</script>