<!DOCTYPE HTML>
<html>

<head>
    <title>รายงานการจำหน่ายสินค้า</title>
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
                        <H3> ข้อมูลรายงานการจำหน่ายสินค้า </H3>
                        </td>
                    </header>
                    <table border="0">
                        <tr>
                            <form id="form1" name="form1" method="post" action='report_sale_detail.php'>
                                <div class="row uniform">
                                    <div class="6u 12u$(xsmall)">

                                        <td align="center">
                                            <font color='blue'> จาก <input type="date" name="date">
                                        </td>
                                        <td>
                                            <font color='blue'> ถึง <input type="date" name="due_date">
                                        </td>
                                        <td> <input type="submit" name="btnSearch" value="ค้นหารายงานการขายสินค้า"> </td>
                            </form>
                </div>
            </div>
            </tr>
            </table>
            <?php
            $date = $_POST['date'];
            $due_date = $_POST['due_date'];
            $month_arr = array(
                "มกราคม", "กุมภาพันธ์", "มีนาคม",
                "เมษายน", "พฤษภาคม", "มิถุนายน",
                "กรกฏาคม", "สิงหาคม", "กันยายน",
                "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
            );

            $tok = strtok("$_POST[date]", "-");
            $year = $tok;
            $tok  = strtok("-");
            $month = $tok;
            $tok = strtok("-");
            $day = $tok;
            $year_out = $year + 543;
            $cnt = $month ;
            $month_out = $month_arr[$cnt];
            $day_out = $day;
            $t_date_game2 = $day_out . " " . $month_out . " " . $year_out;

            $tok1 = strtok("$_POST[due_date]", "-");
            $year1 = $tok1;
            $tok1  = strtok("-");
            $month1 = $tok1;
            $tok1 = strtok("-");
            $day1 = $tok1;
            $year_out1 = $year1 + 543;
            $cnt1 = $month1 ;
            $month_out1 = $month_arr[$cnt1];
            $day_out1 = $day1;
            $t_date_game3 = $day_out1 . " " . $month_out1 . " " . $year_out1;
            ?>
            <h2 align="center">รายงานการจำหน่ายสินค้า</h2>
            <h3 align="center">ร้าน OuTxMikeLSxHome </h3>
            <h4 align="center">
                ระหว่างวันที่ <font color='blue'><?php echo $t_date_game2; ?> - <?php echo $t_date_game3; ?></font>
            </h4>
            <section>
                <?php
                $date = $_POST['date'];
                $due_date = $_POST['due_date'];
                include('connection.php');
                $query2 = "SELECT *
                FROM sale JOIN customer 
                ON sale.cus_id = customer.cus_id join sale_detail on  sale.sale_id = sale_detail.sale_id
                WHERE sale.sale_date BETWEEN '$date' AND '$due_date'
                group BY sale.sale_id  " or die("Error:" . mysqli_error());
                $result3 = mysqli_query($con, $query2);

                echo "<table border='1' align='center'>";
                echo "<tr bgcolor='ffcc00'>
                <td align='center'><font color='blue'>ลำดับ</td>  
                   <td align='center'><font color='blue'>วันที่</td>
                <td align='center'><font color='blue'>รหัสการขาย</td>
              
                 
                
                <td align='center'><font color='blue'>ชื่อ</td>
                <td align='center'><font color='blue'>รวม</td>
                <td align='center'><font color='blue'></td>
                </tr>";
                $i = 1;
                $s = 0;
                while ($row = mysqli_fetch_array($result3)) {
                    $month_arr = array(
                        "มกราคม", "กุมภาพันธ์", "มีนาคม",
                        "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฏาคม", "สิงหาคม", "กันยายน",
                        "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    );
                    $tok = strtok("$row[sale_date]", "-");
                    $year = $tok;
                    $tok  = strtok("-");
                    $month = $tok;
                    $tok = strtok("-");
                    $day = $tok;
                    $year_out = $year + 543;
                    $cnt = $month - 1;
                    $month_out = $month_arr[$cnt];
                    $day_out = $day;
                    $t_date_game = $day_out . " " . $month_out . " " . $year_out;
 

                    include('connection.php');
                    $sale_id = $row["sale_id"];
                    $query1 = "SELECT * FROM sales ,customer, sale_type  
                    WHERE sales.customer_id = customer.customer_id and
                        sales.s_type_code = sale_type.s_type_code and 
                        sales.sale_id = '$sale_id' 
                    ORDER BY sale_id desc" or die("Error:" . mysqli_error());
                    $result1 = mysqli_query($con, $query1);
                    $data = mysqli_fetch_assoc($result1);

                    $type = $data['s_type_charge'];
                    
                    $find_raw_id = $sale_id;
                    $sql2 = " SELECT *  FROM sale_detail as d
                        INNER JOIN  product as p ON p.product_id = d.product_id
                        WHERE sale_id like '%" . $find_raw_id . "%'
                        ORDER BY sale_id ";
                    $result = mysqli_query($con, $sql2);


                    $sql1 = "SELECT SUM( CASE WHEN sale_id LIKE '%" . $find_raw_id . "%' THEN 1 ELSE 0 END ) AS num_sale
                        FROM `sale_detail` WHERE 1";
                    $result1 = mysqli_query($con, $sql1);
                    $row2 = mysqli_num_rows($result1);
                    $rown = mysqli_fetch_array($result1);

                    $totalsum = 0;
                    $totaldepo = 0;
                 
                    while ($row2 = mysqli_fetch_array($result)) {
                        $hiv = $row2['sale_amount']-1;
                        $sum1 = $hiv*10;
                        $total = $sum1 + 20;
                        $totalsum=$total+$totalsum ;
                        $depo = $row2['sale_amount'] * $type;
                        $totaldepo=$depo+$totaldepo ;
                        
                    }
                    $find_raw_id1 = $sale_id;
                    $sql = " SELECT sale_price*sale_amount  FROM sale_detail 
                        WHERE sale_id like '%" . $find_raw_id1 . "%'
                        ORDER BY sale_id ";
                    $result2 = mysqli_query($con, $sql);
                    $sum = 0;
                    while ($resultarray = mysqli_fetch_array($result2)) {

                        $sum += (int)$resultarray['sale_price*sale_amount'];
                    }
                   $t = $sum+$totalsum+$totaldepo;
                   
                    echo "<tr bgcolor=''>";
                    echo "<td align='center'>$i</td> ";
                 
                    echo "<td align='center'>" . $t_date_game . "</td> ";
                    echo "<td align='center'>" . $row["sale_id"] . "</td> ";
                    echo "<td align='center'>" . $row["customer_name"] ."&nbsp &nbsp; &nbsp;" . $row["customer_lname"]. "</td> ";
                    echo "<td align='center'>" .  $t  . "</td> ";
                    echo "<td align='center'><a href='sale_product_show_detail.php?sales=$row[sale_id]'>รายละเอียด </a></td> ";
                  
                    
              


                    echo "<td></td>";
                    echo "</tr>";
                    $i++;
                    $s =$s + $t;
                }
                echo "</table>";

                mysqli_close($con);
                ?>
            </section>

          
            <table>
                <tr>
                    <td></td>
                    <td></td>       
                    <td></td>  
                    <td></td>    
                    <td></td>     
                    <td align="right"><font color="blue"> รวมยอดทั้งหมด </font></td>
                    <td align="right"><?php echo number_format($s); ?></td>
                    <td>บาท</td>
                    <td></td>
                    <td></td> 
                </tr>
            </table>
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