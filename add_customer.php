<meta charset="UTF-8">
<?php
include('connection.php');

if ($_POST["customer_id"] == '') {
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'customer.php'; ";
    echo "</script>";
}

$cus_id = $_POST["cus_id"];
$cus_name = $_POST["cus_name"];
$cus_phone = $_POST["cus_phone"];



$sql = "INSERT INTO customer SET  
        cus_id='$cust_id' ,
        cus_name='$cus_name' ,
        cus_ phone='$cus_phone',


$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'customer.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error !!!');";
    echo "window.location = 'customer.php'; ";
    echo "</script>";
}
?>