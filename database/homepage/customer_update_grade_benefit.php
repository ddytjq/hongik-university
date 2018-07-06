<?php
ini_set('display_errors',1);

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");

$A=$_POST[TextBox041];
$B=$_POST[TextBox042];
$C=$_POST[TextBox043];
$D=$_POST[TextBox044];
$E=$_POST[TextBox045];

if($B!=""){
	$query1 = "update CUS_GRADE_BENEFIT set CUS_RANK='$B' where CUS_ID = '$A'";
}
if($C!=""){
	$query2 = "update CUS_GRADE_BENEFIT set CUS_TOTAL_ORDER='$C' where CUS_ID = '$A'";
}
if($D!=""){
	$query3 = "update CUS_GRADE_BENEFIT set CUS_COUPON='$D' where CUS_ID = '$A'";
}
if($E!=""){
	$query4 = "update CUS_GRADE_BENEFIT set CUS_SAVE_MONEY='$E' where CUS_ID = '$A'";
}


$stid1 = oci_parse($conn, $query1) or die('pa');
oci_execute($stid1) or die('ex');

$stid2 = oci_parse($conn, $query2) or die('pa');
oci_execute($stid2) or die('ex');

$stid3 = oci_parse($conn, $query3) or die('pa');
oci_execute($stid3) or die('ex');

$stid4 = oci_parse($conn, $query4) or die('pa');
oci_execute($stid4) or die('ex');

$commit = oci_parse($conn, 'commit');
oci_execute($commit);

echo '1';
oci_close($conn);
?>

<script>
	window.open('customer_update.html','second');
</script>