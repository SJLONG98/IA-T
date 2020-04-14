<?php session_start(); ?>
<?php require 'includes/config.php'?>
<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
<head>	
</head>
<body>
	<div class="container" id="main-content">
	<h2>Items </h2>	
	<?php
	$sql = "SELECT * FROM items WHERE claimed = 'N' ";
	$ava = $db->query($sql);
	if( isset($_SESSION['personId'])) {  
	$personId = $_SESSION['personId']; 
	
	?>
		<?php 
					 while($items = mysqli_fetch_assoc($ava)): ?>
						<form action="index.php" method="post">
							<h4> <?= $items['title']; ?> </h4>
							<img src="<?= $items['image']; ?>" style="width:400px;height:300px;"/>
							<div></div>
							<a>ID : </a> <p>  <?= $items['id']; ?> </p>
							<a>Category : </a> <p>  <?= $items['category']; ?> </p>
							<a>Date Found : </a> <p>  <?= $items['foundDate']; ?> </p>  
							<a>Description : </a> <p> <?= $items['description']; ?> </p>
							<a>location Found : </a> <p> <?= $items['location']; ?> </p>
							<a>Who Found it : </a> <p> <?= $items['foundBy']; ?> </p>
							<input name="id" hidden value=<?= $items['id']; ?> /> 
							<input name="personId" hidden value=<?= $personId; ?> />  
							<label>Please provide proof:</label>
							<div></div>
							<input type="text" name="proof"  required>
							<input type="submit" name="claim" value="Claim"></input>
						
						</form>
				<?php endwhile; 
		} else {
			echo 'Please Register/Login to view more information';
			while($items = mysqli_fetch_assoc($ava)): ?>
				<form action="myRequests.php" method="post">
					<h4> <?= $items['title']; ?> </h4>
					<div></div>
					<a>Category : </a> <p>  <?= $items['category']; ?> </p>
				</form>
		<?php endwhile; } ?>

		<?php



if(isset($_POST['claim'])) {
	$personId   =       $_POST['personId']; 
	$id         =       $_POST['id'];
	$proof 		= 		$_POST['proof'];

$sql = "INSERT INTO requests (personId, id, status, proof) 
            VALUES ('$personId','$id', 'Requested', '$proof')";
                $result = mysqli_query($db, $sql);
				die;

                if(mysqli_query($db, $sql)){
                    header("Location: index.php");
                   
                  } else {
                        //else error 
                      
                        echo "ERROR: Not able to execute $sql.  ";
                        exit();
                  }
            
                }?>
		





</div>
<?php include("includes/footer.php");?>
</body>
</html>