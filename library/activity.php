 
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		 
				
		$name = $_POST["name"];	
	
		$location = $_POST["location"];
		$information = $_POST["information"];
		
		$time = $_POST["time"];
		
		
  $sql = "SELECT * FROM activity WHERE contain='$information'";
  $result = execute_sql($link, "library", $sql);
         
  if (mysqli_num_rows($result) == 0)
  {
    mysqli_free_result($result); 
    $sql = "INSERT INTO `activity` (`activity_id`, `activity_name`, `location`, `date`, `contain`,`sum`) VALUES (NULL, '$name', '$location', '$time', '$information','0')";
	$result = execute_sql($link, "library", $sql);
	echo "发布活动成功\n</p>";
    echo "即将返回首页......\n</a>";
	header("Refresh:3;url=manager.html");

  }
  else
  {

    echo "此活动重复\n</p>";
    echo "<a href ='javascript:history.back()'>回上一页</a>";
    echo "                   <a href='manager.html'>回首页</a></p>";
  }
	
		

            //關閉資料連接
            mysqli_close($link);
		  
		 
          ?>