     <meta charset="utf-8">
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		$id = $_POST["id"];	
  $sql = "UPDATE activity SET sum=sum + 1 WHERE activity_id = '$id'";
  $result = execute_sql($link, "library", $sql);
         
 
	 echo"<script>alert('加入活动成功！');history.go(-1);</script>";
        //關閉資料連接
            mysqli_close($link);	 
          ?>
		 