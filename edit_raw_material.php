<!DOCTYPE HTML>
<html>

<head>
    <title>หน้าแก้ไขข้อมูลสายพันธุ์</title>
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
                        <H3> แก้ไขข้อมูลสายพันธุ์ </H3>
                        </td>
                    </header>
                    <section>
                        <?php
                        include('connection.php');
                        if ($_GET["raw_id"] == '') {
                            echo "<script type='text/javascript'>";
                            echo "alert('Error Contact Admin !!');";
                            echo "window.location = 'raw_material.php'; ";
                            echo "</script>";
                        }

                        $raw_id = mysqli_real_escape_string($con, $_GET['raw_id']);
                        $sql = "SELECT * FROM raw_material WHERE raw_id='$species_id' ";
                        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
                        $row = mysqli_fetch_array($result);
                        extract($row);
                        ?>

                        <form action="update_raw_material.php" method="post" name="updateraw_material" id="updateraw_material">
                            <table border="2">
                                <tr align="center">
                                    <td colspan="2">แก้ไขข้อมูลวัตถุดิบ</td>
                                </tr>
                                <tr>
                                    <td align="right">รหัส : </td>
                                    <td>
                                        <input type="text" name="raw_id" value="<?php echo $raw_id; ?>" disabled='disabled' />
                                        <input type="hidden" name="raw_id" value="<?php echo $raw_id; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">ชื่อวัตถุดิบ :</td>
                                    <td><input name="raw_name" type="text" id="raw_name" value="<?= $raw_name; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">จำนวน :</td>
                                    <td><input name="raw_amount" type="text" id="raw_amount" value="<?= $raw_amount; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">จำนวนน้อย :</td>
                                    <td><input name="raw_min_amount" type="text" id="raw_min_amount" value="<?= $raw_min_amount; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">ชื่ราคาซื้อ :</td>
                                    <td><input name="raw_cost" type="text" id="raw_cost" value="<?= $raw_cost; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                    <td >&nbsp;</td>
                                    <td >&nbsp;
                                        <input type="button" value=" ยกเลิก " onclick="window.location='raw_material.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
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