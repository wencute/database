 
<?php

            require_once("dbtools.inc.php");
			 $link = create_connection();
		 
					
		//執行 Select 陳述式取得注册人資料
		$name = $_POST["book_name"];	
		$id = $_POST["book_id"];
		$writer = $_POST["writer"];
		$information = $_POST["information"];
		$book_cat = $_POST["book_cat"];
		$publish = $_POST["publish"];
		$publish_time = $_POST["publish_time"];
		$price = $_POST["price"];
		$library_id = $_POST["library_id"];
		$floor = $_POST["floor"];
		
            //建立資料連接
        
														
            
		//執行 SELECT 陳述式來擷取候選人資料
  $sql = "SELECT * FROM book WHERE book_id='$id'";
  $result = execute_sql($link, "library", $sql);
           //檢查被推薦人是否有在候選人清單中
  if (mysqli_num_rows($result) == 0)
  {
    //釋放資源
    mysqli_free_result($result);
		
    //將候選人資料加入資料庫
    $sql = "INSERT INTO `book` (`book_id`, `name`, `writer`, `publish`, `sum`, `rest_num`, `book_cat`, `floor`, `library_id`, `infromation`, `publish_time`, `price`, `score`, `yuyue`, `likes`) VALUES ('$id', '$name', '$writer', '$publish', '1', '1', '$book_cat', '$floor', '$library_id', '$information', '$publish_time', '$price', '0', '', '0')";
	$result = execute_sql($link, "library", $sql);
	echo "加入书籍成功</p>";
    echo "即将返回上一页......</a>";
	header("Refresh:3;url=manager.html");

  }
  else
  {
    //顯示被推薦人已經是候選人的訊息
    echo "此书编号重复</p>";
    echo "<a href ='javascript:history.back()'>回上一页</a>";
    echo "                   <a href='manager.html'>回首页</a></p>";
  }
	
		

            //關閉資料連接
            mysqli_close($link);
		  
		 
          ?>
		  </body>
</html>