<!doctype html>
<html>
  <head>
  <style>
    .tyg-div-denglv{
		<!--z-index:1000;-->
		float:right;
		position:middle;
		right:3%;top:10%;
	}
	.tyg-div-form{
		background-color:white;
		border-style:solid;
		border-radius:10px;
		width:250px;
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
padding: 5px 10px;
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
	<title>详细信息</title>  
    <meta charset="utf-8">

  </head>
  <body background="img/15 (1)_副本.jpg">
  <div class="tyg-div-denglv">
	<div class="tyg-div-form">
   <form name="myForm" action="" method="post" >
  <table id="table-1" > <!-- Replace "table-1" with any of the design numbers -->
<tbody>
      <?php
        require_once("dbtools.inc.php");
				
        //建立資料連接
        $link = create_connection();
		$id=$_POST["id"];				
        //執行 SELECT 陳述式來擷取候選人資料
        
		$sql = "SELECT * FROM `reader` where `reader_id`='$id'";
        $result = execute_sql($link, "library", $sql);
			
          //顯示候選人各欄位的資料
     $row=mysqli_fetch_row($result);
		echo "<tr>";
			echo"<td>学号</td>";
              echo "<td>$row[0]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>姓名</td>";
              echo "<td>$row[2]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>手机号</td>";
              echo "<td>$row[3]</td>";
			  echo"</tr>";
			  echo "<tr>";
			echo"<td>专业</td>";
              echo "<td>$row[5]</td>";
			  echo"</tr>";
			    echo "<tr>";
			echo"<td>借书次数</td>";
				  echo "<td>$row[6]</td>";
				   echo"</tr>";
			  echo "<tr>";
			echo"<td>当前未还书籍</td>";
			  echo "<td>$row[7]</td>";
			  				   echo"</tr>";
			  echo "<tr>";
			echo"<td>当前可借书籍</td>";
			  echo "<td>$row[8]</td>";
			   echo"</tr>";
        mysqli_close($link);
      ?>

      
    </table>
	
    <p align='center'>
	<div id="login_click" > 
	
     
        <a id="btlogin" href="manager.html">回上一页</a>  
		
          
			
		 </div>
	</form>
	</div>
	</div>
  </body>
</html>
