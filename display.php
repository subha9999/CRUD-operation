<?php
 $link = mysqli_connect("localhost", "root", "", "logininfo");
 if (!$link) { 
     die("Connection failed: " . mysqli_connect_error()); 
 }  

?>