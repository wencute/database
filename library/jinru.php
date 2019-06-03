    <meta charset="utf-8">
<?php
  require_once("dbtools.inc.php");
 
  //取得表單資料
  if(isset($_POST["manager_id"])||isset($_POST["password"])){
	  session_start();
  $manager_id = $_POST["manager_id"];
 $_SESSION["manager_id"]=$manager_id;
  $password = $_POST["password"];
  //建立資料連接
  $link = create_connection();
			
  //執行 SELECT 陳述式來擷取候選人資料
  $sql = "SELECT * FROM `manager` WHERE `manager_id` ='$manager_id' AND `password` = '$password'";
  $result = execute_sql($link, "library", $sql);
  
    if (mysqli_num_rows($result) == 1)
  {
	header("location:manager.html");
   
  }
  else
  {
  

	echo "您需要注册或者是密码错误</p>";
    echo "<a href ='enroll2.html'>注册</a><br>";
	echo "<a href ='index.html'>回首页</a>";
  }
            //關閉資料連接
            mysqli_close($link);
  }
     ?>
	  