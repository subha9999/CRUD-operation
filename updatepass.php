<?php
  session_start();
  $oldpass=$_POST['password'];
  $newpass=$_POST['new-pass'];
  $confirmnewpass=$_POST['c-new-pass'];
  $email=$_SESSION['email'];
  $userID=$_SESSION['userID'];
  $password=$_SESSION['password'];
  require "display.php";
  $valid=true;
  $sql="SELECT password FROM users WHERE email='$email'";
  $result = mysqli_query($link, $sql); 
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if(!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) ||  strlen($password) < 8) {
    $valid=false;
}
  if($row){
    if($oldpass==$password )
    {
        if(!empty($newpass)){
        if($newpass==$confirmnewpass){
            
            $sql2="UPDATE users SET password='$newpass' WHERE userID='$userID'";
            $result2=mysqli_query($link,$sql2);
            if($sql2){
                if($valid==true)
                {echo '<script>alert("Password changed successfully")</script>';
                session_reset();
                header('location:account.php');
                }
                else{
                    echo "Your password should have atleast one capital letter,
                    1 number and the length must be 8 characters long.";
                }
            }
            else{
                echo '<script>alert("Password did not change")</script>';
            }
        }
        else{
            echo '<script>alert("The new password fields do not match")</script>';
            header('Refresh:0.4 ; URL = account.php');
        }
    }
    }
    else{
        echo '<script>alert("Your old password is wrong")</script>';
        header('Refresh:0.4 ; URL = account.php');
    }
    

  }
?>