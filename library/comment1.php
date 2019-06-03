
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
//session_start();
 $id=$_SESSION["reader_id"];
$comments=$_POST["comments"];


$sq="INSERT INTO `comment` (`comment_id`,`reader_id`, `book_id`,`comments`) VALUES (NULL,'$id', '$book_id','$comments')";
$en = execute_sql($link, "library", $sq);
$sql4="SELECT * FROM `comment` WHERE `reader_id` = '$id' and `book_id` like '$book_id'";
$result4 = execute_sql($link, "library", $sql4);
 
  $row2=mysqli_fetch_row($result4);
 
$row2=$row2[0];
$_SESSION['c'] = $row2;

  echo"<script>alert('评论成功！');history.go(-1);</script>";


mysqli_close($link);
?>
