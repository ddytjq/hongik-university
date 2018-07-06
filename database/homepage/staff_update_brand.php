<?php
ini_set('display_errors',1);

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");

$A=$_POST[TextBox041];
$B=$_POST[TextBox042];
$C=$_POST[TextBox043];
$D=$_POST[TextBox044];

if($C!=""){
	$query1 = "update BRAND_MANAGEMENT set BRAND_TIME='$C' where EMP_ID = '$A' and BRAND_NAME = '$B'";
}

if($D!=""){
	$query2 = "update BRNAD_MANAGEMENT set BRAND_TEL_NUM='$D' where EMP_ID = '$A' and BRAND_NAME = '$B'";
}


$stid1 = oci_parse($conn, $query1) or die('pa');
oci_execute($stid1) or die('ex');

$stid2 = oci_parse($conn, $query2) or die('pa');
oci_execute($stid2) or die('ex');


$commit = oci_parse($conn, 'commit');
oci_execute($commit);

echo '1';
oci_close($conn);
?>



<script>
	window.open('staff_update.html','second');
</script>