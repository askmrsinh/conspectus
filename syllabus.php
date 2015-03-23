<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("database conncetion Failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
?>

<?php
session_start();

$sql = " ";
$courses_sqlresult = mysqli_query($connection, $sql) or die("database conncetion Failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

if (!$courses_sqlresult) {
  die("database conncetion failed: " . mysqli_error($connection));
}

if (isset($_POST['submit'])) {
  $courses_thought = $_POST['courses_checked'];
  if(empty($courses_thought)) {
    $message = "You have no course to display";
  }
  else
  {
    $N = count($courses_thought);

    $message = "You selected $N course(s): ";
    for($i=0; $i < $N; $i++)
    {
      $year = date("Y");
      $course_table_id = $_SESSION['username'] ."_". $year ."_". $courses_thought[$i];
      $sql = "INSERT INTO dashboard VALUES ('{$year}','{$_SESSION['username']}','{$courses_thought[$i]}','{$course_table_id}');";
      $dashboard_sqlresult = mysqli_query($connection, $sql) or die("database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
  }
} else {
  $message = "Your Dashboard";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Conspectus</title>
    <!-- Twitter Bootstrap Core CSS -->
    <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:300|Grand+Hotel" rel="stylesheet" type="text/css" />
    <!-- Flat-UI for Bootstrap -->
    <link href="Flat-UI-master/dist/css/flat-ui.min.css" rel="stylesheet">
    <!-- Datepicker -->
    <link href="bootstrap-datepicker-1.4.0-dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Remodal -->
    <link rel="stylesheet" href="Remodal-0.6.3/dist/jquery.remodal.css">
    <!-- Custom CSS-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Twitter Bootstrap Core JS -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <!-- Flat-UI for Bootstrap -->
    <script src="Flat-UI-master/dist/js/flat-ui.min.js"></script>
    <script src="bootstrap-datepicker-1.4.0-dist/js/bootstrap-datepicker.min.js"></script>
  </body>
</html>
