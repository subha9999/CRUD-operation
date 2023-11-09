<?php
    //header('Refresh:0.4 ; URL = addUser.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    require "display.php";
    $valid=true;
    if(!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) ||  strlen($password) < 8) {
        $valid=false;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $valid=false;
    }
    if(!preg_match("/[a-zA-Z]/",$name))
    {
        $valid=false;
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$address) &&  !preg_match('/[0-9]/', $address) ){
        $valid=false;
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$city) ||  preg_match('/[0-9]/', $city) ){
        $valid=false;
    }
    if(!empty($name) && !empty($email) && !empty($password) && !empty($address) && !empty($city) && $valid==true ){
    $sql = "INSERT INTO users (email,password,name,address,city) VALUES ('$email','$password','$name','$address','$city')";
    //mysqli_query performs the query against the database
    if(mysqli_query($link,$sql)){
        echo '<script>alert("RECORDS ADDED SUCCESSFULLY!!!");</script>';
        
        header('Refresh:0.2 , URL=admin.php');
    }
}
    else{
        echo "<h1> Failed to add a new user</h1>". mysqli_error($link);
    }
  
    mysqli_close($link);
    exit();
?> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
