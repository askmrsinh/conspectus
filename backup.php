<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
?>

<?php
$arr = array();

$rs = mysqli_query($connection,"SELECT * FROM accounts");
$fp = fopen('DB/accounts.json', 'w');
while($obj = mysqli_fetch_object($rs)) {
  $arr[] = $obj;
}
fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
fclose($fp);
unset($arr);


$rs = mysqli_query($connection,"SELECT * FROM courses");
while($obj = mysqli_fetch_object($rs)) {
  $arr[] = $obj;
}
$fp = fopen('DB/courses.json', 'w');
fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
fclose($fp);
unset($arr);


$rs = mysqli_query($connection,"SELECT * FROM dashboard");
while($obj = mysqli_fetch_object($rs)) {
  $arr[] = $obj;
}
$fp = fopen('DB/dashboard.json', 'w');
fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
fclose($fp);
unset($arr);

?>
