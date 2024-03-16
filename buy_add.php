<html>
<?php
include('connection.php');

$buy_id = $_POST["buy_id"];
$buy_date = $_POST["buy_date"];
echo $sup_id = $_POST["sup_id"];
echo$buy_status = $_POST["buy_status"];

$sql = "INSERT INTO buys(buy_id,buy_date, sup_id,  buy_status )
		    VALUES('$buy_id', 
                    '$buy_date', 
                    '$sup_id', 
                    '$buy_status')";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result)
    echo "<script>
window.location='buy_detail_insert.php?Line=" . $_REQUEST['Line'] . "';
alert('เพิ่มข้อมูลสำเร็จ');</script>";
else
    echo "เพิ่มข้อมูลไม่สำเร็จ";
?>

</html>