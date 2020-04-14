<?php session_start(); ?>
<?php require 'includes/config.php'?>
<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container" id="main-content">
	<h2>Requests
</h2>
<?php
	$sql = "SELECT * FROM requests r, items i WHERE r.id = i.id  ";
	$ava = $db->query($sql);
	if( isset($_SESSION['userType']) && $_SESSION['userType'] == '0' ) { 
		$personId = $_SESSION['personId'];
		
	


//dsiplay all irems for admin 
while($requests = mysqli_fetch_assoc($ava)): ?>
   <form action="Requests.php" method="post">
	   <h4> <?= $requests['title']; ?> </h4>
	   <img src="<?= $requests['image']; ?>" style="width:400px;height:300px;"/>
	   <div></div>
	   <a>Category : </a> <p>  <?= $requests['category']; ?> </p>
	   <a>Date Found : </a> <p>  <?= $requests['foundDate']; ?> </p>  
	   <a>Description : </a> <p> <?= $requests['description']; ?> </p>
	   <a>location Found : </a> <p> <?= $requests['location']; ?> </p>
	   <a>Who Found it : </a> <p> <?= $requests['foundBy']; ?> </p>
	   <a>Status: </a> <p> <?= $requests['status']; ?> </p>
	   <?php echo"<input class='input' type='hidden' name='itemId' value='{$requests['id']}' />";?>
	   <a>Proof or Ownership </a> <p>  <?= $requests['proof']; ?> </p>  
	  <div></div>
	   <input type="submit" name="approve" value="Approve"></input>
	   <input type="submit" name="decline" value="Decline"></input>
   </form>
<?php endwhile; }



if( isset($_SESSION['userType']) && $_SESSION['userType'] == '1' ) { 
	$personId = $_SESSION['personId'];

	$sql = "SELECT DISTINCT * FROM requests, items WHERE requests.personId  = $personId 
													AND requests.id = items.id";
		$result = $db->query($sql);
		while($items = mysqli_fetch_assoc($result)): ?>
			<form action="index.php" method="post">
			<h4> <?= $items['title']; ?> </h4>
			<img src="<?= $items['image']; ?>" style="width:400px;height:300px;"/>
			<div></div>
			<a>status : </a> <p>  <?= $items['status']; ?> </p>
			
			</form>
	<?php endwhile;
} ?>



		
<?php 
//approve
if( isset($_POST['approve'])) { 
	$id = $_POST["itemId"];
	
	

	$sql = "UPDATE items, requests  SET items.claimed = 'Y', requests.status = 'Approved' WHERE items.id = $id AND requests.id = $id" ;
	if(mysqli_query($db, $sql)){
		echo "Records were updated successfully.";
	  } else {
		echo "ERROR:Not able to execute ".  mysqli_error($db) . $sql;
		exit();
	  }
}

// decline 
if( isset($_POST['decline'])) { 
	$id = $_POST["itemId"];	

	$sql = "UPDATE items, requests  SET items.claimed = 'N', requests.status = 'Rejected'   WHERE items.id = $id AND requests.id = $id" ;
	if(mysqli_query($db, $sql)){
		
	  } else {
		echo "ERROR:Not able to execute ".  mysqli_error($db) . $sql;
		exit();
	  }
}
?>
</div>
<?php include("includes/footer.php");?>

</body>
</html>