<!DOCTYPE HTML>
<html>

<head>
    <title>ข้อมูลการสั่งซื้อสินค้าเข้า</title>
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
                    
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div class="content">
                    <header>
                        <br>
                        <br>
                        <br>
                    </header>
                    <section>
                        <?php
                        include('connection.php');
                        $find_raw_id = $_REQUEST["buy_id"];
                        $sql = " SELECT *  FROM buy_detail as d
                        INNER JOIN  raw_material as p ON p.raw_id = d.raw_id
                        WHERE buy_id like '%" . $find_raw_id . "%'
                        ORDER BY buy_id ";
                        $result = mysqli_query($con, $sql);


                        $sql1 = "SELECT SUM( CASE WHEN buy_id LIKE '%" . $find_raw_id . "%' THEN 1 ELSE 0 END ) AS num_sale
                        FROM `buy_detail` WHERE 1";
                        $result1 = mysqli_query($con, $sql1);
                        $row = mysqli_num_rows($result1);
                        $rown = mysqli_fetch_array($result1);

                        echo "<table width='350' border='3' cellpadding='5' cellspacing='1'>";
                        echo "<tr bgcolor='ffcc00'> 
                        <h3 align='left'>รายละเอียดกาสั่งซื้อสินค้าเข้า <font color='blue'>$find_raw_id</font></h3>
                        <td align='center'><font color='blue'>ลำดับ</font></td>
                        <td></td>
                        <td align='center'><font color='blue'>รายการสินค้า</font></td>
                        <td align='center'><font color='blue'>จำนวนขาย</font></td>
                        <td align='center'><font color='blue'>ราคาต่อหน่วย</font></td>
                        <td align='center'><font color='blue'>จำนวนเงิน</font></td>
                        </tr>";

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td align='center'>$row[item]</td>";
                            echo "<td></td>";
                            echo "<td align='center'>$row[raw_name]</td>";
                            echo "<td align='center'> &emsp;&emsp;&emsp;&emsp;$row[buy_amount]</td>";
                            echo "<td align='center'>&emsp;" .number_format($row['buy_cost'],2)."</td>";
                            echo "<td align='center'> " .number_format($row['buy_cost'] * $row['buy_amount'],2). "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        mysqli_close($con);
                        ?>
                        <form>
                            <center>
                            <td> <input type="button" onclick="history.back()" value="ย้อนกลับ"> </td>
                        </form>
                    </section>
                </div>
            </div>
        </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>