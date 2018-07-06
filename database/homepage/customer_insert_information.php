<?php
ini_set('display_errors',1);

$A=$_POST[TextBox041];
$B=$_POST[TextBox042];
$C=$_POST[TextBox043];
$D=$_POST[TextBox044];
$E=$_POST[TextBox045];
$F=$_POST[TextBox046];
$G=$_POST[TextBox047];
$H=$_POST[TextBox048];


$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");
$query = "insert into CUS_MANAGEMENT values('$A', '$B', '$C', '$D', '$E', '$F', '$G', '$H')";

echo $query;
$stid = oci_parse($conn, $query) or die('pa');
oci_execute($stid) or die('ex');

$stid = oci_parse($conn, 'commit');
oci_execute($stid);

echo '1';
oci_close($conn);
?>



<script>
window.open('customer_insert.html','second');
</script>