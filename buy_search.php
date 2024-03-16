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
                    <header>
                        <br />
                        <H3> การจัดการข้อมูลจำหน่ายสินค้า </H3>
                        </td>
                    </header>
                    <table border="0">
                        <tr>
                            <form id="form1" name="form1" method="GET" action='buy_search.php'>
                                <div class="row uniform">
                                    <div class="6u 12u$(xsmall)">
                                        <td> <label> &nbsp; รหัสการขาย </label> </td>
                                        <td> <input type="text" name="buy_id"> </td>
                                        <td> <label> &nbsp; วันที่การขาย &nbsp; </label> </td>
                                        <td> <input type="date" name="buy_date"> </td>
                                        <td> <input type="submit" name="btnSearch" value="ค้นหา"> </td>
                                        <td> <input type="reset" name="btnreset" value="ล้าง"> </td>
                            </form>

                            <form id="form2" name="form2" method="post" action="buy_insert.php">
                                <td> <input type="submit" name="btnAdd" value="บันทึกการรับสินค้า"> </td>
                            </form>
                </div>
            </div>
            </tr>
            </table>
            <!-- Section -->
            <section>
                <?php
                include('connection.php');
                $search = isset($_GET['buy_id']) ? $_GET['buy_id'] : '';
                $search1 = isset($_GET['buy_date']) ? $_GET['buy_date'] : '';

                $query = "SELECT * FROM buy ,supplier 
                WHERE buy.sup_id = supplier.sup_id 
                AND buy.buy_id LIKE '%$search%'  
                AND buy_date LIKE '%$search1%' 
                ORDER BY buy_id desc" or die("Error:" . mysqli_error());
                $result = mysqli_query($con, $query);
                echo "<table border='1' align='center'>";
                echo "<tr bgcolor='ffcc00'>
                <td align='center'><font color='blue'>รหัสการขาย</td>
                <td></td>
                <td></td>
                <td></td>
                <td ><font color='blue'>ข้อมูลร้านค้า</td>
                <td align='center'><font color='blue'>วันที่ทำการขาย</td>
                <td align='center'><font color='blue'>สถานะการขาย</td>
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
                  
                    echo "<tr bgcolor=''>";
					echo "<td align='center'><a href='sale_show.php?buy_id=$row[buy_id]'>" . $row["buy_id"] . "</a></td> ";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
					echo "<td ><a href='sale_customer_show.php?sup_id=$row[sup_id]'>" . $row["sup_id"] .' : ('. $row["sup_desc"]."</a></td> ";
                    echo "<td align='center'>" . $t_date_game ."</td> ";
					echo "<td align='center'><font color='#32CD32'>" . $row["buy_status"] .  "</font></td> ";
					echo "</tr>";
                }
                echo "</table>";


                mysqli_close($con);
                ?>
            </section>
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