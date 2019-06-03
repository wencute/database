<meta charset="utf-8">
<?php
require_once("dbtools.inc.php");
$link = create_connection();

$news_id = $_POST['id'];


$sql = "UPDATE news SET know=1 where news_id ='$news_id'";

$result = execute_sql($link, "library", $sql);
header("location:reader_center.html");
mysqli_close($link);
?>
