<!DOCTYPE HTML>
<html>

<head>
    <title>แก้ไขข้อมูลสินค้า</title>
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
                        <H3> แก้ไขข้อมูลสินค้า </H3>
                        </td>
                    </header>
                    <section>
                        <?php
                        include('connection.php');
                        if ($_GET["prod_id"] == '') {
                            echo "<script type='text/javascript'>";
                            echo "alert('Error Contact Admin !!');";
                            echo "window.location = 'product.php'; ";
                            echo "</script>";
                        }

                        $prod_id = mysqli_real_escape_string($con, $_GET['prod_id']);
                        $sql = "SELECT * FROM product WHERE prod_id='$prod_id' ";
                        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
                        $row = mysqli_fetch_array($result);
                        extract($row);
                        ?>

                        <form action="update_product.php" method="post" name="updateproduct" id="updateproduct"  enctype="multipart/form-data>">
                            <table border="2">
                                
                                <tr align="center">
                                    <td colspan="2">แก้ไขข้อมูลสินค้า</td>
                                </tr>
                                <tr>
                                    <td align="right">รหัส : </td>
                                    <td>
                                        <input type="text" name="prod_id" value="<?php echo $prod_id; ?>" disabled='disabled' />
                                        <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>" />
                                    </td>
                                </tr>
    

                                <tr>
                                    <td align="right">ชื่อสินค้า :</td>
                                    <td><input name="prod_name" type="text" id="prod_name" value="<?= $prod_name; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align=" right">จำนวน :</td>
                                    <td><input name="prod_amount" type="text" id="prod_amount" value="<?= $prod_amount; ?>" size="30" required="required" "/></td>
                                </tr>
                                <tr>
                                     <td align=" right">ราคาทุน :</td>
                                    <td><input name="prod_cost" type="text" id="prod_cost" value="<?= $prod_cost; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" "/></td>
                                 </tr>
                                <tr>
                                    <td align=" right">ราคาขาย :</td>
                                    <td><input name="prod_price" type="text" id="prod_price" value="<?= $prod_price; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" "/></td>
                                </tr>
                               
                                
                                <tr>
                                    <td >&nbsp;</td>
                                    <td >&nbsp;
                                    <input type="submit" name="submit" value="บันทึก" class="btn btn-sm btn-primary mb-3">
                                    &nbsp; &nbsp;
                                    <input type="reset" name="btmclear" value=" &nbsp; ล้าง &nbsp; ">
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