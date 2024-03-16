<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>จำหน่ายข้อมูลสินค้า</title>
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
                    $sale_id = $_GET["sale"];
                    $query = "SELECT * FROM sale ,customer, sale_type  
                    WHERE sale.cus_id = customer.cus_id and
                        sale.s_type_code = sale_type.s_type_code and 
                        sale.sale_id = '$sale_id' 
                    ORDER BY sale_id desc" or die("Error:" . mysqli_error());
                    $result = mysqli_query($con, $query);
                    $data = mysqli_fetch_assoc($result);
                    ?>
                    <?php

                    // วันที่แบบ พศ
                    $month_arr = array(
                        "มกราคม", "กุมภาพันธ์", "มีนาคม",
                        "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฏาคม", "สิงหาคม", "กันยายน",
                        "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    );

                    // Use function strtok to seperate year month day 
                    $tok = strtok("$data[sale_date]", "-");
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
                    ?>
                    <br>
                    <br>
                    <h3 align="center"> ใบเสร็จการขายเลขที่ : <font color="blue"><?php echo $sale_id; ?></font>
                    </h3>
                    <h4 align="center"> สถานะการขาย : <font color="blue"><?php echo $data['s_type_code']; ?></font>
                    </h4>
                    <h4 align="center"> วันที่ : <font color="blue"><?php echo $t_date_game ?></font>
                    </h4>
                    <h4 align="center"> ชื่อ-นามสกุล : <font color="blue"><?php echo $data['cus_name'] ?> </font>
                    </h4>

                    <?php
                    $type = $data['s_type_charge'];
                    include('connection.php');
                    $find_raw_id = $_GET["sale"];
                    $sql = " SELECT *  FROM sale_detail as d
                        INNER JOIN  product as p ON p.prod_id = d.prod_id
                        WHERE sale_id like '%" . $find_raw_id . "%'
                        ORDER BY sale_id ";
                    $result = mysqli_query($con, $sql);


                    $sql1 = "SELECT SUM( CASE WHEN sale_id LIKE '%" . $find_raw_id . "%' THEN 1 ELSE 0 END ) AS num_sale
                        FROM `sale_detail` WHERE 1";
                    $result1 = mysqli_query($con, $sql1);
                    $row = mysqli_num_rows($result1);
                    $rown = mysqli_fetch_array($result1);

                    echo "<table width='350' border='3' cellpadding='5' cellspacing='1'>";
                    echo "<tr bgcolor='ffcc00'> 
                        <td align='center'><font color='blue'>ลำดับ</font></td>
                        <td align='center'><font color='blue'>รายการสินค้า</font></td>
                        <td align='center'><font color='blue'>จำนวน</font></td>
                        <td align='center'><font color='blue'>ราคาต่อหน่วย</font></td>
                        <td align='center'><font color='blue'>ราคาส่ง</font></td>
                        <td align='center'><font color='blue'>ราคาฝากต่อหน่วย</font></td>
                        </tr>";
                    $totalsum = 0;
                    $totaldepo = 0;
                    $i=1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td align='center'>$i</td>";
                        echo "<td align='center'>$row[prod_name]</td>";
                        echo "<td align='center'> &emsp;&emsp;$row[sale_amount]</td>";
                        echo "<td align='center'>&emsp;$row[sale_price] </td>";
                        $hiv = $row['sale_amount']-1;
                        $sum1 = $hiv*10;
                        $total = $sum1 + 20;
                        $totalsum=$total+$totalsum ;
                        $depo = $row['sale_amount'] * $type;
                        $totaldepo=$depo+$totaldepo ;
                        echo "<td align='center'> " .  $total . ".00</td>";
                        echo "<td align='center'>$type</td>";
                        echo "</tr>";
                        $i++;
                    }

                    echo "</table>";
                    mysqli_close($con);
                    ?>
                    </table>
                    <?php
                    include('connection.php');
                    $find_raw_id = $_GET["sale"];
                    $sql = " SELECT sale_price*sale_amount  FROM sale_detail 
                        WHERE sale_id like '%" . $find_raw_id . "%'
                        ORDER BY sale_id ";
                    $result = mysqli_query($con, $sql);
                    $sum = 0;
                    while ($resultarray = mysqli_fetch_array($result)) {

                        $sum += (int)$resultarray['sale_price*sale_amount'];
                    }
                    ?>
                    <table>
                        <tr>
                            <td></td>
                            <td>&emsp;&emsp;&emsp;&emsp;</td>
                            <td>&emsp;&emsp;&emsp;&emsp;</td>
                            <td align="center">
                                
                                <font color="blue"> รวมยอดทั้งหมด </font>
                            </td>
                            <td align="center">

                                <?php echo $sum; ?>.00
                            </td>
                            <td align="center">
                                
                                <font color="blue"> รวมส่งทั้งหมด </font>
                            </td>
                            <td><?php echo $totalsum; ?>.00</td>
                            <td align="center">
                                
                                <font color="blue"> รวมฝากทั้งหมด </font>
                            </td>
                            <td><?php echo $totaldepo; ?>.00</td>
                        </tr>
                        <tr>
                            
                            <td colspan=6 align="right"><font color="blue">ยอดรวมทั้งหมด </td>
                            <td><?php echo $sum+$totalsum+$totaldepo; ?>.00 บาท</td>
                    </tr>
                    </table>
                    <input type="button" onclick="history.back()" value="ย้อนกลับ">
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