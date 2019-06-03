<?php
    
require_once("dbtools.inc.php");

$link = create_connection();
//if((isset($_POST["book_name"])) || (isset($_POST["writer"]))){
session_start();
$writer = $_POST["writer"];
$_SESSION['writer'] = $writer;
//$writer=$_POST["writer"];
$sql = "SELECT * FROM `book` WHERE `writer` LIKE '$writer%' ";

$result = execute_sql($link, "library", $sql);
if (mysqli_num_rows($result) == 0)
  {
    
	echo"<script>alert('抱歉，没有此作者的记录！');history.go(-1);</script>";      
  }
  else
  {
	header("location:mulu2.php");
  }

mysqli_close($link);
?>
