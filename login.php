<?php
    $email=$_POST['email'];
    $password=$_POST['password'];
    require "display.php";
      
        //to prevent from mysqli injection  
        //stripcslashes function removes slashes from the string,cleans up data while retrieving it from an html form or database
        //mysqli_real_escape_function helps in escaping special characters in a string in use for sql query 
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($link, $email);  
        $password = mysqli_real_escape_string($link, $password);  
        //mysqli_query function performs a query againsta the database
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";  
        $sql2="SELECT * FROM admin_user WHERE adminEmail='$email' AND password='$password'";
        //mysqli_fetch_array() function retrieves data from database and stores it in an array. it has two parameters
        //MYSQLI_ASSOC is an optional  parameter which is actually a constant that indicates what type of array should store the current row data
        $result = mysqli_query($link, $sql);  
        $result2= mysqli_query($link,$sql2);
        //fetches data from database and compares it with the data that has been input $row is an array and it can store different values at the same time
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
        if(!empty($row)){  
            echo $email;
            session_start();
            $sessionID=session_create_id();
            echo $sessionID;
            $_SESSION['userID']=$row['userID'];
            $_SESSION['name']=$row['name'];
            $_SESSION['email']=$row['email'];
            echo $_SESSION['email'];
            $_SESSION['address']=$row['address'];
            $_SESSION['city']=$row['city'];
            $_SESSION['password']=$row['password'];
            $_SESSION['image_file']=$row['image_file'];
            if ($_SESSION['email']=='' && $_SESSION['password']==''){
                echo 'uvtvyuhbuy';

            }
            else{
                header("Location: account.php"); 
            

            }
            
        }  
        elseif($row2)
        {
            echo $email;
            session_start();
            $sessionID=session_create_id();
            echo $sessionID;
            $_SESSION['userID']=$row2['adminID'];
            $_SESSION['name']=$row2['adminName'];
            $_SESSION['email']=$row2['adminEmail'];
            echo $_SESSION['email'];
            $_SESSION['password']=$row2['password'];
            if ($_SESSION['email']=='' && $_SESSION['password']==''){
                echo 'uvtvyuhbuy';

            }
            else{
                echo "Welcome admin user";
              header("Location: admin-dashboard.php"); 
            

            }

        }
        else{  
            echo '<script>alert( "Login failed.")</script>';
            header('Refresh: 1; URL = login.html');


        }     

    
    exit();
   
?> 
