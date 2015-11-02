<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
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
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Grand+Hotel" rel="stylesheet" type="text/css" />
    <!-- Flat-UI for Bootstrap -->
    <link href="bower_components/flat-ui/dist/css/flat-ui.min.css" rel="stylesheet">
    <!-- Bootstrap Datepicker -->
    <link href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Trip.js -->
    <link href="bower_components/Trip.js/dist/trip.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/syllabus.css" rel="stylesheet">
    <link href="Trip.js-3.0.0/dist/trip.css" rel="stylesheet">

    <link href="bootstrap-datepicker-1.4.0-dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png?v=bOOKmG78np">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png?v=bOOKmG78np">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png?v=bOOKmG78np">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png?v=bOOKmG78np">
	<link rel="icon" type="image/png" href="/favicons/favicon-32x32.png?v=bOOKmG78np" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicons/favicon-96x96.png?v=bOOKmG78np" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicons/favicon-16x16.png?v=bOOKmG78np" sizes="16x16">
	<link rel="manifest" href="/favicons/manifest.json?v=bOOKmG78np">
	<link rel="mask-icon" href="/favicons/safari-pinned-tab.svg?v=bOOKmG78np" color="#5bbad5">
	<link rel="shortcut icon" href="/favicons/favicon.ico?v=bOOKmG78np">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="msapplication-config" content="/favicons/browserconfig.xml?v=bOOKmG78np">
	<meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="favicon.ico">
    
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
        //show row if it is a module
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
        //show row if it is a submodule
        if(!empty($row[1])){
          echo "<tr>";
          echo "<td></td>";
          $submodule_no = $module_no . "." . $row[1];
          echo "<td id=\"tour4\">" . $submodule_no . "</td>";
          echo "<td id=\"tour5\"> $row[3] </td>";

          echo "<input type=\"hidden\" name=\"submoduleno[]\" value=\"". $submodule_no ."\">";
          echo "<input type=\"hidden\" name=\"submodulename[]\" value=\"". $row[3] ."\">";

          //show date range input feilds for all submodules
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

      //print table or proceed to gantt chart view ie. "summary.php"
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
    
    <div></div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Twitter Bootstrap Core JS -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker -->
    <script src="bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    
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
