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

if($E!=""){
	$query1 = "update ORDER_MANAGEMENT set ORDER_AMOUNT='$E' where EMP_ID = '$A' and CUS_ID = '$B' and ORDER_NUM = '$C' and GOODS_CODE = '$D'";
}

if($F!=""){
	$query2 = "update ORDER_MANAGEMENT set ORDER_SIZE='$F' where EMP_ID = '$A' and CUS_ID = '$B' and ORDER_NUM = '$C' and GOODS_CODE = '$D'";
}

if($G!=""){
	$query3 = "update ORDER_MANAGEMENT set ORDER_PRICE='$G' where EMP_ID = '$A' and CUS_ID = '$B' and ORDER_NUM = '$C' and GOODS_CODE = '$D'";
}


if($I!=""){
	$query4 = "update ORDER_MANAGEMENT set ORDER_DATE='$H' where EMP_ID = '$A' and CUS_ID = '$B' and ORDER_NUM = '$C' and GOODS_CODE = '$D'";
}

if($J!=""){
	$query5 = "update ORDER_MANAGEMENT set ORDER_PAYMENT='$I' where EMP_ID = '$A' and CUS_ID = '$B' and ORDER_NUM = '$C' and GOODS_CODE = '$D'";
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
	window.open('order_update.html','second');
</script>