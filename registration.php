<?php
    echo $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $valid=true;
    require "display.php"; 
    if(!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) ||  strlen($password) < 8) {
        $valid=false;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $valid=false;
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
    {
        $valid=false;
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$address) &&  !preg_match('/[0-9]/', $address) ){
        $valid=false;
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$city) ||  preg_match('/[0-9]/', $city) ){
        $valid=false;
    }
    if(!empty($name) && !empty($email) && !empty($password) && !empty($address) && !empty($city) && $valid==true){
    $sql = "INSERT INTO users (email,password,name,address,city) VALUES ('$email','$password','$name','$address','$city')";
    //mysqli_query performs the query against the database
    if(mysqli_query($link,$sql)){
        echo "RECORDS ADDED SUCCESSFULLY!!!";
        session_start();
        session_create_id();
        $sessionID=session_create_id();
            echo $sessionID;
            
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            echo $_SESSION['email'];
            $_SESSION['address']=$address;
            $_SESSION['city']=$city;
            $_SESSION['password']=$password;
            if ($_SESSION['email']=='' && $_SESSION['password']==''){
                echo 'uvtvyuhbuy';

            }
            else{
                header("Location: account.php"); 
                echo $_SESSION['name'];
            

            }
        //header("Location: account.php");
    }
}

    else{
        echo "<h1> Failed to create an account.</h1>". mysqli_error($link);
        header('Refresh:0.5,URL=registration.html');
    }

    mysqli_close($link);
    exit();
?> 