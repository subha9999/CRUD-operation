<?php
session_start();
$id=$_SESSION['userID'];
require "display.php";
       
       
       $update = "UPDATE users SET image_file=NULL WHERE userID='$id'";
       $sql2=mysqli_query($link,$update);
if($sql2)
       { 
           /*Successful*/
           echo "Done";
           header("Location:account.php");
       }
else
       {
           /*sorry your profile is not update*/
           echo "Failed";
           //header('location:account.php');
       }


?>
