   <meta charset="utf-8">
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];
 


$sql6 = "SELECT * FROM `borrow` WHERE book_id='$book_id' and reader_id='$id' and return_time is NULL";
$result6 = execute_sql($link, "library", $sql6);
if(mysqli_num_rows($result6) != 0)
{
 
$sql4 = "SELECT * FROM `ticket` WHERE reader_id=$id and book_id='$book_id'and give is NULL";
$result4 = execute_sql($link, "library", $sql4);	
  if (mysqli_num_rows($result4) == 0)
  {
$sql = "UPDATE book SET rest_num=1 WHERE book_id = '$book_id' ";
$result = execute_sql($link, "library", $sql);
$sql2 = "UPDATE reader SET  not_return=not_return-1 WHERE reader_id = '$id'";
$result2 = execute_sql($link, "library", $sql2);
$sql3 = "UPDATE reader SET  can_borrowed=can_borrowed+1 WHERE reader_id = '$id'";
$result3 = execute_sql($link, "library", $sql3);
$sq="UPDATE borrow SET return_time=now() WHERE  book_id='$book_id' and reader_id='$id' and return_time is NULL";
 $en = execute_sql($link, "library", $sq);
  echo"<script>alert('还书成功！');history.go(-1);</script>";
}
	else
	{  
	  echo"<script>alert('您已逾期还书，请先在个人中心缴费');history.go(-1);</script>"; 
	}	   
}
else
{
	echo"<script>alert('您没有借过此书');history.go(-1);</script>"; 
}
	
mysqli_close($link);
?>