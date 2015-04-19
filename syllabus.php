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
  header("Location: login.php");
}

if (isset($_POST['delcourse'])) {
  $del_course=$_POST['delcourse'];

  $sql = "DELETE FROM `dashboard` WHERE `course_table_id`=\"$del_course\";";
  $result = mysqli_query($connection, $sql);

  $sql = "DROP TABLE $del_course;";
  $result = mysqli_query($connection, $sql);

  header("Location: index.php");

}

if (isset($_POST['plancourse'])) {
  $usercoursetable  = $_POST['plancourse'];

  $sql = "SELECT * FROM {$usercoursetable}";
  $result = mysqli_query($connection, $sql);
  if (!$result) {
    die("Query to show fields from table failed");
  }

  echo "<h1 class=\"course_table\">" . $usercoursetable . "</h1>";
  $fields_num = mysqli_num_fields($result);
  echo "<form id=\"schedule-form\" action=\"summary.php\" method=\"POST\" traget=\"_blank\">";
  echo "<table class=\"table table-hover table-responsive table-bordered table-condenced\">";
  while($row = mysqli_fetch_row($result))
  {
    if(!empty($row[0])){
      $module_no = $row[0];
      echo "<tr>";
      echo "<th id=\"tour1\"> $module_no </td>";
      echo "<th id=\"tour2\" colspan=\"2\"> $row[2] </td>";
      echo "<th id=\"tour3\" colspan=\"2\"> $row[4] </td>";

      echo "<input type=\"hidden\" name=\"moduleno[]\" value=\"". $module_no ."\">";
      echo "<input type=\"hidden\" name=\"modulename[]\" value=\"". $row[2] ."\">";

      echo "</tr>";
    }
    if(!empty($row[1])){
      echo "<tr>";
      echo "<td></td>";
      $submodule_no = $module_no . "." . $row[1];
      echo "<td id=\"tour4\">" . $submodule_no . "</td>";
      echo "<td id=\"tour5\"> $row[3] </td>";

      echo "<input type=\"hidden\" name=\"submoduleno[]\" value=\"". $submodule_no ."\">";
      echo "<input type=\"hidden\" name=\"submodulename[]\" value=\"". $row[3] ."\">";

      echo "
    <td id=\"sandbox-container\">
    <div class=\"input-daterange input-group\" id=\"datepicker\">
      <input id=\"tour6\" type=\"text\" class=\"input-sm form-control\" autocomplete=\"off\" name=\"start[]\" value=\"". $row[5] ."\" placeholder=\"\"/>
      <span class=\"input-group-addon\">to</span>
      <input id=\"tour7\" type=\"text\" class=\"input-sm form-control\" autocomplete=\"off\" name=\"end[]\" value=\"". $row[6] ."\" placeholder=\"\"/>
    </div>
    </td>";
      echo "</tr>";
    }
  }
  echo "</table>";
  echo "<div class=\"done col-lg-3\">
          <button id=\"tour8\" class=\"btn btn-lg btn-primary btn-block btn-success\" onclick=\"printFunction()\">Print</button>
        </div>";
  echo "<div class=\"done col-lg-3\">
          <button type=\"submit\" name=\"report\" value=\"". $usercoursetable ."\" class=\"btn btn-lg btn-primary btn-block btn-success\">Done</button>
        </div>";
  echo "</form>";
} else {
  echo "unable to select user course table";
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
    <link href="css/syllabus.css" rel="stylesheet">
    <link href="Trip.js-3.0.0/dist/trip.css" rel="stylesheet">

    <link href="bootstrap-datepicker-1.4.0-dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <style type="text/css">
      .course_table{
        text-align:center;
        color: white;
        background-color: #7F8C8D !important;
        margin-bottom:0px;
        padding-top:20px;
        padding-bottom:20px;
      }
    </style>
  </head>
  <body>
    <div></div>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Twitter Bootstrap Core JS -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <!-- Flat-UI for Bootstrap -->
    <script src="Flat-UI-master/dist/js/flat-ui.min.js"></script>
    <script src="bootstrap-datepicker-1.4.0-dist/js/bootstrap-datepicker.min.js"></script>
    <script>
      $('#sandbox-container .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        clearBtn: true,
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true
      });
    </script>
    <script>
      function printFunction() {
        window.print();
      }
    </script>
    <script src="Trip.js-3.0.0/dist/trip.min.js" type="text/javascript"></script>
    <script>
      var trip = new Trip([
        {
          sel : $('#tour1'),
          content : 'Module Mumber',
          position : "e",
          animation: 'fadeInRight'
        },
        {
          sel : $('#tour2'),
          content : 'Module Name',
          position : "e",
          animation: 'fadeInRight'
        },
        {
          sel : $('#tour3'),
          content : 'Hours Allocated',
          position : "w",
          animation: 'fadeInLeft'
        },
        {
          sel : $('#tour4'),
          content : 'Sub Module Number',
          position : "e",
          animation: 'fadeInRight'
        },
        {
          sel : $('#tour5'),
          content : 'Sub Module Name',
          position : "s",
          animation: 'fadeInUp'
        },
        {
          sel : $('#tour6'),
          content : 'Click to set Start Date',
          position : "w",
          animation: 'fadeInLeft'
        },
        {
          sel : $('#tour7'),
          content : 'Click to set End Date',
          position : "w",
          animation: 'fadeInLeft'
        },
        {
          sel : $('#tour8'),
          content : 'Click to print Schedule',
          position : "s",
          animation: 'fadeInUp'
        },
        {
          sel : $('#tour9'),
          content : 'See Report',
          position : "s",
          animation: 'fadeInUp'
        }
      ],{
        backToTopWhenEnded : true,
        delay : 3000
      }); // details about options are listed below

      $(document).ready(function(){
        trip.start();
      },{
        showCloseBox : true,
      });
    </script>
  </body>
</html>
