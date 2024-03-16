<meta charset="UTF-8">
<?php
include('connection.php');

if ($_POST["sup_id"] == '') {
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'supplier.php'; ";
    echo "</script>";
}

$sup_id = $_POST["sup_id"];
$sup_desc = $_POST["sup_desc"];
$phone = $_POST["phone"];



$sql = "INSERT INTO supplier SET  
        sup_id='$sup_id' ,
        sup_name='$sup_desc' ,
        sub_phone='$sub_phone', ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'supplier.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error !!!');";
    echo "window.location = 'supplier.php'; ";
    echo "</script>";
}
?>