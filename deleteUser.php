<?php
    require "display.php";
    $q = $_GET['q'];
    $sql = "SELECT * FROM users WHERE userID='$q'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $id=$row['userID'];
    $email=$row['email'];
    if($row){
        $delete = "DELETE FROM users  WHERE userID='$id'";
        $sql2=mysqli_query($link,$delete);
        if($sql2){
           echo '<script>alert("Deleted")</script>';
            
           header('Refresh:0.4 ; URL = admin.php');
        }
        else
        {
            echo "Not deleted";
        }
    }
?>