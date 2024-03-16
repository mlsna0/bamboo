<html>

<body>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "aucc";

	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
	
	$sendtotal = 0;

	for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
		if (isset($_POST["item$i"])) {
			$Pid=$_POST["prod_id$i"];
			$strSQL1 = "SELECT * FROM product WHERE prod_id='$Pid' ";
	$objQuery1 = mysqli_query($conn,$strSQL1);
	$data = mysqli_fetch_assoc($objQuery1);
    $id=$_REQUEST['sale'];
	$sql = " select * from sale join sale_status ON sale.sale_sts = sale_status.sale_sts WHERE sale.sale_id = '$id' ";
                                        $result = mysqli_query($conn, $sql);
                                        $w = mysqli_fetch_assoc($result);

			$strSQL = "INSERT INTO sale_detail ";
			$strSQL .= "(sale_id,prod_id,sale_amount,sale_price,sale_cost) ";
			$strSQL .= "VALUES ";
			$strSQL .= "('" . $_POST["sale_id$i"] . "','" . $_REQUEST["sale"] . "','" . $_POST["prod_id$i"] . "', '" . $data["sale_price"]  . "',";
			$strSQL .= "'" . $w["sale_sts"] . "' ";
			$strSQL .= ",'" . $_POST["sale_amount$i"] . "')";
			$objQuery = mysqli_query($conn, $strSQL);

			$hiv = $_POST["sale_amount$i"]-1;
                        $sum1 = $hiv*10;
                        $total = $sum1 + 20;
                        $totalsum=$total+$totalsum ;
                        //$depo = $row['sale_amount'] * $type;
                        //$totaldepo=$depo+$totaldepo ;
						//$sendtotal = $sendtotal + $totaldepo;

						$percent = ($totalsum * 20 ) / 100;
						$per = $totalsum - $percent;

			
		}
	}

	for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
		if (isset($_POST["sale_id"])) {
			$sql = " UPDATE product SET stock = stock - '" . $_POST["sale_amount$i"] . "' where prod_id = '" . $_POST["prod_id$i"] . "'";
			$result = mysqli_query($conn, $sql);
		}
	}


	mysqli_close($conn);

	if ($objQuery)
		echo "<script>
		window.location='sale_report.php?sales=" . $_REQUEST['sale'] . "';
	alert('เพิ่มข้อมูลสำเร็จ');</script>";
	else
		echo "เพิ่มข้อมูลไม่สำเร็จ";
	?>
</body>

</html>