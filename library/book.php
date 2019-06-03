
<?php
require_once("dbtools.inc.php");
session_start();
header("Cache-control: private"); 
$id=$_POST["id"];
$_SESSION['book_id']=$id;
$link = create_connection();
$sql = "SELECT * FROM `book` WHERE `book_id` LIKE '$id' ";

$result = execute_sql($link, "library", $sql);


    $row=mysqli_fetch_row($result);
	$row5=$row[5];
	 $_SESSION['row5']=$row5;  
	 $row13=$row[13];
	 $_SESSION['row13']=$row13;  
	mysqli_free_result($result);
 $sql = "UPDATE book SET score = score + 1 WHERE book_id = '$id'";
    $result = execute_sql($link, "library", $sql);
	

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="">


<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- ===========================
THEME INFO
=========================== -->
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">


<title>书籍界面</title>


<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">


<!--FONTS & ICONS
=========================== -->
<link href='http://fonts.googleapis.com/css?family=Kristi|Alegreya+Sans:300' rel='stylesheet' type='text/css'>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
#login_click{ margin-top:10px; height:40px;}  
#login_click a   
{  
      
  
    text-decoration:none;  
   
    color:#f2f2f2;  
      
    padding: 10px 5px 10px 10px;  
    font-size:14px;  
    font-family: 微软雅黑,宋体,Arial,Helvetica,Verdana,sans-serif;  
    font-weight:bold;  
    border-radius:3px;  
      
    -webkit-transition:all linear 0.30s;  
    -moz-transition:all linear 0.30s;  
    transition:all linear 0.30s;  
      
    }  
   #login_click a:hover { background:#385f9e; }  
   
	
	
	.tyg-p{
		font-size: 24px;
	    font-family: 'STCAIYUN';
	    position: absolute;
	    top: 135px;
	    left: 60px;
		color:blank;
	}
	.tyg-div-denglv{
		<!--z-index:1000;-->
		float:right;
		position:absolute;
		right:10%;top:50%;
		
	}
	.tyg-div-form{
		background-color:white;
		border-style:solid;
		font-size: 18px;
	  
	 
		border-radius:10px;
		width:500px;
		height:auto;
		margin:120px auto 0 auto;
		color:blank;
	}
	
	.tyg-div-form form {padding:10px;}
	.tyg-div-form form input[type="text"]{
		width: 350px;
	    height: 100px;
	    margin: 10px 10px 0px 0px;
	}
	.tyg-div-form form button {
	    cursor: pointer;
	    width: 70px;
	    height: 44px;
	    margin-top: 25px;
	    padding: 0;
	    background: #2ec0f6;
	    -moz-border-radius: 6px;
	    -webkit-border-radius: 6px;
	    border-radius: 6px;
	    border: 1px solid #2ec0f6;
	    -moz-box-shadow:
	        0 15px 30px 0 rgba(255,255,255,.25) inset,
	        0 2px 7px 0 rgba(0,0,0,.2);
	    -webkit-box-shadow:
	        0 15px 30px 0 rgba(255,255,255,.25) inset,
	        0 2px 7px 0 rgba(0,0,0,.2);
	    box-shadow:
	        0 15px 30px 0 rgba(255,255,255,.25) inset,
	        0 2px 7px 0 rgba(0,0,0,.2);
	    font-family: 'PT Sans', Helvetica, Arial, sans-serif;
	    font-size: 18px;
	    font-weight: 700;
	    color: #fff;
	    text-shadow: 0 1px 2px rgba(0,0,0,.1);
	    -o-transition: all .2s;
	    -moz-transition: all .2s;
	    -webkit-transition: all .2s;
	    -ms-transition: all .2s;
}
</style>
  </style>
</head>
 
<body>

<div class="container">
	<!-- ===========================
	HEADER
	============================ -->
	<div id="header" class="row">
		<div class="col-sm-2">
			<img class="propic" src="img/1.jpg" alt="">
		</div>
		<!-- photo end-->

		<div class="col-sm-10">
			<div class="cv-title">
				<div class="row">
					<div class="col-sm-7">
						<h1><?php echo"$row[1]";?></h1>
					</div>

		
			<div id="login_click" style="margin:5px 0px;">  
        <a id="btlogin" style=" background:#01B468"  href="lend.php">借书</a>  
		<a id="btlogin" style=" background:#9393FF"  href="continue.php" >续借</a>
		<a id="btlogin" style=" background:#01B468"  href="return.php">还书</a>
		
		 	
		
		  <a id="btlogin" style=" background:#9393FF"  href="yuyue.php">预定</a>
           <a id="btlogin" style=" background:#01B468" href="collect1.php">收藏</a>  
		    <a id="btlogin" style=" background:#9393FF"  href="likes.php">点赞</a>  
			  <a id="btlogin" style=" background:#01B468"  href="user.html">首页</a> 
		 </div>
	
	<div>
				<h2><?php echo"$row[2]";?></h2>
			</div><!-- Title end-->

			<!-- ===========================
			SOCIAL & CONTACT
			============================ -->
			<div class="row">
				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:#00BFFF;">图书编号：<?php echo"$row[0]";?>
						</li>
						<li><p style="color:#00BFFF;"><?php echo"$row[3]";?>
						</li>
						<li><p style="color:#00BFFF;">书籍类别：<?php echo"$row[6]";?>
						</li>
					</ul>
				</div><!-- social 1st col end-->

				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:#00BFFF;">总数：<?php echo"$row[4]";?>
						</li>
						<li><p style="color:#00BFFF;">剩余数量：<?php echo"$row[5]";?>
						</li>
						<li><p style="color:#00BFFF;">所属馆区编号：<?php echo"$row[8]";?>
						</li>
					</ul>
				</div><!-- social 2nd col end-->

				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:#00BFFF;">所属楼层：<?php echo"$row[7]";?>
						</li>
						<li><p style="color:#00BFFF;">出版时间:<?php echo"$row[10]";?>
						</li>
						<li><p style="color:#00BFFF;">￥<?php echo"$row[11]";?></p>
						</li>
					</ul>
				</div><!-- social 3rd col end-->
			</div><!-- header social end-->
		</div><!-- header right end-->
	</div><!-- header end-->

	<hr class="firsthr">

	<!-- ===========================
	BODY LEFT PART
	============================ -->
	<div class="col-md-8 mainleft">
		<div id="statement" class="row mobmid">
			<div class="col-sm-1">
				<span class="secicon fa fa-user"></span>
			</div><!--icon end-->

			<div class="col-sm-11">
				<h3>内容简介</h3>
				
				<p><?php echo"$row[9]";?></p>
				
<div class="tyg-div-denglv">
	<div class="tyg-div-form">
	
		<form action="comment1.php" method="post">
				<input type="text" name="comments" placeholder="发表你的评论..."/><button type="summit">发表</button>
		
		</form>	 
		</div>
	</div>
				
			</div><!--info end-->
		</div><!--personal statement end-->
</div>
		<hr>

	<!-- ===========================
	SIDEBAR
	=========================== -->
	<div class="col-md-4 mainright">
		<div class="row">
			<div class="col-sm-1 col-md-2 mobmid">
				<span class="secicon fa fa-magic"></span>
			</div><!--icon end-->

			<div class="col-sm-11 col-md-10">
				<h3 class="mobmid">其他 </h3>

				<p>喜爱人数</p>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
						<span class="sr-only"><?php echo "$row[14]";?></span>
					</div>
				</div><!--skill end-->


				<p>点击人数</p>
				<div class="progress">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php $row[12]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
						<span class="sr-only"> <?php echo "$row[12]";?></span>
					</div>
				</div><!--skill end-->

			
			</div><!--info end-->
		</div><!--tech skills end-->
		
		



		<hr>

		
	</div><!--right end-->
	
</div><!--container end-->


<!--necessary scripts and plugins-->
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/evenfly.js"></script>

</body>
</html>