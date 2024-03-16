<html>

<body>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "aucc";

	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

	for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
		if (isset($_POST["item$i"])) {
			$strSQL = "INSERT INTO buy_detail ";
			$strSQL .= "(item,buy_id,raw_id,buy_cost,buy_amount) ";
			$strSQL .= "VALUES ";
			$strSQL .= "('" . $_POST["item$i"] . "','" . $_REQUEST["buy"] . "','" . $_POST["raw_id$i"] . "', ";
			$strSQL .= "'" . $_POST["buy_cost$i"] . "' ";
			$strSQL .= ",'" . $_POST["buy_amount$i"] . "')";
			$objQuery = mysqli_query($conn, $strSQL);
		}
	}
	for ($i = 1; $i <= $_POST["hdnLine"]; $i++) {
		if (isset($_POST["item$i"])) {
			$sql = " UPDATE product SET stock = stock + '" . $_POST["buy_amount$i"] . "' where prod_id = '" . $_POST["prod_id$i"] . "'";
			$result = mysqli_query($conn, $sql);
		}
	}


	mysqli_close($conn);

	if ($objQuery)
		echo "<script>
		window.location='buy_report.php?buys=" . $_REQUEST['buy'] . "';
	alert('เพิ่มข้อมูลสำเร็จ');</script>";
	else
		echo "เพิ่มข้อมูลไม่สำเร็จ";
	?>
</body>

</html>