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

//redirect to dashboard if user is logged in
if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

//check if Login form is submitted
if (isset($_POST['submit'])) {
  //to prevent SQL INJECTION ATTACK
  $username = trim(mysqli_real_escape_string($connection,$_POST["username"]));
  $password = trim(mysqli_real_escape_string($connection,$_POST["password"]));



  //validate input login details from "accounts" TABLE
  $sql = "SELECT * FROM `accounts` WHERE `Username`='$username';";
  $result = mysqli_query($connection, $sql) or die("Database Connection Error: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
  if (!$result) {
    die("SELECT * FROM `accounts` . . . , failed: " . mysqli_error($connection));
  } else {
    //fetches one row and return it as an array,
    $row = mysqli_fetch_row($result);

    //user exists so compare supplied $password
    if($row){
      $existing_hash = "$row[1]";
      echo $row[1];
      echo "<br \>";
      echo $existing_hash;
      if (password_verify("$password", "$existing_hash")) {
        $_SESSION['username'] = $row[0];
        $_SESSION['full_name'] = $row[2];
        header('Location:index.php');
      } else {
        $message = "Wrong Username/Password, try again . . .";
      }
    } else {
      $message = "User does not exists.";
    }
  }
} else {
  //default username
  $username = "";
  //default message
  $message = "Login to <span class=\"brand\">Conspectus.</span>";
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
    <link href="https://fonts.googleapis.com/css?family=Lato:300|Grand+Hotel" rel="stylesheet" type="text/css" />
    <!-- Flat-UI for Bootstrap -->
    <link href="Flat-UI-master/dist/css/flat-ui.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login-register.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  </head>
  <body>
    <!-- Login Form -->
    <form action="login.php" method="POST">
      <img src="PNGs/Notebook.png" alt="" />
      <?php
        echo "<p id=\"messages\">".$message."</p>";
      ?>
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" value="" autofocus="" class="form-control" required="" placeholder="Username" aria-describedby="sizing-addon1" />
      </div>
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" name="password" value="" class="form-control" required="" placeholder="Password" aria-describedby="sizing-addon1" />
      </div>
<!--
      <label class="input-group checkbox" for="checkbox1">
        <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" class="custom-checkbox" />
        <span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>Remember me
      </label>
-->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
    </form>
    <div class="footer">
      <hr />
      <a class="input-group" href="register.php">Make an account</a>
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
