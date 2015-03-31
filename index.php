<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
?>

<?php
//php session
session_start();

//redirect user to login page if user isn't logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

//retrive a list of avalable course details in "courses" TABLE
$sql = "SELECT * FROM `courses` ORDER BY `course_id`";
$courses_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
if (!$courses_sqlresult) {
  die("SELECT * FROM `courses` . . . , failed: " . mysqli_error($connection));
}

//check if form is submitted
if (isset($_POST['submit'])) {
  $courses_thought = $_POST['courses_checked'];
  if(empty($courses_thought)) {
    $message = "You have no course to display";
  }
  else
  {
    //check total number of couses thought by the user
    $N = count($courses_thought);

    $message = "You selected $N course(s): ";
    //for each course thought, make an entry in "dashboard" TABLE
    for($i=0; $i < $N; $i++)
    {
      //estimate the year the course is being taken in
      $year = date("Y");
      $course_table_id = "00" . $_SESSION['username'] ."_". $year ."_". $courses_thought[$i];

      $sql = "INSERT INTO `dashboard` VALUES ('{$year}','{$_SESSION['username']}','{$courses_thought[$i]}','{$course_table_id}');";
      $dashboard_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
      if (!$dashboard_sqlresult) {
        die("INSERT INTO `dashboard` . . ., failed: " . mysqli_error($connection));
      }

      $sql = "CREATE TABLE IF NOT EXISTS `$course_table_id` (";
      $sql .= "`m_id` int(2) DEFAULT NULL,";
      $sql .= "`sm_id` int(2) DEFAULT NULL,";
      $sql .= "`m_name` varchar(255) DEFAULT NULL,";
      $sql .= "`sm_name` varchar(255) DEFAULT NULL,";
      $sql .= "`hours` int(11) DEFAULT NULL,";
      $sql .= "`satrt_date` date DEFAULT NULL,";
      $sql .= "`end_date` date DEFAULT NULL";
      $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $create_course_tabel_id_sqlresult = mysqli_query($connection, $sql) or die("CREATE Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
      if (!$create_course_tabel_id_sqlresult) {
        die("CREATE TABLE `$course_table_id` . . ., failed: " . mysqli_error($connection));
      }

      $sql = "INSERT INTO `$course_table_id`(`m_id`, `sm_id`, `m_name`, `sm_name`, `hours`) SELECT `m_id`, `sm_id`, `m_name`, `sm_name`, `hours` FROM `$courses_thought[$i]`";
      $insert_course_tabel_id_sqlresult = mysqli_query($connection, $sql) or die("INSERT Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
      if (!$insert_course_tabel_id_sqlresult) {
        die("INSERT INTO `$course_table_id` . . ., failed: " . mysqli_error($connection));
      }
    }
  }
} else {
  //default message
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
    <link href="http://fonts.googleapis.com/css?family=Lato:300|Grand+Hotel" rel="stylesheet" type="text/css" />
    <!-- Flat-UI for Bootstrap -->
    <link href="Flat-UI-master/dist/css/flat-ui.min.css" rel="stylesheet">
    <!-- Remodal -->
    <link rel="stylesheet" href="Remodal-0.6.3/dist/jquery.remodal.css">
    <!-- Custom CSS-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand brand" href="#">Conspectus</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><?php echo $_SESSION['full_name'] ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#1">New Syllabus</a></li>
                <li class="divider"></li>
                <li><a href="#">Edit Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    <!-- Modal -->
    <div class="remodal" data-remodal-id="1">
      <form action="index.php" method="POST" class="selectcourses">
        <?php
        //display a list of available courses in databse
        while ($temp = mysqli_fetch_assoc($courses_sqlresult)){


          echo "<label class=\"checkbox\" for=\"" .$temp['course_id']. "\">";
          echo "<input type=\"checkbox\" name=\"courses_checked[]\"value=\"" .$temp['course_id']. "\" id=\"" .$temp['course_id']. "\" data-toggle=\"checkbox\" class=\"custom-checkbox\"><span class=\"icons\"><span class=\"icon-unchecked\"></span><span class=\"icon-checked\"></span></span>";
          echo $temp['course_name'] ." - ". $temp['course_id'];
          echo "</label>";

          $year = date("Y");
          $check_course_table_id = "00" . $_SESSION['username'] ."_". $year ."_". $temp['course_id'];

          $sql = "SELECT `course_table_id` FROM `dashboard` WHERE course_table_id=\"$check_course_table_id\";";
          $result = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

          if(mysqli_num_rows($result)!=0){
            echo "<script>";
            echo "document.getElementById(\"" . $temp['course_id'] . "\").disabled = true;";
            echo "</script>";
          }
        }
        ?>
        <button id="add" class="btn btn-lg btn-primary btn-info btn-block" disabled="disabled" type="submit" name="submit">ADD</button>
      </form>
    </div>
    <!-- /.remodal -->


    <div class="container-fluid">
      <div class="row">
      <!-- Side Nav Bar -->
      <nav class="col-xs-3 bs-docs-sidebar hidden-xs">
        <ul id="sidebar" class="nav nav-stacked">
          <?php
          //show years thought in under side nav
          $sql = "SELECT DISTINCT  year FROM `dashboard` WHERE Username='{$_SESSION['username']}' ORDER BY year DESC;";
          $navgroupa_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

          if (!$navgroupa_sqlresult) {
            die("Database Connection Error: " . mysqli_error($connection));
          }
          while ($year_row = mysqli_fetch_assoc($navgroupa_sqlresult)){
            foreach($year_row as $navyear_field) {
              echo "<li>";
              echo "<a href=\"#" .$navyear_field. "\">" . $navyear_field . "</a>";
              echo "<ul class=\"nav nav-stacked\">";

              //show course id(s) thought under each year
              $sql = "SELECT `course_thought` FROM `dashboard` WHERE `Username`='{$_SESSION['username']}' AND `year`=$navyear_field ORDER BY course_thought DESC;";
              $navgroupb_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

              if (!$navgroupb_sqlresult) {
                die("Database Connection Error: " . mysqli_error($connection));
              }
              while ($course_thought_row = mysqli_fetch_assoc($navgroupb_sqlresult)){
                foreach($course_thought_row as $navcourse_thought_field) {
                  echo "<li><a href=\"#" .$navyear_field.$navcourse_thought_field. "\">" . $navcourse_thought_field . "</a></li>";
                }
              }
              echo "</ul>";
              echo "</li>";
            }
          }
          ?>
          <!-- dummy sidenav list item for better scrolling -->
          <li class="dummy">
            <a href="#dummy">.</a>
            <ul class="nav nav-stacked">
              <li><a href="#dummy_1">dummy_1</a></li>
              <li><a href="#dummy_2">dummy_2</a></li>
              <li><a href="#dummy_3">dummy_3</a></li>
            </ul>
          </li>

        </ul>
      </nav>

      <!--Main Content -->
      <div class="col-xs-9">
        <?php
        $sql = "SELECT DISTINCT  year FROM `dashboard` WHERE Username='{$_SESSION['username']}' ORDER BY year DESC;";
        $sectiongroupa_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

        if (!$sectiongroupa_sqlresult) {
          die("Database Connection Error: " . mysqli_error($connection));
        }
        while ($year_row = mysqli_fetch_assoc($sectiongroupa_sqlresult)){
          foreach($year_row as $sectionyear_field) {
            echo "<div id=\"" .$sectionyear_field. "\" class=\"group panel panel-default\">";
            echo "<div class=\"panel-body\">";
            echo "<h3><i class=\"glyphicon glyphicon-time\"></i>" .$sectionyear_field. "</h3>";

            $sql = "SELECT `course_thought` FROM `dashboard` WHERE `Username`='{$_SESSION['username']}' AND `year`=$sectionyear_field ORDER BY course_thought DESC;";
            $sectiongroupb_sqlresult = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");

            if (!$sectiongroupb_sqlresult) {
              die("Database Connection Error: " . mysqli_error($connection));
            }
            while ($course_thought_row = mysqli_fetch_assoc($sectiongroupb_sqlresult)){
              foreach($course_thought_row as $sectioncourse_thought_field) {
                $buttoncourse_table_id = "00" . $_SESSION['username']. "_" .$sectionyear_field ."_". $sectioncourse_thought_field;
                echo "<div id=\"" .$sectionyear_field.$sectioncourse_thought_field. "\" class=\"subgroup panel panel-default\">";
                echo "<div class=\"panel-body\">";
                echo "<h4><i class=\"glyphicon glyphicon-book\"></i>" .$sectioncourse_thought_field. "</h4>";

                echo "<div class=\"row demo-row\">";
                echo "<form action=\"syllabus.php\" method=\"POST\" target=\"_blank\">";

                echo "<div class=\"col-lg-3\">";

                echo "<button target=_blank type=\"submit\" name=\"plan\" value=\"" .$buttoncourse_table_id. "\" class=\"btn btn-block btn-lg btn-info\">Set Plan</button>";
                echo "</div>";
                echo "<div class=\"col-lg-3\">";
                echo "<button class=\"btn btn-block btn-lg btn-success\">Summary</button>";
                echo "</div>";
                echo "<div class=\"col-lg-3\">";
                echo "<button class=\"btn btn-block btn-lg btn-default disabled\">Disabled Button</button>";
                echo "</div>";
                echo "<div class=\"col-lg-3\">";
                echo "<button class=\"btn btn-block btn-lg btn-default disabled\">Disabled Button</button>";
                echo "</div>";

                echo "</form>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
              }
            }
            echo "</div>";
            echo "</div>";
          }
        }
        ?>
        <!-- dummy contect for better scrolling -->
        <section id="dummy" class="group dummy">
          <h3>dummy</h3>
          <div id="dummy_1" class="subgroup panel panel-default">
            <h4>dummy_1</h4>
          </div>
          <div id="dummy_2" class="subgroup panel panel-default">
            <h4>dummy_2</h4>
          </div>
          <div id="dummy_3" class="subgroup panel panel-default">
            <h4>dummy_3</h4>
          </div>
        </section>
      </div>

    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Twitter Bootstrap Core JS -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <!-- Flat-UI for Bootstrap -->
    <script src="Flat-UI-master/dist/js/flat-ui.min.js"></script>

    <script>
      $('.collapse').collapse();
      $('.dropdown-toggle').dropdown();
      $('body').scrollspy({
        target: '.bs-docs-sidebar',
        offset: 40
      });
      $("#sidebar").affix({
        offset: {
          top: 60
        }
      });
    </script>
    <script src="Remodal-0.6.3/dist/jquery.remodal.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      //<![CDATA[
      $(document).on("open", ".remodal", function() {
        console.log("open");
      });
      $(document).on("opened", ".remodal", function() {
        console.log("opened");
      });
      $(document).on("close", ".remodal", function(e) {
        console.log('close' + (e.reason ? ", reason: " + e.reason : ''));
      });
      $(document).on("closed", ".remodal", function(e) {
        console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
      });
      $(document).on("confirm", ".remodal", function() {
        console.log("confirm");
      });
      $(document).on("cancel", ".remodal", function() {
        console.log("cancel");
      });
      //    You can open or close it like this:
      //    $(function () {
      //        var inst = $.remodal.lookup[$("[data-remodal-id=modal]"").data("remodal")];
      //        inst.open();
      //        inst.close();
      //    });
      //  Or init in this way:
      var inst = $("[data-remodal-id=modal2]").remodal();
      //  inst.open();
      //]]>
    </script>
    <script>
      $(':checkbox').click(function() {
        $("#add").attr('disabled',! this.checked)
      });
    </script>
  </body>
</html>
<?php
  mysqli_close($connection);
?>
