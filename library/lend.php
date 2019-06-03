
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];
 $row=$_SESSION['row5'];

if($row==1)
	{
		$sql5 = "SELECT * FROM `reader` WHERE reader_id='$id'";
      $result5 = execute_sql($link, "library", $sql5);
 $row2=mysqli_fetch_row($result5);
 if (!$row2) {
 printf("Error: %s\n", mysqli_error($link));
 exit();
}
$row4=$row2[8];

if($row4>0)
{
$sql = "UPDATE book SET rest_num=0 WHERE book_id = '$book_id' ";
$result = execute_sql($link, "library", $sql);
$sql1 = "UPDATE reader SET borrowed=borrowed +1  WHERE reader_id = '$id'";
$result1 = execute_sql($link, "library", $sql1);
$sql2 = "UPDATE reader SET  not_return=not_return+1 WHERE reader_id = '$id'";
$result2 = execute_sql($link, "library", $sql2);
$sql3 = "UPDATE reader SET  can_borrow=can_borrow-1 WHERE reader_id = '$id'";
$result3 = execute_sql($link, "library", $sql3);
$sq="INSERT INTO `borrow` (`reader_id`, `book_id`, `borrow_time`, `shreturn`) VALUES ('$id', '$book_id', now(),date_add(NOW(), interval 2 MONTH))";
$en = execute_sql($link, "library", $sq);
$sql5 = "UPDATE over_book SET re=1 WHERE book_id = '$book_id'and re is NULL and reader_id = '$id'";
$result5 = execute_sql($link, "library", $sql5);

$sql6 = "SELECT * FROM `yuyue` WHERE `reader_id` = '$id' and `book_id` like '$book_id' AND give IS NULL";
$result6 = execute_sql($link, "library", $sql6);
 if (mysqli_num_rows($result6) != 0)	
       {
		   $sql7 = "UPDATE yuyue SET give=1 WHERE book_id = '$book_id'and give is NULL and reader_id = '$id'";
           $result7 = execute_sql($link, "library", $sql7);
	   }
$sql4="SELECT * FROM `borrow` WHERE `reader_id` = '$id' and `book_id` like '$book_id' AND return_time IS NULL";
$result4 = execute_sql($link, "library", $sql4);
  $row1=mysqli_fetch_row($result4);
 if (!$row1) {
 printf("Error: %s\n", mysqli_error($link));
 exit();
}
$row3=$row1[0];
$_SESSION['a'] = $row3;
header("location:success.php");
}
else
{
	  echo"<script>alert('您已经超过借书最大限度，请先归还已借的图书');history.go(-1);</script>";

}	
	}
	
else
{
		  echo"<script>alert('本书已借出，您可以预定此书');history.go(-1);</script>";
}
		
mysqli_close($link);
?>
