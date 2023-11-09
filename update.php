<?php
session_start();
$email=$_POST['email'];
$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
require "display.php";
$sql = "SELECT * FROM users WHERE email='$email'";  
$result = mysqli_query($link, $sql); 
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row['userID']=$_SESSION['userID'];
echo $_SESSION['userID'];
echo $_SESSION['email'];
echo $_SESSION['address'];
 $id=$_SESSION['userID'];
    if($row)
    {
   
       $update = "UPDATE users SET name='$name',email='$email',address='$address',city='$city' WHERE userID='$id'";
       $sql2=mysqli_query($link,$update);
if($sql2)
       { 
           /*Successful*/
           echo "Done";
           $sql="SELECT * FROM users WHERE userID='$id'";
           $res = mysqli_query($link, $sql);  
           $row = mysqli_fetch_array($res, MYSQLI_ASSOC); 
           $_SESSION['email']=$row['email'];
           $_SESSION['name']=$row['name'];
           $_SESSION['address']=$row['address'];
           $_SESSION['city']=$row['city'];
           echo "New". $_SESSION['name'];
           header('location:account.php');
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
