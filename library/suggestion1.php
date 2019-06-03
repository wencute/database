
<?php
require_once("dbtools.inc.php");
$link = create_connection();
session_start();

//session_start();
 $id=$_SESSION["reader_id"];
$suggest=$_POST["suggest"];


$sq="INSERT INTO `suggestion` (`sg_id`, `reader_id`, `suggest`,`time`) VALUES (NULL, '$id', '$suggest',now())";
$en = execute_sql($link, "library", $sq);

echo "感谢您提出的意见以及建议！即将返回首页\n";
header("Refresh:2;url=user.html");	

mysqli_close($link);
?>
