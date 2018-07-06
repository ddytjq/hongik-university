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

if($B!=""){
	$query1 = "update CUS_MANAGEMENT set CUS_NAME='$B' where CUS_ID = '$A'";
}
if($C!=""){
	$query2 = "update CUS_MANAGEMENT set CUS_SEX='$C' where CUS_ID = '$A'";
}
if($D!=""){
	$query3 = "update CUS_MANAGEMENT set CUS_AGE='$D' where CUS_ID = '$A'";
}
if($E!=""){
	$query4 = "update CUS_MANAGEMENT set CUS_POST_NUM='$E' where CUS_ID = '$A'";
}
if($F!=""){
	$query5 = "update CUS_MANAGEMENT set CUS_POST='$F' where CUS_ID = '$A'";
}
if($G!=""){
	$query6 = "update CUS_MANAGEMENT set CUS_TEL_NUM='$G' where CUS_ID = '$A'";
}
if($H!=""){
	$query7 = "update CUS_MANAGEMENT set CUS_MOB_NUM='$H' where CUS_ID = '$A'";
}

$stid1 = oci_parse($conn, $query1) or die('pa');
oci_execute($stid1) or die('ex');

$stid2 = oci_parse($conn, $query2) or die('pa');
oci_execute($stid2) or die('ex');

$stid3 = oci_parse($conn, $query3) or die('pa');
oci_execute($stid3) or die('ex');

$stid4 = oci_parse($conn, $query4) or die('pa');
oci_execute($stid4) or die('ex');

$stid5 = oci_parse($conn, $query5) or die('pa');
oci_execute($stid5) or die('ex');

$stid6 = oci_parse($conn, $query6) or die('pa');
oci_execute($stid6) or die('ex');

$stid7 = oci_parse($conn, $query7) or die('pa');
oci_execute($stid7) or die('ex');

$commit = oci_parse($conn, 'commit');
oci_execute($commit);

echo '1';
oci_close($conn);
?>

<script>
	window.open('customer_update.html','second');
</script>