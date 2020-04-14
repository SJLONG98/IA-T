<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <?php include("includes/header.php");
  ?>
  
</head>
<body>
  
<div>
    <h2>Please login</h2>
    <?php
          //if a user is logged in the logout button will display 
          if (isset($_SESSION['personId'])) {
            echo '<form action="includes/logout.inc.php" method="POST">
            <button type="submit" name="logout_submit">Logout</button>
            </form>';
          } else {
            //else the login form displays 
            echo ' <form class="form-login" action="includes/login.inc.php" method="POST">
                  <input type="text" name="email" placeholder="Email"required>  
                  <input type="password" name="password" placeholder="Password"required>
                  <input type="submit" value="Submit">
                  </form>';
                }
                ?>
            <p>Dont have an account? <a href="register.php">Register here</a>.</p>	
</div>
<?php include("includes/footer.php");?>
</body>
</html>