
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];

	$sql = "UPDATE book SET likes=likes + 1 WHERE book_id = '$book_id' ";

$result = execute_sql($link, "library", $sql);


 echo"<script>alert('点赞成功！');history.go(-1);</script>";      

		
mysqli_close($link);
?>
