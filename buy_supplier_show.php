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

<header id="header">
						<div class="inner">

							

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
						<li><a href="index.php">หน้าแรก</a></li>
    <li>
        <span class="opener">ข้อมูลพื้นฐาน</span>
        <ul>
            <li><a href="customer.php">การจัดการข้อมูลลูกค้า</a></li>
            <li><a href="supplier.php">การจัดการข้อมูลคนจำหน่ายวัตถุดิบ</a></li>
            <li><a href="product.php">ข้อมูลสินค้า</a></li>
            <li><a href="raw_material.php">ข้อมูลวัตถุดิบ</a></li>        
        </ul>
    </li>
	<li>
        <span class="opener">การทำงาน</span>
        <ul>
            <li><a href="sale_product.php">จำหน่ายสินค้า</a></li>
            <li><a href="buy_product.php">ซื้อสินค้าสินค้า</a></li>
        </ul>
    </li>
    <li>
        <span class="opener">รายงาน</span>
        <ul>
            <li><a href="report_sale.php">รายงานการจำหน่ายสินค้า</a></li>
            <li><a href="report_buy.php">รายงานการรับสินค้าเข้า</a></li>
            <li><a href="report_finance.php">รายงานกำไรขาดทุน</a></li>
        </ul>
    </li>
						</ul>
					</nav>
                    
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <div class="content">
                    <?php
                    include('connection.php');
                    $buy_id = $_GET["sup_id"];
                    $query = "SELECT * FROM buy ,supplier 
                    WHERE buy.sup_id = supplier.sup_id and supplier.sup_id = '$buy_id'
                    ORDER BY buy_id desc" or die("Error:" . mysqli_error());
                    $result = mysqli_query($con, $query);
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <br>
                    <br>
                    <h3 align="center"> รายละเอียดลูกค้ารหัส : <font color="blue"><?php echo $buy_id; ?></font>
                    </h3>
                    <h4 align="center"> ชื่อSup : <font color="blue"><?php echo $data['sup_desc'] ?> </font>
                    </h4>
                    <h4 align="center"> เบอร์โทร : <font color="blue"><?php echo $data['sub_phone'] ?></font>
                    </h4>
                    <br>
                    <h4>ประวัติการซื้อสินค้า</h4>
                    <?php
                    include('connection.php');
                    $find_raw_id = $_GET["sup_id"];
                    $sql = " SELECT *  FROM buy
                        WHERE sup_id like '%" . $find_raw_id . "%'
                        ORDER BY sup_id ";
                    $result = mysqli_query($con, $sql);


                    $sql1 = "SELECT SUM( CASE WHEN buy_id LIKE '%" . $find_raw_id . "%' THEN 1 ELSE 0 END ) AS num_sale
                        FROM `buy_detail` WHERE 1";
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
              $tok = strtok("$row[buy_date]", "-");
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
                        echo "<td align='center'><a href='buy_show.php?buy_id=$row[buy_id]'>" . $row["buy_id"] . "</a></td> ";
                        echo "<td align='center'><font color='#32CD32'>$row[buy_status]</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    mysqli_close($con);
                    ?>
                    </table>
                    <form>
                        <center>
                        <td> <input type="button" onclick="history.back()" value="ย้อนกลับ"> </td>
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