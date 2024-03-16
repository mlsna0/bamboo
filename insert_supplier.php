<!DOCTYPE HTML>
<html>

<head>
    <title>ข้อมูล SUP</title>
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
                    <header id="header">
                        <h3>เพิ่มข้อมูล SUP</h3>
                    </header>
                    <form id="form01" name="form01" method="post" action="add_supplier.php">
                        <table border="2">
                        <?php
                            include('connection.php');
                            $query = ("SELECT * FROM supplier ");
                            $result = mysqli_query($con, $query);
                            $id = mysqli_num_rows($result);
                            $code = sprintf('SUP%03d', $id + 1);
                            $id = $code;
                            ?>

                            <tr>
                                <td align="right"><font color='blue'>รหัสร้านค้า</font>
                                </td>
                                <td align="left">
                                <font color='#228B22'> <input size="5" type="text" name="sup_id" value="<?php echo $code; ?>" disabled='disabled' /></font>
                                    <input type="hidden" name="sup_id" value="<?php echo $code; ?>" />
                                </td>
                            <tr>
                                <td align="right">&nbsp; ชื่อ: &nbsp; </td>
                                <td align="left"><label for="sup_desc"></label>
                                    <input type="text" name="sup_desc" size="30">
                                </td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp; เบอร์โทรศัพท์: &nbsp; </td>
                                <td align="left"><label for="sub_phone"></label>
                                    <input type="text" name="sub_phone" size="13">
                                </td>
                            </tr>
                      
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" name="btnsummit" value=" &nbsp; บันทึก &nbsp;">
                                    &nbsp; &nbsp;
                                    <input type="reset" name="btmclear" value=" &nbsp; ล้าง &nbsp; ">
                                </td>
                            </tr>

                        </table>
                    </form>
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