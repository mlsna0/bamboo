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
                    $raw_id = $_GET["raw_id"];
                    $query = "SELECT * FROM raw_material join rule  
                    on raw_material.raw_id = rule.raw_id 
                    where  raw_material.raw_id = '$raw_id'";
                    $result1 = mysqli_query($con, $query);
                    $data1 = mysqli_fetch_assoc($result1);
                    ?>
                    <br>
                    <br>
                    <h3 align="center"> รหัส : <font color="blue"><?php echo $raw_id; ?></font>
                    </h3>
                    <h4 align="center"> ชื่อ : <font color="blue"><?php echo $data1['raw_name'] ?></font>
                    </h4>
                   
                   
                    <br>
                    <h4>สินค้า</h4>
                    <?php
                    include('connection.php');
                   
                 
                    $sql = " SELECT *  FROM product as p  
                    INNER JOIN  rule as t ON t.prod_id = p.prod_id
                    INNER JOIN  raw_material as s ON s.raw_id = t.raw_id
                    WHERE s.raw_id like '%" . $raw_id . "%'
                    ORDER BY p.prod_id ";
                    $result = mysqli_query($con, $sql);

                    echo "<table width='350' border='3' cellpadding='5' cellspacing='1'>";
                    echo "<tr bgcolor='ffcc00'> 
                        <td align='center'><font color='blue'>ลำดับ</font></td>
                        <td align='center'><font color='blue'>รหัสสินค้า</font></td>
                        <td align='center'><font color='blue'>ชื่อสินค้า</font></td>
                        <td align='center'><font color='blue'>วัตถุดิบ</font></td>
                        <td align='center'><font color='blue'>คงเหลือ</font></td>
                        </tr>";
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr>";
                        echo "<td align='center'> $i</td>";
                        echo "<td align='center'><a href='product_show.php?prod_id=$row[prod_id]'>" . $row["prod_id"] . "</a></td> ";
                        echo "<td align='center'>$row[prod_name]</td>";
                        echo "<td align='center'>$row[raw_name]";
                        echo "<td align='center'>$row[raw_amount]</td>";
                        
                        
                        echo "</tr>";
                   $i++;
                    }

                    echo "</table>";
                    mysqli_close($con);
                    ?>
                    </table>
                    <form id="form2" name="form2" method="post" action="raw_material.php">
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