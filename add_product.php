<meta charset="UTF-8">
<?php
include('connection.php');
 

 
if ($_POST["prod_id"] == '') {
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
}

$prod_id = $_POST["prod_id"];
$prod_name = $_POST["prod_name"];
$prod_amount = $_POST["prod_amount"];
$prod_cost = $_POST["prod_cost"];
$prod_price = $_POST["prod_price"];
 

 


$sql = "INSERT INTO product SET  
        prod_id='$prod_id' ,
        prod_name='$prod_name',
        prod_amount='$prod_amount',
        prod_cost='$prod_cost',
        prod_price='$prod_price' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error !!!');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
}
?>

<?php 
session_start();
include('connection.php');

// File upload path
$targetDir = "images/";

if (isset($_POST['submit'])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $con->query("INSERT INTO images(file_name,uploaded_on,product_id) VALUES ('".$fileName."',NOW(),'".$product_id."')");
                if ($insert) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                    header("location: product.php");
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: product.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: product.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: product.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: product.php");
    }
}

?>