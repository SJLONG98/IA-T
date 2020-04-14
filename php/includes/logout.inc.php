<?php
//sessions are unset and destroyd when the user clicks the logout button 
if (isset($_POST['logout_submit'])) {
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
}
?>