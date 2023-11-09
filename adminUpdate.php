<?php
session_start();
$email=$_POST['email'];
$name=$_POST['name'];

require "display.php"; 
$sql = "SELECT * FROM admin_user WHERE adminEmail='$email'";  
$result = mysqli_query($link, $sql); 
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row['adminID']=$_SESSION['userID'];
echo $_SESSION['userID'];
echo $_SESSION['email'];
echo $_SESSION['address'];
 $id=$_SESSION['userID'];
    if($row)
    {
   
       $update = "UPDATE admin_user SET adminName='$name',adminEmail='$email' WHERE adminID='$id'";
       $sql2=mysqli_query($link,$update);
if($sql2)
       { 
           /*Successful*/
           echo "Done";
           $sql="SELECT * FROM admin_user WHERE adminID='$id'";
           $res = mysqli_query($link, $sql);  
           $row = mysqli_fetch_array($res, MYSQLI_ASSOC); 
           $_SESSION['email']=$row['adminEmail'];
           $_SESSION['name']=$row['adminName'];
          
           echo "New". $_SESSION['name'];
           header('location:adminProfile.php');
       }
       else
       {
           /*sorry your profile is not update*/
           echo "Failed";
           //header('location:account.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        echo "Failed";
    }
 

?>
