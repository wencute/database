<meta charset="utf-8">
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];

	
$sq="DELETE FROM `collect` WHERE book_id='$book_id' and reader_id=$id";
 $en = execute_sql($link, "library", $sq);

echo "取消收藏成功！即将返回个人中心</p>";
header("Refresh:2;url=reader_center.html");
  
mysqli_close($link);
?>
