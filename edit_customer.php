<!DOCTYPE HTML>
<html>

<head>
    <title>แก้ไขข้อมูลลูกค้า</title>
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
                        <br />
                        <H3> แก้ไขข้อมูลลูกค้า </H3>
                        </td>
                    </header>
                    <section>
                        <?php
                        include('connection.php');
                        if ($_GET["cus_id"] == '') {
                            echo "<script type='text/javascript'>";
                            echo "alert('Error Contact Admin !!');";
                            echo "window.location = 'customer.php'; ";
                            echo "</script>";
                        }

                        $cus_id = mysqli_real_escape_string($con, $_GET['cus_id']);
                        $sql = "SELECT * FROM customer WHERE cus_id='$cus_id' ";
                        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
                        $row = mysqli_fetch_array($result);
                        extract($row);
                        ?>

                        <form action="update_customer.php" method="post" name="updatecustomer" id="updatecustomer">
                            <table border="2">
                                <tr align="center">
                                    <td colspan="2">แก้ไขข้อมูลลูกค้า</td>
                                </tr>
                                <tr>
                                    <td align="right">รหัส : </td>
                                    <td>
                                        <input type="text" name="cus_id" value="<?php echo $cus_id; ?>" disabled='disabled' />
                                        <input type="hidden" name="cus_id" value="<?php echo $cus_id; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">ชื่อ :</td>
                                    <td><input name="cus_name" type="text" id="cus_name" value="<?= $cus_name; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                     <td align=" right">เบอร์โทรศัพท์ :</td>
                                    <td><input name="cus_phone" type="text" id="cus_phone" value="<?= $cus_phone; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" "/></td>
                                 </tr>
                               
                                <tr>
                                    <td >&nbsp;</td>
                                    <td >&nbsp;
                                        <input type="button" value=" ยกเลิก " onclick="window.location='customer.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
                                        &nbsp;
                                        <input type="submit" name="Update" id="Update" value="บันทึก" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </section>
                    <script src="assets/js/jquery.min.js"></script>
                    <script src="assets/js/browser.min.js"></script>
                    <script src="assets/js/breakpoints.min.js"></script>
                    <script src="assets/js/util.js"></script>
                    <script src="assets/js/main.js"></script>

</body>

</html>