<?php
session_start();
require_once('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/header.php");?>
</head>
<body>
	<?php

		if(isset($_POST['submit'])){
			$title 			=	$_POST['title'];
			$category 		=	$_POST['category'];
			$foundDate 		=	$_POST['foundDate'];
			$foundBy 		=	$_POST['foundBy'];
			$location 		=	$_POST['location'];
			$description 	=	$_POST['description'];
			//$photo 			= 	$_FILES['image'];
			
			$check=mysqli_query($db,"SELECT * FROM  items WHERE title='$title' ");
            $checkrows=mysqli_num_rows($check);
        
           if($checkrows>0) {
              echo "Title already exists, please enter a different Title";
           } else {
			
			$sql = "INSERT INTO items (title, category, foundDate, foundBy, location, description, claimed) 
                    VALUES ('$title','$category','$foundDate', '$foundBy','$location', '$description', 'N')";
            $result = mysqli_query($db, $sql);
			echo "Item added sucsessfully";
			die();
			}

	/*//file stuff 
	if (!empty($_FILES['photo']['name'])) {
		$dir = 'images/';
		$file = $dir . basename($_FILES['photo']['name']);
		
		$fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
		$sizeArray = getimagesize($_FILES['photo']['tmp_name']);
		
		if ($sizeArray == false) {
			echo "<br><font color='red'>No file has been uploaded.</font><br>";
			$flag = 0;
		}
		if (file_exists($file)) {
			echo "<br><font color='red'>The photo alrready exists.</font><br>";
			for ($i = 1; $i < 11; $i++) {
				$type = "." . $fileType;
				$temp_file = basename($file,$type);
				$temp_file2 = $temp_file . "_$i" . $type;
				if (!file_exists($dir . $temp_file2)) {
					echo "<font color='green'>However, " . $temp_file2 . " is available.</font><br>";
					break;
				}
			}
			$flag = 0;
		}
		if ($_FILES['photo']['size'] > 500000) {
			echo "<br><font color='red'>the Photo is too large please reduce to less than 500KB.</font><br>";
			$flag = 0;
		}
		if ($fileType != "jpg" &&
			$fileType != "jpeg" &&
			$fileType != "png" &&
			$fileType != "gif"
			) {
				echo "<br><font color='red'>Only JPG, JPEG, PNG & GIF formats are allowed.</font><br>";
				$flag = 0;
		}
	}
		
		
		}*/
		}
?> 

<div class="container" id="main-content">
	<h2>Admin
</h2>
<?php 
	if( isset($_SESSION['userType']) && $_SESSION['userType'] == '0' ) { 
	echo'
	<h3>Add New Lost Item</h3>
<form class="additem" action="admin.php" method="POST" required>
			<label for="title">Title </label>
		<div></div>
				<input type="text" name="title"  required>
			<div>
				<label for="category">Category </label>
		<div></div>
				<select id="category" name="category">
					<option value="electronics">Electronics</option>
					<option value="pets">Pets</option>
					<option value="jewellery">Jewellery</option>
				</select>
			</div>
				<label for="foundDate">Date found </label>
		<div></div>
				<input type="date" name="foundDate"  required>
		<div></div>
				<label for="foundBy">Found By </label>
		<div></div>
				<input type="text" name="foundBy"  required>
		<div></div>
				<label for="location">Location </label>
		<div></div>
				<input type="text" name="location"  required>

		<div></div>
				<label for="description">Description </label>
		<div></div>
				<input type="text" name="description"  required>
				<div></div>
				<label for="image">Select image:</label>
  					<input type="file" id="photo" name="photo" >
		<div></div>
				<input type="submit" name="submit" value="Submit">
				
	</form>';
	} else {
echo 'You do not have premission to view this page';
	}

	?>
</div>

<?php include("includes/footer.php");?>

</body>
</html>