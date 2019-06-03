 
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		 
					
		//執行 Select 陳述式取得注册人資料
		$manager_name = $_POST["manager_name"];	
		$manager_id = $_POST["manager_id"];
		$manager_password = $_POST["manager_password"];
		$manager_phone = $_POST["manager_phone"];
	
		
            //建立資料連接
        
														
      if($manager_name!=0 || $manager_id !=0 ||$manager_password !=0 ||$manager_phone !=0)
  {      
		//執行 SELECT 陳述式來擷取候選人資料
  $sql = "SELECT * FROM manager WHERE manager_id='$manager_id'";
  $result = execute_sql($link, "library", $sql);
           //檢查被推薦人是否有在候選人清單中
  if (mysqli_num_rows($result) == 0)
  {
    //釋放資源
    mysqli_free_result($result);
		
    //將候選人資料加入資料庫
    $sql = "INSERT INTO `manager` (`manager_id`, `name`, `password`, `phone`) VALUES ('$manager_id', '$manager_name', '$manager_password', '$manager_phone');";
	$result = execute_sql($link, "library", $sql);
	echo "注册成功</p>";
    echo "即将返回上一页......</a>";
	header("Refresh:2;url=jinru.html");

  }
  else
  {
    //顯示被推薦人已經是候選人的訊息
    echo "您已注册，不需要再注册。</p>";
   header("Refresh:2;url=jinru.html");

   
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