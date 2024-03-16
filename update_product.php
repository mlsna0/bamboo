<meta charset="UTF-8">
<?php
 
include('connection.php');

// File upload path
 

//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["product_id"]==''){
echo "<script type='text/javascript'>"; 
echo "alert('Error Contact Admin !!');"; 
echo "window.location = 'product.php'; "; 
echo "</script>";
}else{
    
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
	$prod_amount = $_POST["prod_amount"];
    $prod_cost = $_POST["prod_cost"];
    $prod_price = $_POST["prod_price"];
	

	
	$sql = "UPDATE product SET
            prod_id='$prod_id' ,  
			prod_name='$prod_name',
			prod_amount='$prod_amount' ,
            prod_cost='$prod_cost' ,
            prod_price='$prod_price' ,  
			WHERE prod_id='$prod_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
if($result){
	echo "<script type='text/javascript'>";
	echo  "alert('แก้ไขสำเร็จ');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'product.php'; ";
	echo "</script>";
}


}

 
?>