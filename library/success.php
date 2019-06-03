<!doctype html>
<html>
  <head>
  <style>
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
		width:500px;
		height:auto;
		margin:50px auto 0 auto;
		color:#2ec0f6;
	}
#table-1 thead, #table-1 tr {
border-top-width: 100px;
border-top-height:500px;
border-top-style: solid;
border-top-color: rgb(230, 189, 189);
position:middle;
}
#table-1 {
border-bottom-width: 1px;
border-bottom-style: solid;
border-bottom-color: rgb(230, 189, 189);

}
#table-1 td, #table-1 th {
padding: 10px 50px;
font-size: 18px;
font-family: Verdana;
color: rgb(177, 106, 104);
}


#table-1 tr:nth-child(even) {
background: rgb(238, 211, 210)

}
#table-1 tr:nth-child(odd) {
background: #FFF
}
#login_click{ margin-top:32px; height:40px;position:absolute;}  
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
	<title>借书成功</title>  
    <meta charset="utf-8">
  </head>
  <body background="img/15 (1)_副本.jpg">
  <div class="tyg-div-denglv">
	<div class="tyg-div-form">
   <form name="myForm" action="" method="" >
  <table id="table-1" > <!-- Replace "table-1" with any of the design numbers -->
<thead>

<h2>借书成功，信息如下表：</h2>

</thead>
<tbody>


<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();


 $id=$_SESSION["reader_id"];
$book_id = $_SESSION['book_id'];
	 $sql1 = "SELECT * FROM `borrow` WHERE reader_id=$id and return_time is NULL and book_id='$book_id'";
		 $result1 = execute_sql($link, "library", $sql1);				
        //計算總記錄數
        $row=mysqli_fetch_row($result1);
			echo "<tr>";
			echo"<td>学号</td>";
              echo "<td>$row[1]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>书号</td>";
              echo "<td>$row[2]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>借阅时间</td>";
              echo "<td>$row[3]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>应还时间</td>";
              echo "<td>$row[5]</td>";
			  echo"</tr>";
	
mysqli_close($link);
?>
</tr>
    </table>
	
    <p align='center'>
	<div id="login_click" > 
	
    
        <a id="btlogin" href="user.html">回首页</a>  
		
          
			
		 </div>
	</form>
	</div>
	</div>
  </body>
</html>