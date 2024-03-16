<!DOCTYPE HTML>
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
            
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div class="content">

                    <head>
                        <script language="JavaScript" type="text/JavaScript">
                            <!--
                            function MM_jumpMenu(targ,selObj,restore){ 
                            eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
                            if (restore) selObj.selectedIndex=0;
                            }
                        </script>
                    </head>

                    <?php include('connection.php');

                    $query = ("SELECT * FROM buy ");
                    $result = mysqli_query($con, $query);
                    $id = mysqli_num_rows($result);
                    $code = sprintf('BUY%04d', $id);
                    $id = $code;
                    ?>
                    <br>
                    <br>
                    <h3 align='center'>กรอกรายละเอียดการรับสินค้า</h3>
                    <h5 align='center'>เลขที่ใบรับสินค้า <font color="blue"><?php echo $code; ?></font>
                    </h5>

                    <body>
                        <form action="buy_detail_add.php?buys=<?php echo $code ?>" name="frmAdd" method="post">
                            <br>
                            <font color="blue">เพิ่มรายการสินค้า</font>

                            <select style="width:100px;" name="menu1" onChange="MM_jumpMenu('parent',this,0)">

                                <?php
                                for ($i = 1; $i <= 50; $i++) {
                                    if ($_GET["Line"] == $i) {
                                        $sel = "selected";
                                    } else {
                                        $sel = "";
                                    }
                                ?>
                                    <option value="<?php echo $_SERVER["PHP_SELF"]; ?>?Line=<?php echo $i; ?>" <?php echo $sel; ?>><?php echo $i; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <table width="600" border="1">
                                <tr>
                                    <th width="30">
                                        <div align="center"><font color='blue'>ลำดับ</div>
                                    </th>
                                    <th width="170">
                                        <div align="center"><font color='blue'>ชื่อสินค้า </div>
                                    </th>
                                    <th width="50">
                                        <div align="center"><font color='blue'>ราคา/หน่วย </div>
                                    </th>
                                    <th width="50">
                                        <div align="center"><font color='blue'>จำนวน </div>
                                    </th>
                                </tr>
                                <?php
                                $line = $_GET["Line"];
                                if ($line == 0) {
                                    $line = 1;
                                }
                                for ($i = 1; $i <= $line; $i++) {
                                    include('connection.php');
                                    $query = ("SELECT * FROM buy ");
                                    $result = mysqli_query($con, $query);
                                    $id = mysqli_num_rows($result);
                                    $code = sprintf('BUY%04d', $id);
                                    $id = $code;
                                ?>

                                    <tr>
                                        <td>
                                        <font color='#228B22'><div align="center"><input type="text" name="item<?php echo $i; ?>" size="3" value="<?php echo $i; ?>"></div>
                                        </td>
                                        <td>
                                            <select name="raw_id<?php echo $i; ?>">
                                            <option value="">
                                                สินค้า
                                            </option>
                                            <?php
                                            $strSQL = "SELECT * FROM raw_material ORDER BY raw_id ASC";
                                            $objQuery = mysqli_query($con, $strSQL);
                                            while ($objResult = mysqli_fetch_array($objQuery)) {
                                            ?>
                                                <option value="<?php echo $objResult["raw_id"]; ?>"><?php echo $objResult["raw_id"]; ?>
                                                <div>-&nbsp;</div> <?PHP echo $objResult['raw_name']; ?></option>
                                                
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td>
                                            <div align="center"><input type="text" name="buy_cost<?php echo $i; ?>" size="5"></div>
                                        </td>
                                        <td align="right"><input type="text" name="buy_amount<?php echo $i; ?>" size="5"></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                            <center>
                                <input type="submit" name="submit" value="บันทึกรายละเอียด">
                                <input type="hidden" id="hdnLine" name="hdnLine" value="<?php echo $i; ?>">
                        </form>
                    </body>
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