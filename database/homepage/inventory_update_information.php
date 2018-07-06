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

if($C!=""){
	$query1 = "update PRODUCT_MANAGEMENT set GOODS_NAME='$C' where EMP_ID = '$A' and GOODS_CODE = '$B'";
}

if($D!=""){
	$query2 = "update PRODUCT_MANAGEMENT set GOODS_SEP='$D' where EMP_ID = '$A' and GOODS_CODE = '$B'";
}

if($E!=""){
	$query3 = "update PRODUCT_MANAGEMENT set GOODS_TRUE_PRICE='$E' where EMP_ID = '$A' and GOODS_CODE = '$B'";
}

if($F!=""){
	$query4 = "update PRODUCT_MANAGEMENT set GOODS_PRICE='$F' where EMP_ID = '$A' and GOODS_CODE = '$B'";
}

if($G!=""){
	$query5 = "update PRODUCT_MANAGEMENT set GOODS_DATE='$G' where EMP_ID = '$A' and GOODS_CODE = '$B'";
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

$commit = oci_parse($conn, 'commit');
oci_execute($commit);

echo '1';
oci_close($conn);
?>



<script>
	window.open('inventory_update.html','second');
</script>