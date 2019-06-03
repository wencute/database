 <meta charset="utf-8">
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		 
					
		//執行 Select 陳述式取得注册人資料
		$name = $_POST["name"];	
		$id = $_POST["id"];
		$password = $_POST["password"];
		$phone = $_POST["phone"];
		$class = $_POST["class"];
		$major = $_POST["major"];
            //建立資料連接
        
														
  if($name!=0 || $id !=0 ||$password !=0 ||$phone !=0 ||$class !=0 ||$major !=0)
  {
		//執行 SELECT 陳述式來擷取候選人資料
  $sql = "SELECT * FROM reader WHERE reader_id='$id'";
  $result = execute_sql($link, "library", $sql);
           //檢查被推薦人是否有在候選人清單中
  if (mysqli_num_rows($result) == 0)
  {
    //釋放資源
    mysqli_free_result($result);
		
    //將候選人資料加入資料庫
    $sql = "insert into reader values($id,$password,'$name',$phone,'$class','$major',0,0,5)";
	$result = execute_sql($link, "library", $sql);
	echo "注册成功</p>";
    echo "即将返回首页......</a>";
	header("Refresh:3;url=index.html");

  }
  else
  {
    //顯示被推薦人已經是候選人的訊息
    echo "您已注册，不需要再注册。</p>";
    echo "<a href ='javascript:history.back()'>回上一页</a>";
    echo "                   <a href='index.php'>回首页</a></p>";
  }
  }	
else
{

	 echo"<script>alert('请填写完整的信息！');history.go(-1);</script>";
}	

            //關閉資料連接
            mysqli_close($link);
		  
		 
          ?>
		  </body>
</html>