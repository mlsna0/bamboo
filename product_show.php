<!DOCTYPE html>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>ข้อมูลสินค้า</title>
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
                    <!-- Header -->
                    <header id="header">
                        <h3>รายละเอียดข้อมูลสินค้า</h3>
                        <h4 align='right'>รหัสสินค้า <font color="blue"><?php echo $_REQUEST["prod_id"] ?></font></h4>
                    </header>
                    <!-- Section -->
                    <section>
                        <?php
                        include('connection.php'); //ไฟล์เชื่อมต่อกับ database 
                        $find_raw_id = $_REQUEST["prod_id"];
                        $sql = "SELECT * FROM product  
                        INNER JOIN  rule ON rule.prod_id = product.prod_id
                        INNER JOIN  raw_material ON raw_material.raw_id = rule.raw_id
                        WHERE product.prod_id like '%" . $find_raw_id . "%'
                        ORDER BY product.prod_id ";
                
                        $result = mysqli_query($con, $sql);
                        //4. แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:

                        echo " <br>    <table width='350' border='3' align='center' cellpadding='5' cellspacing='1'>";
                        echo "<tr>";
                        echo "</tr>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<br>";
                            echo "<tr>";
                            echo "<td align='right'><font size='3'><b>ชื่อสินค้า :</b><td><font color='blue'>  $row[prod_name]</font></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='right'><font size='3'><b>พันธ์ุสินค้า :</b><td><font color='blue'>  $row[raw_name]</font></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='right'><font size='3'><b>ราคาขาย :</b><td><font color='blue'> $row[prod_price]&nbsp; &nbsp; &nbsp;บาท</font></td>";
                            echo "<td></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td align='right'><font size='3'><b>จำนวนคงเหลือ :</b><td><font color='blue'> $row[prod_amount]&nbsp; &nbsp; &nbsp;ชิ้น</font></td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        //5. close connection
                        mysqli_close($con);
                        ?>
                        <form id="form2" name="form2" method="post" action="product.php">
                            <center>
                                <td> <input type="submit" name="btnAdd" value="เสร็จสิ้น"> </td>
                            </center>
                        </form>
                    </section>
                </div>
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
