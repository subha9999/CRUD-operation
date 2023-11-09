<?php
   session_start();
   unset($_SESSION['email']);
   unset($_SESSION['password']);
   
   echo '<script>alert("You have cleaned session")</script>';
   header('Refresh: 0.2; URL = login.html');
?>