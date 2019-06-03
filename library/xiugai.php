 <meta charset="utf-8">
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		session_start();
       $id=$_SESSION["reader_id"];		
		//執行 Select 陳述式取得注册人資料
		$password1 = $_POST["password1"];	
		
		$password2 = $_POST["password2"];
		$phone = $_POST["phone"];
		
            //建立資料連接
 if($password1!=0 || $password2!=0)       
	{   
		//執行 SELECT 陳述式來擷取候選人資料
if($password1==$password2)
{
    $sql = "UPDATE `reader` SET `password` = '$password1', `phone` = '$phone' WHERE `reader`.`reader_id` = $id";
	$result = execute_sql($link, "library", $sql);
	echo "更改成功</p>";
    echo "即将返回用户中心......</a>";
	header("Refresh:3;url=reader_center.html");

  }
  else
  {
    //顯示被推薦人已經是候選人的訊息
   
     echo"<script>alert('两次输入密码不一致，请重新输入！');history.go(-1);</script>";
  }
}
else
{
	   echo"<script>alert('密码不能为空！');history.go(-1);</script>";
}
            //關閉資料連接
            mysqli_close($link);
		  
		 
          ?>
		  </body>
</html>