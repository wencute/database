<?php
    
require_once("dbtools.inc.php");

$link = create_connection();
//if((isset($_POST["book_name"])) || (isset($_POST["writer"]))){
session_start();
$name = $_POST["name"];
$_SESSION['name'] = $name;
//$writer=$_POST["writer"];
$sql = "SELECT * FROM `book` WHERE `name` LIKE '$name%' ";

$result = execute_sql($link, "library", $sql);
if (mysqli_num_rows($result) == 0)
  {
  
	echo"<script>alert('抱歉，没有此书！');history.go(-1);</script>";      
  }
  else
  {
	header("location:mulu3.php");
  }

mysqli_close($link);
?>
