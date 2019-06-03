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
		width:1000px;
		height:auto;
		margin:50px auto 0 auto;
		color:#2ec0f6;
	}
#table-1 thead, #table-1 tr {
border-top-width: 100px;
border-top-height:500px;
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
padding: 10px 50px;
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
	<title>收藏详情</title>  
     <meta charset="utf-8">
  </head>
  
  <body background="img/15 (1)_副本.jpg">
  <div class="tyg-div-denglv">
	<div class="tyg-div-form">
   <form name="myForm" action="" method="post" >
  <table id="table-1" > <!-- Replace "table-1" with any of the design numbers -->
<thead>

<th>图书编号</th>
<th>图书名称</th>
<th>作者</th>
<th>内容简介</th>
<th>收藏量</th>
</thead>
<tbody>


<?php
require_once("dbtools.inc.php");

$link = create_connection();

$sql = "SELECT *,count(book_id) as cout FROM `collect` group by book_id";
$result = execute_sql($link, "library", $sql);
 $total_records = mysqli_num_rows($result);
			

        /* 目前記錄指錄已經在資料表尾端，我們使用
           mysql_data_seek() 函式將記錄指標移至第 1 筆記錄 */
        mysqli_data_seek($result, 0);
				
      
        for ($j = 0; $j < $total_records; $j++)
        {
      	while ($row = mysqli_fetch_object($result))
            {
             $row0=$row->book_id;
             $sql1 = "SELECT * FROM `book` where book_id='$row0'";
             $result1 = execute_sql($link, "library", $sql1);

		
		
        $total_records1 = mysqli_num_rows($result1);
			

        /* 目前記錄指錄已經在資料表尾端，我們使用
           mysql_data_seek() 函式將記錄指標移至第 1 筆記錄 */
        mysqli_data_seek($result1, 0);
				
      
        for ($j = 0; $j < $total_records1; $j++)
        {
      	while ($row1 = mysqli_fetch_object($result1))
            {
            echo "<tr>";
	echo"<td>";
	echo "$row1->book_id</td>";
	echo "<td>$row1->name</td>";
            	echo"<td>$row1->writer</td>";  
              echo "<td>$row1->infromation</td>";	
             
            }
        }
		 echo "<td >$row->cout</td>";	
		echo "</tr>";
			}
		}
        mysqli_close($link);
		
      ?>
   </tr>
    </table>
	
    <p align='center'>
	<div id="login_click" > 
	
      
        <a id="btlogin" href="manager_center.html">回上一页</a>  
		
          
			
		 </div>
	</form>
	</div>
	</div>
  </body>
</html>