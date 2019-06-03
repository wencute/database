<?php
require_once("dbtools.inc.php");

$link = create_connection();
session_start();
$id=$_SESSION["book_id"];

//$writer=$_POST["writer"];
$sql = "DELETE FROM `book` WHERE `book`.`book_id` = '$id' ";
$result = execute_sql($link, "library", $sql);
$sql1 = "DELETE FROM `borrow` WHERE `borrow`.`book_id` = '$id' ";
$result1 = execute_sql($link, "library", $sql1);
$sql2 = "DELETE FROM `collect` WHERE `collect`.`book_id` = '$id' ";
$result2 = execute_sql($link, "library", $sql2);
$sql3 = "DELETE FROM `comments` WHERE `comments`.`book_id` = '$id' ";
$result3 = execute_sql($link, "library", $sql3);
 echo "删除成功！即将返回首页</p>";
   
	header("Refresh:2;url=manager.html");
        mysqli_close($link);
		
      ?>