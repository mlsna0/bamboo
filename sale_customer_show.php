<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>ข้อมูลการขายสินค้า</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <div class="content">
                    <?php
                    include('connection.php');
                    $sale_id = $_GET["customer_id"];
                    $query = "SELECT * FROM sale ,customer 
                    WHERE sale.cus_id = customer.cus_id 
                    ORDER BY sale_id desc" or die("Error:" . mysqli_error());
                    $result = mysqli_query($con, $query);
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <br>
                    <br>
                    <h3 align="center"> รายละเอียดลูกค้ารหัส : <font color="blue"><?php echo $sale_id; ?></font>
                    </h3>
                    <h4 align="center"> ชื่อ-นามสกุล : <font color="blue"><?php echo $data['cus_name'] ?> </font>
                    </h4>
                    <h4 align="center"> เบอร์โทร : <font color="blue"><?php echo $data['cus_phone'] ?></font>
                    </h4>

                    <br>
                    <h4>ประวัติการซื้อสินค้า</h4>
                    <?php
                    include('connection.php');
                    $find_raw_id = $_GET["cust_id"];
                    $sql = " SELECT *  FROM sale 
                        WHERE cus_id like '%" . $find_raw_id . "%'
                        ORDER BY cust_id ";
                    $result = mysqli_query($con, $sql);


                    $sql1 = "SELECT SUM( CASE WHEN sale_id LIKE '%" . $find_raw_id . "%' THEN 1 ELSE 0 END ) AS num_sale
                        FROM `sale_detail` WHERE 1";
                    $result1 = mysqli_query($con, $sql1);
                    $row = mysqli_num_rows($result1);
                    $rown = mysqli_fetch_array($result1);

                    echo "<table width='350' border='3' cellpadding='5' cellspacing='1'>";
                    echo "<tr bgcolor='ffcc00'> 
                        <td align='center'><font color='blue'>วันที่</font></td>
                        <td align='center'><font color='blue'>รหัสการขาย</font></td>
                        <td align='center'><font color='blue'>สถานะการขาย</font></td>
                        </tr>";

                    while ($row = mysqli_fetch_array($result)) {

                    // วันที่แบบ พศ
              $month_arr = array(
                "มกราคม", "กุมภาพันธ์", "มีนาคม",
                "เมษายน", "พฤษภาคม", "มิถุนายน",
                "กรกฏาคม", "สิงหาคม", "กันยายน",
                "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
              );

              // Use function strtok to seperate year month day 
              $tok = strtok("$row[sale_date]", "-");
              $year = $tok;
              $tok  = strtok("-");
              $month = $tok;
              $tok = strtok("-");
              $day = $tok;

              $year_out = $year + 543;
              $cnt = $month - 1;

              $month_out = $month_arr[$cnt];
              //if ($day < 10 )
              //   $day_out = "0".$day; 
              //else
              $day_out = $day;

              $t_date_game = $day_out . " " . $month_out . " " . $year_out;
                        echo "<tr>";
                        echo "<td align='center'> $t_date_game</td>";
                        echo "<td align='center'><a href='sale_show.php?sale_id=$row[sale_id]'>" . $row["sale_id"] . "</a></td> ";
                        echo "<td align='center'><font color='#32CD32'>$row[s_type_code]</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    mysqli_close($con);
                    ?>
                    </table>
                    <form id="form2" name="form2" method="post" action="sale_product.php">
                        <center>
                            <td> <input type="submit" name="btnAdd" value="ย้อนกลับ"> </td>
                    </form>
                </div>
            </div>
        </div>


    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>