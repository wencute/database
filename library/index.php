
<?php
  require_once("dbtools.inc.php");
   header("Content-type: text/html; charset=utf-8");
  //取得表單資料
 session_start();
  $id = $_POST["id"];
 $_SESSION["reader_id"]=$id;
  $password = $_POST["password"];
  //建立資料連接
  $link = create_connection();
  $sql = "SELECT * FROM `reader` WHERE `reader_id` ='$id' AND `password` = '$password '";
  $result = execute_sql($link, "library", $sql);
  
    if (mysqli_num_rows($result) == 1)
  {
		echo"登录成功！";
		 $sql1 = "SELECT book_id,shreturn FROM `borrow` WHERE reader_id=$id and return_time is NULL and now()>shreturn";
		 $result1 = execute_sql($link, "library", $sql1);	
		
        //計算總記錄數
		if(mysqli_num_rows($result1)!= 0)
		{
        $total_records = mysqli_num_rows($result1);
		echo"<br>";  
		echo"您有新的消息，请在个人中心查收";
        /* 目前記錄指錄已經在資料表尾端，我們使用
           mysql_data_seek() 函式將記錄指標移至第 1 筆記錄 */
        mysqli_data_seek($result1, 0);
        for ($j = 0; $j < $total_records; $j++)
        {
          	while ($row = mysqli_fetch_object($result1))
            {
		$sql2 = "INSERT INTO `library`.`news` (`news_id`, `reader_id`, `content`, `book_id`) VALUES (NULL, '$id', '您已经超过还书期限，请尽快归还书籍，请在个人中心中查询您的欠费金额！','$row->book_id');";
        $result2 = execute_sql($link, "library", $sql2);
		$sql8 = "SELECT * FROM `ticket` WHERE reader_id=$id and give is NULL";
		 $result8 = execute_sql($link, "library", $sql8);	
		 if(mysqli_num_rows($result8) == 0)
		 {
		$date0=date('Y-m-d h:i:sa');//获取当前时间
		$today=strtotime ($date0); 
	    $t3=strtotime($row->shreturn);//转化为时间戳格式
		$time=ceil(($today-$t3)/86400);//求两个日期相差的天数
		$sql5 = "INSERT INTO `ticket` (`money_id`, `reader_id`, `book_id`, `over_date`, `money`, `give`) VALUES (NULL, '$id', '$row->book_id','$time','$time'*0.5,NULL)";
        $result5 = execute_sql($link, "library", $sql5);
		 }
            }
		}
		}
        $sql3 = "SELECT book_id FROM `yuyue` WHERE reader_id=$id and give is NULL";
		$result3 = execute_sql($link, "library", $sql3);
        if (mysqli_num_rows($result3) != 0)	
       {
		   echo"<br>";
		   echo"您预约的书有新的消息";
	    $total_records1 = mysqli_num_rows($result3);		
        /* 目前記錄指錄已經在資料表尾端，我們使用
           mysql_data_seek() 函式將記錄指標移至第 1 筆記錄 */
        mysqli_data_seek($result3, 0);
	    for ($j = 0; $j < $total_records1; $j++)
        {
          	while ($row1 = mysqli_fetch_object($result3))
            {
		  $row2=$row1->book_id;
		  $sql6 = "SELECT * FROM `borrow` WHERE book_id='$row2' and return_time is NULL";
		  $result6 = execute_sql($link, "library", $sql6);	
		  if (mysqli_num_rows($result6) == 0)
        {
        $sql7 = "INSERT INTO `library`.`news` (`news_id`, `reader_id`, `content`, `book_id`) VALUES (NULL, '$id', '您预约的书可以借阅了！','$row2');";
        $result7 = execute_sql($link, "library", $sql7);
        }
            }
		}
        }
			
  header("Refresh:2;url=user.html");
  }
  else
  {
	echo "您需要注册或者是密码错误</p>";
    echo "<a href ='enroll.html'>注册</a><br>";
	echo "<a href ='index.html'>回首页</a>";
  }
            //關閉資料連接
            mysqli_close($link);
     ?>
		  </body>
</html>