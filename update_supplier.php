<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["sup_id"]==''){
echo "<script type='text/javascript'>"; 
echo "alert('Error Contact Admin !!');"; 
echo "window.location = 'supplier.php'; "; 
echo "</script>";
}

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$sup_id = $_POST["sup_id"];
	$sup_name = $_POST["sup_name"];
    $sub_phone = $_POST["sub_phone"];

    

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE supplier SET  
			sup_name='$sup_name' ,
            sub_phone='$sub_phone' ,  
			WHERE sup_id='$sup_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());


mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขสำเร็จ');";
	echo "window.location = 'supplier.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'supplier.php'; ";
	echo "</script>";
}
?>