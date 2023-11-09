<?php
session_start();

if(isset($_SESSION['userID']))
{
    $userID=$_SESSION['userID'];
    if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	require "display.php";

	// Get all the submitted data from the form
	$sql = "UPDATE users  SET image_file='$filename' WHERE userID='$userID'";

	// Execute query
	mysqli_query($link, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo " Image uploaded successfully! ";
		header("Location:account.php");
        //$filename=$_SESSION['image_file'];
        //echo $userID;
        
	} else {
		echo "<h3> Failed to upload image!</h3>";
		header("Location:account.php");
	}
}
} else {
    // Handle the case where the user is not logged in or the session is not set.
    echo "User is not logged in.";
    header("Location:login.html");
}
?>
