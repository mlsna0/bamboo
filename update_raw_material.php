<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["raw_id"]==''){
echo "<script type='text/javascript'>"; 
echo "alert('Error Contact Admin !!');"; 
echo "window.location = 'raw_material.php'; "; 
echo "</script>";
}

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$raw_id = $_POST["raw_id"];
$raw_name = $_POST["raw_name"];
$raw_amount = $_POST["raw_amount"];
$raw_min_amount = $_POST["raw_min_amount"];
$raw_cost = $_POST["raw_cost"];
    

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
$sql = "UPDATE  raw_material SET  
raw_id='$raw_id' ,
raw_name='$raw_name',
raw_amount='$raw_amount' ,
raw_min_amount='$raw_min_amount' ,
raw_cost='$raw_cost'
WHERE raw_id = '$raw_id' " ;  

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());


mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขสำเร็จ');";
	echo "window.location = 'raw_material.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'raw_material.php'; ";
	echo "</script>";
}
?>