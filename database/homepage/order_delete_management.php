<?php
ini_set('display_errors',1);

$A=$_POST[TextBox101];
$B=$_POST[TextBox102];
$C=$_POST[TextBox103];
$D=$_POST[TextBox104];

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");


$query1 = "delete from ORDER_MANAGEMENT where EMP_ID='$A' and CUS_ID='$B' and ORDER_NUM='$C' and GOODS_CODE='$D'";	


$stid1 = oci_parse($conn, $query1) or die('pa');
oci_execute($stid1) or die('ex');


$commit = oci_parse($conn, 'commit');
oci_execute($commit);


echo '1';
oci_close($conn);

?>



<script>
window.open('order_delete.html','second');
</script>