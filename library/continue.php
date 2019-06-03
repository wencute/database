<meta charset="utf-8" />
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];
 $row=$_SESSION['row5'];
$sql3 = "SELECT * FROM `borrow` WHERE book_id='$book_id' and reader_id='$id'";
$result3 = execute_sql($link, "library", $sql3);
if(mysqli_num_rows($result3) != 0)
{
$sql = "UPDATE borrow SET shreturn=date_add(NOW(), interval 1 MONTH)) WHERE reader_id='$id' AND book_id='$book_id' ";
$result = execute_sql($link, "library", $sql);
 $sql1 = "SELECT shreturn,book_id FROM `borrow` WHERE reader_id=$id and return_time is NULL and book_id='$book_id'";
		 $result1 = execute_sql($link, "library", $sql1);				
         $row=mysqli_fetch_row($result1);
	$row1=$row[0];
echo"续借成功，请在";
echo"<b>$row1</b>";
echo"之前归还该书籍";
		
}
else
{
	
	  echo"<script>alert('您没有借过此书！');history.go(-1);</script>";
}

mysqli_close($link);
?>
