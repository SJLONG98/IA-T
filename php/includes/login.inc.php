<?php

session_start();

if (!empty($_POST) && !empty($_POST['email'])) {

  require 'config.php';

if($db === false){
    die("ERROR: Could not connect.". mysqli_connect_error());
  }

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $userType =  mysqli_real_escape_string($db, $_POST['userType']);

  //doesnt allow it to be emptyb
  if (empty($email) || empty($password)) {
    header("Location: ../login.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    //checks if the email doesnt exist
    if ($resultCheck < 1) {
      header("Location: ../login.php?login=error1");
      exit();
    } else {
      //inserts data innto an array calles row 
      if ($row = mysqli_fetch_assoc($result)) {
  //Dehash the password
        $hashedPwdCheck = password_verify($password, $row['password']);
        if($hashedPwdCheck == false){
          header("Location: ../index.php?password");
          exit();
        } elseif ($hashedPwdCheck == true) {

          //sets the sessions.  
          $_SESSION['personId'] =$row['personId'];
          $_SESSION['firstname'] =$row['firstname'];
          $_SESSION['lastname'] =$row['lastname'];
          $_SESSION['email'] =$row['email'];
          $_SESSION['userType'] =$row['userType'];
          if($_SESSION['userType'] == '1') {
            header("Location: ../index.php?login=success");
            exit();
          } elseif ($_SESSION['userType'] == '0') {
            header("Location: ../admin.php");
            exit();
          }
        }
      }
    }
  }
} else {
  header("Location: ../index.php?login=error");
  exit();
}



?>