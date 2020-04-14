<?php require_once('includes/config.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/header.php");?>
    
    
</head>
<body>
<div>
<?php 
session_start();

    if(isset($_POST['submit'])){
        $firstname          =   $_POST['firstname'];
        $lastname           =   $_POST['lastname'];
        $email              =   $_POST['email'];
        $password           =   $_POST['password'];
        $passwordRepeat     =   $_POST['passwordRepeat'];

//checking thhe passwords matchj 
       if ($password !== $passwordRepeat) {
                echo "Passwords do not match";
            }

//checking the email doesnt already exists in the database 
            $check=mysqli_query($db,"SELECT * FROM  users WHERE email='$email' ");
            $checkrows=mysqli_num_rows($check);
        
           if($checkrows>0) {
              echo "Email has already been taken, please try again ";
           } else {  
//hashing the passwords
               $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//inputting ther values into the database. 
            $sql = "INSERT INTO users (firstname, lastname, email, password, userType) 
                    VALUES ('$firstname','$lastname','$email','$hashedPwd','1')";
            $result = mysqli_query($db, $sql);
            echo 'Succsessfull';
           
            }
        }
?>


</div>

<div class="container" id="main-content">
	<h2>Please Register</h2>
    </div>

	<form class="form-signup" action="register.php" method="POST" required>
        <input type="text" name="firstname" placeholder="Firstname" required>
		<input type="text" name="lastname" placeholder="Lastname" required>
        <input type="email" name="email" placeholder="email" >
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="passwordRepeat" placeholder="Repeat Password" required>

        <input type="submit" name="submit" value="Submit">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>

<?php include("includes/footer.php");?>
</body>
</html>