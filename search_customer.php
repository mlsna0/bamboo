<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>ข้อมูลลูกค้า</title>
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
                        <H3> การจัดการข้อมูลลูกค้า </H3>
                        </td>
                    </header>
                    <table border="0">
                        <tr>
                            <form id="form1" name="form1" method="GET" action='search_customer.php'>
                                <div class="row uniform">
                                    <div class="6u 12u$(xsmall)">
                                        <td> <label> &nbsp; รหัสลูกค้า </label> </td>
                                        <td> <input type="text" name="cus_id"> </td>
                                        <td> <label> &nbsp; ชื่อลูกค้า &nbsp; </label> </td>
                                        <td> <input type="text" name="cus_name"> </td>
                                        <td> <input type="submit" name="btnSearch" value="ค้นหา"> </td>
                                        <td> <input type="reset" name="btnreset" value="ล้าง"> </td>
                            </form>

                            <form id="form2" name="form2" method="post" action="insert_customer.php">
                                <td> <input type="submit" name="btnAdd" value="เพิ่มข้อมูลลูกค้า"> </td>
                            </form>
                </div>
            </div>
            </tr>
            </table>
            <!-- Section -->
            <section>
                <?php
                include('connection.php');
                $search = isset($_GET['cus_id']) ? $_GET['cus_id'] : '';
                $search1 = isset($_GET['cus_name']) ? $_GET['cus_name'] : '';
                $sql = "SELECT * FROM customer WHERE cus_id LIKE '$search%'  ";
                $sql =  $sql."and  cus_name LIKE '$search1%'  ";
                $result = $con->query($sql);

                echo "<table border='1' align='center'>";
                echo "<tr align='center' bgcolor='ffcc00'>
                <td>รหัสลูกค้า</td>
                <td>ชื่อ</td>
                <td>เบอร์โทรศัพท์</td>
                <td>แก้ไข</td>
              </tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr align='center' bgcolor=''>";
                    echo "<td><a href='show_customer.php?cus_id=$row[0]'>" . $row["cus_id"] . "</a></td> ";
                    echo "<td>" . $row["cus_name"] . "</td> ";
                    echo "<td>" . $row["cus_phone"] . "</td> ";
                    echo "<td><a href='edit_customer.php?cus_id=$row[0]'><img src=./images/edit.gif></a></td> ";
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