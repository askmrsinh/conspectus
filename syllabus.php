<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
?>

<?php
session_start();

//redirect user to login page if user isn't logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");//use for the redirection to login page  
}

//$setplan = $_POST['plan'];
$table = "00ashesh_2015_teitc601_se";

//echo $setplan;

// show table

// sending query
$result = mysqli_query($connection, "SELECT * FROM {$table}");
if (!$result) {
  die("Query to show fields from table failed");
}

$fields_num = mysqli_num_fields($result);

echo "<h1>Table: {$table}</h1>";
echo "<table class=\"table table-hover table-responsive table-bordered\"><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
  $field = mysqli_fetch_field($result);
  echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysqli_fetch_row($result))
{
  echo "<tr>";

  // $row is array... foreach( .. ) puts every element
  // of $row to $cell variable
  foreach($row as $cell)
    echo "<td>$cell</td>";

  echo "</tr>\n";
}
mysqli_free_result($result);
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
