<html>
<?php
include('connection.php');

$sale_id = $_POST["sale_id"];
$sale_date = $_POST["sale_date"];
echo $customer_id = $_POST["cus_id"];
echo$sale_sts = $_POST["sale_sts"];
$sql = " select * from sale_status where sale_sts ='$sale_sts' ";
                                        $result = mysqli_query($con, $sql);
                                    while ($w = mysqli_fetch_assoc($result)){
                                        //echo "<BR> ".$sql." <BR>" ;
$date_in= date('Y-m-d');
$days_in=$w["s_day"];



//echo " Use function strtok to seperate year month day <br>";
$tok = strtok($date_in, "-");
$year = $tok ;
$tok  = strtok("-");
$month = $tok ;
$tok = strtok("-");
$day = $tok ;

$jd = gregoriantojd($month,$day,$year);
$jd = $jd+$days_in ;
$greg  = jdtogregorian($jd);

//echo  " Conver to mysql <BR> " ;
$tok = strtok($greg, "\/");
$month = $tok ;
if ($month < 10 )
$month = "0".$month ;

$tok = strtok("\/");
$day = $tok ;
if ($day < 10 )
$day = "0".$day ;

$tok  = strtok("\/");
$year = $tok ;

$next_date = $year."-".$month."-".$day ;
//echo " Next Date ".$next_date." <BR> <BR>";
}
$due_date = $next_date;                
$sql = "INSERT INTO sale(sale_id, sale_date, cust_id, sale_sts, due_date )
		    VALUES('$sale_id', 
                    '$sale_date',  
                    '$sale_sts',
                    '$due_date'


                    )";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con);

if ($result)
    echo "<script>
window.location='sale_detail_insert.php?Line=" . $_REQUEST['Line'] . "';
alert('เพิ่มข้อมูลสำเร็จ');</script>";
else
    echo "เพิ่มข้อมูลไม่สำเร็จ";
?>

</html>