<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>ข้อมูลการรับสินค้า</title>
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
                        <h3>เพิ่มข้อมูลการรับสินค้า</h3>
                    </header>
                    <form id="form01" name="form01" method="post" action="buy_add.php?Line=1 ">
                        <br>
                        <h3 align='center'>กรอกข้อมูลการรับสินค้า</h3>
                        <table border="0">
                            <?php
                            include('connection.php');
                            $query = ("SELECT * FROM buy ");
                            $result = mysqli_query($con, $query);
                            $id = mysqli_num_rows($result);
                            $code = sprintf('BUY%04d', $id + 1);
                            $id = $code;
                            ?>

                            <tr>
                                <td align='right'>
                                    <font color='blue'>เลขที่ใบรับสินค้า</font>
                                </td>
                                <td>
                                    <font color='#228B22'> <input size="5" type="text" name="buy_id" value="<?php echo $code; ?>" disabled='disabled' /></font>
                                    <input type="hidden" name="buy_id" value="<?php echo $code; ?>" />
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align='right'>
                                    <font color='blue'>วันที่รับสินค้า</font>
                                </td>
                                <td width="300">
                                    <font color='#228B22'><input size="5" type="text" name="buy_date" value="<?php echo date('Y-m-d') ?>" />
                                        <input type="hidden" name="buy_date" value="<?php echo date('Y-m-d') ?>" />
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align='right'>
                                    <font color='blue'>ชื่อ Sup</font>
                                </td>
                                <td>
                                    <select name="sup_id">
                                        <option>รหัสตัวแทน - (ชื่อSup)</option>
                                        <?PHP
                                        include('connection.php');
                                        $sql = " select * from supplier order by sup_id desc ";
                                        $result = mysqli_query($con, $sql);
                                        //echo "<BR> ".$sql." <BR>" ;
                                        while ($sup_id = mysqli_fetch_assoc($result)) {   ?>
                                            <option value="<?PHP echo $sup_id['sup_id']; ?>">
                                                <div> </div><?PHP echo $sup_id['sup_id']; ?>
                                                <div>-&nbsp;</div>
                                                <div>(</div> <?PHP echo $sup_id['sup_desc']; ?>
                                                <div>)</div>
                                            </option>
                                        <?PHP } ?>
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align='right'>
                                    <font color='blue'>สถานะ</font>
                                </td>
                                <td>
                                    <font color='#228B22'><input size="5" type="text" name="buy_status" value="สำเร็จ" disabled='disabled' />
                                        <input type="hidden" name="buy_status" value="สำเร็จ" />
                                        </select>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </table>
                        <td>
                            <center>
                                <br>
                                <input type="submit" name="btnsummit" value="บันทึก/เพิ่มรายละเอียด "> &nbsp;
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