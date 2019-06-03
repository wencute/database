<?php
require_once("dbtools.inc.php");

$link = create_connection();

$comments=$_POST["comments"];

//$writer=$_POST["writer"];
$sql = "DELETE FROM `comment` WHERE `comment`.`comments` = '$comments' ";
$result = execute_sql($link, "library", $sql);

 echo "删除评论成功！即将返回首页</p>";
  
	header("Refresh:2;url=manager.html");
        mysqli_close($link);
		
      ?>