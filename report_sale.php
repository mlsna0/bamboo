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
                        ?>
                        <html>
                        <form name="frmMain" action="report_sale_detail.php" method="post">
                            <br>
                            <br>
                            <br>
                            <br>
                            <h2 align="center">รายงานการจำหน่ายสินค้า</h2>
                            <br>
                            <center>
                                <tr>
                                    <td>
                                        <font color="blue">จาก </font> <input type="date" name="date">
                                        &nbsp&nbsp&nbsp&nbsp
                                        <font color="blue"> ถึง </font>
                                        <input type="date" name="due_date">
                                    </td>
                                </tr>
                                <br>
                                <br>
                                <input type="submit" name="submit" value="ค้นหารายงานการขายสินค้า">
                                <input type="hidden" id="hdnLine" name="hdnLine" value="<?php echo $i; ?>">
                        </form>
</body>

</html>
<?php
mysqli_close($con);
?>
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