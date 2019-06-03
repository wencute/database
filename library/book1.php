
<?php
require_once("dbtools.inc.php");
session_start();
$id=$_POST["id"];
$_SESSION['book_id']=$id;
$link = create_connection();

$sql = "SELECT * FROM `book` WHERE `book_id` LIKE '$id' ";
$result = execute_sql($link, "library", $sql);
  $row=mysqli_fetch_row($result);
	
 $sql6 = "UPDATE book SET score = score + 1 WHERE book_id = '$id'";
    $result6 = execute_sql($link, "library", $sql6);

	$sql1 = "SELECT reader_id FROM `borrow` WHERE return_time IS NULL AND book_id='$id' ";
    $result1 = execute_sql($link, "library", $sql1);
	$row1=mysqli_fetch_row($result1);
	$a=$row1[0];
	$sql2 = "SELECT COUNT(comment_id) FROM `comment` WHERE book_id='$id'"; 
	 $result2 = execute_sql($link, "library", $sql2);
	$row2=mysqli_fetch_row($result2);
	$b=$row2[0];
	$sql3 ="SELECT COUNT(collect_id) FROM `collect` WHERE book_id='$id' ";
	$result3 = execute_sql($link, "library", $sql3);
	$row3=mysqli_fetch_row($result3);
	$c=$row3[0];
	$sql4 = "SELECT book_id,name FROM `book` WHERE book_id='$id'";
	$result4 = execute_sql($link, "library", $sql4);
	$row4=mysqli_fetch_row($result4);
	$d=$row4[1];
	$sql5="SELECT comments FROM `comment`,`book`WHERE book.name='$d' AND book.book_id=comment.book_id";
	$result5 = execute_sql($link, "library", $sql5);			
	$total_records = mysqli_num_rows($result5);

        mysqli_data_seek($result5, 0);
				
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
      
    padding: 10px 10px 10px 10px;  
    font-size:16px;  
    font-family: 微软雅黑,宋体,Arial,Helvetica,Verdana,sans-serif;  
    font-weight:bold;  
    border-radius:3px;  
      
    -webkit-transition:all linear 0.30s;  
    -moz-transition:all linear 0.30s;  
    transition:all linear 0.30s;  
      
    }  
   #login_click a:hover { background:#385f9e; }  
   
	
	
	
  .tyg-div-denglv{
		<!--z-index:1000;-->
		float:right;
		position:middle;
		right:3%;top:0%;
	}
	.tyg-div-form{
		background-color:white;
		border-style:solid;
		border-radius:10px;
		width:800px;
		height:auto;
		margin:50px auto 0 auto;
		color:#6A6AFF;
	}
#table-1 thead, #table-1 li {
border-top-width: 90px;
border-top-height:90px;
border-top-style: solid;
background: #FFF
position:middle;
}
#table-1 {
border-bottom-width: 1px;
border-bottom-style: solid;
border-bottom-color: rgb(230, 189, 189);

}


#table-1 td, #table-1 th {
padding: 10px 20px;
font-size: 18px;
font-family: Verdana;
color: rgb(177, 106, 104);
}


#table-1 tr:nth-child(even) {

background: #FFF
}
#table-1 tr:nth-child(odd) {

background: rgb(238, 211, 210)
}
#login_click{ margin-top:10px; height:40px;position:right;}  
#login_click a   
{  
      
  
    text-decoration:none;  
    background:#01B468;  
    color:#f2f2f2;  
      
    padding: 10px 30px 10px 30px;  
    font-size:16px;  
    font-family: 微软雅黑,宋体,Arial,Helvetica,Verdana,sans-serif;  
    font-weight:bold;  
    border-radius:3px;  
      
    -webkit-transition:all linear 0.30s;  
    -moz-transition:all linear 0.30s;  
    transition:all linear 0.30s;  
      
    }  
   #login_click a:hover { background:#385f9e; }  
</style>
   <script type="text/javascript">
      function check_data()
      {		
	 
        //此部份用來驗證瀏覽者是否有選擇候選人
        for (var i = 0;i < document.myForm.elements.length; i++)
        {
          var e = document.myForm.elements[i];
          if (e.name == "comments" && e.checked == true )
          {
            var found = true;
            break;          
          }
        }
				
        if (found != true)
        {
          alert("您没有选择评论");
          return false;				
        }				
	//	else window.open('book.php');
        myForm.submit();

      }
	 
    </script>		
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
	<div id="login_click"style="margin:0px 00px;">
		  <a id="btlogin" style=" background:#01B468" href='jieyue.php'>借阅记录</a>
			  
		  <a id="btlogin" style=" background:#01B468" href='delete_book.php'>删除</a>
          
		 </div>
		<div class="col-sm-10">
			<div class="cv-title">
				<div class="row">
					<div class="col-sm-7">
						<h1><?php echo"$row[1]";?></h1>
					</div>
	
	<div style="margin:30px 100px;">
				<h2><?php echo"$row[2]";?></h2>
			</div><!-- Title end-->

			<!-- ===========================
			SOCIAL & CONTACT
			============================ -->
			<div class="row">
				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:6666FF;">图书编号：<?php echo"$row[0]";?></p>
						</li>
						<li><p style="color:6666FF;"><?php echo"$row[3]";?></a>
						</li>
						<li><p style="color:6666FF;">书籍类别：<?php echo"$row[6]";?></a>
						</li>
						<li><p style="color:6666FF;">图书所属：<?php echo"$a";?></a>
						</li>
					</ul>
				</div><!-- social 1st col end-->

				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:6666FF;">总数：<?php echo"$row[4]";?></a>
						</li>
						<li><p style="color:6666FF;">剩余数量：<?php echo"$row[5]";?></a>
						</li>
						<li><p style="color:6666FF;">所属馆区编号：<?php echo"$row[8]";?></a>
						</li>
						<li><p style="color:6666FF;">收藏量：<?php echo"$c";?></a>
						</li>
					</ul>
				</div><!-- social 2nd col end-->

				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><p style="color:6666FF;">所属楼层：<?php echo"$row[7]";?></a>
						</li>
						<li><p style="color:6666FF;">出版时间：<?php echo"$row[10]";?></a>
						</li>
						<li><p style="color:6666FF;">￥<?php echo"$row[11]";?></a>
						</li>
						<li><p style="color:6666FF;">评论量：<?php echo"$b";?></p>
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
	
		<div id="statement" class="row mobmid">
			<div class="col-sm-11">
				<h3>评论区</h3>
				<div class="tyg-div-denglv">
				<div class="tyg-div-form">
				<form name="myForm" action="delete_comments.php" method="post" >
				  <table id="table-1" > <!-- Replace "table-1" with any of the design numbers -->

<tbody>
				<?php 
				
				
						
					
        //列出所有候選人得票資料
        for ($j = 0; $j < $total_records; $j++)
        {
          //取得候選人資料
         
				while ($row5 = mysqli_fetch_object($result5))
            {
            echo"<li>";
              echo "<input type='radio' name='comments'" .
                "value='$row5->comments'>$row5->comments";
			  echo"</li>";
            }
         

        }
				
      ?>
		</tbody>

    <p align='center'>
	<div id="login_click" style="margin:5px 0px;"> 
	  <a id="btlogin"  onClick="check_data()">删除</a>  
     
		
          
			
		 </div>
	</form>
			</div><!--info end-->
		</div><!--personal statement end-->
		<hr>

	<!-- ===========================
	SIDEBAR
	=========================== -->
	
	
</div><!--container end-->


<!--necessary scripts and plugins-->
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/evenfly.js"></script>

</body>
</html>