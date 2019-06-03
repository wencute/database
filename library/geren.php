<?php
require_once("dbtools.inc.php");

$link = create_connection();
session_start();
$id=$_SESSION["reader_id"];

//$writer=$_POST["writer"];
$sql = "SELECT * FROM `reader` WHERE `reader_id` = '$id'";

$result = execute_sql($link, "library", $sql);
	$row=mysqli_fetch_row($result);
				
		 
		 mysqli_free_result($result);
		

 
        mysqli_close($link);
		
      ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>个人中心</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="reader_center.html" class="logo"><strong>长安大学学图书馆</strong></a>
									<!--<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>-->
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										
										
										<li>账号：<?php echo"$row[0]";?></li>
						<li>姓名：<?php echo"$row[2]";?></li>
						<li>电话：<?php echo"$row[3]";?></li>
						<li>学院：<?php echo"$row[4]";?></li>
						<li>专业：<?php echo"$row[5]";?></li>
						<li>借阅次数：<?php echo"$row[6]";?></li>
						<li>未还书籍：<?php echo"$row[7]";?></li>
						<li>可借书籍：<?php echo"$row[8]";?></li><br><br>
			 
										<ul class="actions">
											<li><a href="reader_center.html" class="button big">返回个人中心</a></li>
										</ul>
									</div>
									<span class="image object">
										<img src="img/avatar.png" alt="" />
									</span>
								</section>

							<!-- Section -->
								
										
								

							<!-- Section -->
								

						</div>
					</div>

			<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>