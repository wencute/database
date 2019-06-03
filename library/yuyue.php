<meta charset="utf-8">
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();
$book_id = $_SESSION['book_id'];
 $id=$_SESSION["reader_id"];
 $row13=$_SESSION['row13'];  
if($row13==NULL)
{
$sql3 = "SELECT * FROM `book` WHERE book_id='$book_id' and rest_num=0";
$result3 = execute_sql($link, "library", $sql3);
if(mysqli_num_rows($result3) != 0)
{
$sql2 = "SELECT * FROM `yuyue` WHERE book_id='$book_id' and reader_id =$id and give is NULL";
$result2 = execute_sql($link, "library", $sql2);
if(mysqli_num_rows($result2) != 0)
{
	
	echo"<script>alert('您已经预约过此书！');history.go(-1);</script>";
}
else
{
$sql = "UPDATE book SET yuyue=$id WHERE book_id = '$book_id' ";
$result = execute_sql($link, "library", $sql);
$sql1 = "INSERT INTO `yuyue` (`yuyue_id`,`reader_id`, `book_id`, `give`) VALUES (NULL,'$id', '$book_id',NULL)";
$result1 = execute_sql($link, "library", $sql1);

echo"<script>alert('预约成功！');history.go(-1);</script>";
}		
}
else
{
	
	echo"<script>alert('本书未借出，您不需要预约，可直接借阅！');history.go(-1);</script>";
}
}
else
{
  echo"<script>alert('此书已被预约，请下次预约！');history.go(-1);</script>";
}
 
mysqli_close($link);
?>
