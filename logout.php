<?php  
  session_start();
  session_unset();
  session_destroy();  
  header("Location: login.php");//use for the redirection to login page  
?> 