<!-- connect to MySQL Database -->
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "project_se";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("database conncetion Failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
?>
<?php
if (isset($_POST['submit'])) {
  $username = trim(mysqli_real_escape_string($connection,$_POST["username"]));
  $password = trim(mysqli_real_escape_string($connection,$_POST["password"]));
  $full_name = trim(ucwords(mysqli_real_escape_string($connection,$_POST["full_name"])));

  $sql = "INSERT INTO accounts VALUES ('{$username}','{$password}','{$full_name}');";
  $result = mysqli_query($connection, $sql) or die("database conncetion failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");;

  if (!$result) {
    die("database conncetion Failed: " . mysqli_error($connection));
  } else {
    $message = "Registered as: " . $full_name . ", redirecting . . .";
    header("refresh:3;url=login.php");
  }
} else {
  $username = "";
  $message = "Make a <span class=\"brand\">Conspectus </span>Account.";
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
    <!-- Custom CSS-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login-register.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <form id="register-form" action="" method="post">
      <img src="PNGs/Notebook.png" alt="" />
      <?php
echo "<p id=\"messages\">".$message."</p>";
      ?>
      <div class="form-group input-group-lg">
        <input type="text" name="full_name" required="" pattern="^[A-Za-z. ]{3,36}" placeholder="Your full name" class="form-control">
      </div>
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" class="form-control" autocomplete="off" required="" pattern="^[a-z0-9.]{3,24}$" placeholder="enter desired Username" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="text" name="password" class="form-control" autocomplete="off" required="" pattern="^(?=^.{4,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="enter some Password" aria-describedby="sizing-addon1">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Make account</button>
    </form>
    <div class="footer">
      <hr />
      <a class="input-group" href="login.php">Already have an account?</a>
    </div>
    <!-- jQuery -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Twitter Bootstrap Core JS -->
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <!-- Flat-UI for Bootstrap -->
    <script src="Flat-UI-master/dist/js/flat-ui.min.js"></script>
  </body>
</html>
<!-- close database connection -->
<?php
mysqli_close($connection);
?>
