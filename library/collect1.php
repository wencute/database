
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];
$sql="SELECT * FROM `collect` WHERE `reader_id` = '$id' and `book_id` like '$book_id'";
$result = execute_sql($link, "library", $sql);

if (mysqli_num_rows($result) == 0)
{
 $sq="INSERT INTO `collect` (`collect_id`,`reader_id`, `book_id`) VALUES (NULL,'$id', '$book_id')";
$en = execute_sql($link, "library", $sq);
$sql4="SELECT * FROM `collect` WHERE `reader_id` = '$id' and `book_id` like '$book_id'";
$result4 = execute_sql($link, "library", $sql4);
  $row1=mysqli_fetch_row($result4);
$row0=$row1[0];
$_SESSION['b'] = $row0;
 
     echo"<script>alert('收藏成功！');history.go(-1);</script>";
}
else
{
  echo"<script>alert('您已收藏过该书');history.go(-1);</script>";

}
//$_SESSION['a']=$row1;

		
	
mysqli_close($link);
?>
