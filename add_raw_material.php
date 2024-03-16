<meta charset="UTF-8">
<?php
include('connection.php');

if ($_POST["raw_id"] == '') {
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'raw_material.php'; ";
    echo "</script>";
}

$raw = $_POST["raw_id"];
$raw_name = $_POST["raw_name"];
$raw_amount = $_POST["raw_amount"];
$raw_min_amount = $_POST["raw_min_amount"];
$raw_cost = $_POST["raw_cost"];


$sql = "INSERT INTO raw_material SET  
        raw_id='$raw_id' ,
        raw_name='$raw_name' ,
        raw_amount='$raw_amount',
        raw_min_amount='$raw_min_amount',
        raw_cost='$raw_cost' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'raw_material.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error !!!');";
    echo "window.location = 'raw_material.php'; ";
    echo "</script>";
}
?>