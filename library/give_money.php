 <meta charset="utf-8">
	
<?php
require_once("dbtools.inc.php");
$link = create_connection();

$money_id = $_POST['id'];

$sql = "UPDATE ticket SET give=1 where money_id=$money_id";
$result = execute_sql($link, "library", $sql);
echo"您已成功缴费</p>";
$sql1 = "SELECT * FROM `ticket` WHERE money_id=$money_id";
$result1 = execute_sql($link, "library", $sql1);
 $row=mysqli_fetch_row($result1);
 $row1=$row[4];
echo"本次扣除金额</p>";echo"<b>$row1</b>";

header("Refresh:2;url=user.html");
mysqli_close($link);
?>
