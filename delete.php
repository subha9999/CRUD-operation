<?php
    session_start();
    echo $_SESSION['userID'];
    require "display.php"; 
    $id=$_SESSION['userID'];
    $email=$_SESSION['email'];
    echo $id;
    echo $email;
        $delete = "DELETE FROM users  WHERE userID='$id' AND email='$email'";
        $result=mysqli_query($link,$delete);
        if($result){
            echo "Deleted";
            session_destroy();
            header('Refresh:0.4 ; URL = registration.html');
        }
        else
        {
            echo "Not deleted";
        }
    
?>