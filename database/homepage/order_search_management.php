<?php

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");

$A=$_POST[TextBox041];

if($A==""){
	$query = "select * from ORDER_MANAGEMENT";
}
else{
	$query = "select * from ORDER_MANAGEMENT where ORDER_NUM='$A'";
}

$stid = oci_parse($conn, $query);
oci_execute($stid);

$commit = oci_parse($conn, 'commit');
oci_execute($commit);

oci_close($conn);
?>

<?php

$conn = oci_connect("b389013", "b389013", "203.249.87.162/orcl");

$B=$_POST[TextBox041];

if($B==""){
	$query1 = "select sum(ORDER_PRICE) from ORDER_MANAGEMENT";
}
else{
	$query1 = "select sum(ORDER_PRICE) from ORDER_MANAGEMENT where ORDER_NUM='$B'";
}
$stid1 = oci_parse($conn, $query1);
oci_execute($stid1);

$commit = oci_parse($conn, 'commit');
oci_execute($commit);

oci_close($conn);
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Heroes of Street</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

	<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">&nbsp&nbsp Heroes of Street </a></h1>
		</div>
		<div id="menu">
			<ul><strong>
				<li><a href="index.html" accesskey="1" title="">Homepage</a></li>
				<li class="current_page_item"><a href="order.html" accesskey="2" title="">Order</a></li>
				<li><a href="customer.html" accesskey="3" title="">Customer </a></li>
				<li><a href="staff.html" accesskey="4" title="">Staff</a></li>
				<li><a href="inventory.html" accesskey="5" title="">Inventory</a></li>
				<strong></ul>
				</div>
			</div>
		</div>

	</head>

	<STYLE TYPE="text/css">
	<!--
	.background{background-repeat:repeat}
	.font1{font-size:15pt; font-family:cursive;
		font-weight:bold;color:green;width:100%;height:23;
		Filter:Shadow(color=f0e68c,direction=125); text-align:left}
		.font2{font-size:15pt; font-family: µ¸¿ò; color:#2f8bef}
		.font3{font-size:12pt; font-family: µ¸¿ò; color:#808080}
		//-->
	</STYLE>

	<body>
		<BR>
		<BR>
		<TABLE BORDER="0" ALIGN="CENTER">
			<TR>
				<TD>
					<FONT CLASS="font1">
						*Search Result*
					</FONT>
				</TD>
				<TR>
				</TABLE>
				<BR>

				<TABLE BORDER="1" ALIGN="center">
					<TR>
						<TD>
							EMPLOYEE ID
						</TD>
						<TD>
							CUSTOMER ID
						</TD>
						<TD>
							ORDER NUMBER
						</TD>
						<TD>
							GOODS CODE
						</TD>
						<TD>
							ORDER AMOUNT
						</TD>
						<TD>
							ORDER SIZE
						</TD>
						<TD>
							ORDER PRICE ($)
						</TD>
						<TD>
							ORDER DATE
						</TD>
						<TD>
							ORDER PAYMENT
						</TD>

					</TR>
					<?php
					while($row=oci_fetch_array($stid,OCI_BOTH))
					{
						echo "<tr>
						<td>".$row[0]."</td>
						<td>".$row[1]."</td>
						<td>".$row[2]."</td>
						<td>".$row[3]."</td>
						<td>".$row[4]."</td>
						<td>".$row[5]."</td>
						<td>".$row[6]."</td>
						<td>".$row[7]."</td>
						<td>".$row[8]."</td>
						</tr>";
					}
					?>
				</TABLE>
				<BR></BR>

				<TABLE BORDER="0" ALIGN="CENTER">
					<TR>
						<TD>
							<FONT CLASS="font1">
								*Total payment price*
							</FONT>
						</TD>
						<TR>
						</TABLE>

						<BR>

						<TABLE BORDER="1" ALIGN="center">
							<TR>
								<TD>
									SUM PRICE ($)
								</TD>
							</TR>
							<?php
							while($row=oci_fetch_array($stid1,OCI_BOTH))
							{
								echo "<tr>
								<td>".$row[0]."</td>
								</tr>";
							}
							?>
						</TABLE>
					</body>

					<footer>
						<div class="extra">
							<div class="container">
								<div class="row">
									<div class="extra1"></br>
										<span></span>
										<p></p>
										<p></p>
										<h1><span>&nbsp&nbsp Heroes of Street</span></h1>
									</div>
									<div class="extra2">
										<p><Strong><span class="icon icon-home">&nbsp Heroes of Street next to Harvard University, Holyoke Center, Suite 880 1350 Massachusetts Avenue Cambridge, MA 02138</span></br>
											<span class="icon icon-phone">&nbsp  010-5158-5651</span></br>
											<span class="icon icon-user">&nbsp  Kim yo sub</span></br>
										&copy; Heroes of Street. ALL RIGHTS RESERVED</br></br></Strong></p>

									</div>
								</div>
							</div>
						</div>
					</footer>
					</html>
					</html>

