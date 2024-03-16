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
                    <!-- Header -->
                    <header id="header">
                        <h3>เพิ่มข้อมูลการขายสินค้า</h3>
                    </header>
                    <form id="form01" name="form01" method="post" action="sale_add.php?Line=1 ">
                        <br>
                        <h3 align='center'>กรอกข้อมูลการขายสินค้า</h3>
                        <table border="0">
                            <?php
                            include('connection.php');
                            $query = ("SELECT * FROM sale ");
                            $result = mysqli_query($con, $query);
                            $id = mysqli_num_rows($result);
                            $code = sprintf('SLE%04d', $id + 1);
                            $id = $code;
                            ?>

                            <tr>

                                <td><font color='blue'>รหัสการขาย</font>
                                <font color='#228B22'> <input size="5" type="text" name="sale_id" value="<?php echo $code; ?>" disabled='disabled' /></font>
                                    <input type="hidden" name="sale_id" value="<?php echo $code; ?>" />
                                </td>

                                <td><font color='blue'>วันที่ขาย</font>
                                <font color='#228B22'><input size="5" type="text" name="sale_date" value="<?php echo date('Y-m-d') ?>" />
                                    <input type="hidden" name="sale_date" value="<?php echo date('Y-m-d') ?>" />
                                </td>
   


                                <td><font color='blue'>ชื่อลูกค้า</font>

                                    <select name="customer_id">
                                        <option>รหัสลูกค้า - (ชื่อ-สกุล)</option>
                                        <?PHP
                                        include('connection.php');
                                        $sql = " select * from customer order by cus_id desc ";
                                        $result = mysqli_query($con, $sql);
                                        //echo "<BR> ".$sql." <BR>" ;
                                        while ($cus_id = mysqli_fetch_assoc($result)) {   ?>
                                            <option value="<?PHP echo $cus_id['cus_id']; ?>">
                                                <div> </div><?PHP echo $cus_id['cus_id']; ?>
                                                <div>-&nbsp;</div>
                                                <div></div> <?PHP echo $cus_id['cus_name']; ?></div>
                                            </option>
                                        <?PHP } ?>
                                    </select>
                                </td>

                                <td><font color='blue'>รหัสการขาย</font>

                                    <select name="s_type_code">
                                        <option>รหัสรหัสสถานะ</option>
                                        <?PHP
                                        include('connection.php');
                                        $sql = " select * from sale_ststus order by sale_sts desc ";
                                        $result = mysqli_query($con, $sql);
                                        //echo "<BR> ".$sql." <BR>" ;
                                        while ($s_type_code = mysqli_fetch_assoc($result)) {   ?>
                                            <option value="<?PHP echo $s_type_code['sale_sts']; ?>">
                                                <div> </div><?PHP echo $s_type_code['status_desc']; ?>
                                                <div>-&nbsp;</div>
                                            </option>
                                        <?PHP } ?>

                                    </select>
                                </td>
                                <td><font color='blue'>สถานะสินค้า</font>

                                <font color='#228B22'> <input size="5" type="text" name="sale_sts" value="รอส่งสินค้า" disabled='disabled' /></font>
                                    <input type="hidden" name="sale_sts" value="WT" />
                                </td>


                        </table>
                        <td>
                            <center>
                                <br>
                                <input type="submit" name="btnsummit" value="บันทึก"> &nbsp;
                                <input type="reset" name="btnreset" value="ล้าง">
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