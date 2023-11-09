<?php
    session_start();
    $name=$_SESSION['name'];
    //echo $name;
    $email=$_SESSION['email'];
    $userID=$_SESSION['userID'];
    //echo $email;
    $address= $_SESSION['address'];
    $city= $_SESSION['city'];
    $pass=$_SESSION['password'];
    if($email=="" && $pass==""){
        header('Refresh: 0.5; URL = login.html');
    }
    require "display.php";

	// Get all the submitted data from the form
	$sql = "SELECT image_file FROM users  WHERE userID='$userID'";

	// Execute query
	$picture=mysqli_query($link, $sql);
  $data=mysqli_fetch_array($picture);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>[Template] Sample Inner Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php include "header.php"; ?> 

  <main id="main">
    <section class="sample-page">
      <div class="container" data-aos="fade-up">
      <div class="container" >
      <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5" >
             <?php if(!empty($data['image_file'])){
              //echo $data['image_file'];?>
              <img class="rounded-circle mt-5" width="150px" height="150px"
              src="./image/<?php echo $data['image_file']; ?>">
           <?php  }
           elseif (empty($data['image_file'])){  ?>
              <img class="rounded-circle mt-5" width="150px" height="150px"
               src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png">
           <?php }; ?>
           <span class="font-weight-bold"><?php echo $name;?></span><span class="text-black-50"></span><span> </span></div>
            <form method="POST" action="addimage.php" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" >
            </div>
            <div class="form-group">
            <div class="d-flex flex-column align-items-center  p-3 py-3">
                 <button class="btn btn-danger" type="submit" name="upload">UPLOAD</button>
            </div>  
            </div>
        </form>
        <div class="d-flex flex-column align-items-center  p-3 py-3">
        <button class="btn btn-danger" type="submit" name="delete" onclick="deleteImage()">Delete Photo</button>
          </div>
        </div>
          
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <!--Profile Settings Form-->
                <form class="account" action="update.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder=" name" name="name" id="name" value="<?php echo $name;?>"></div>
                   
                </div>
                <div class="row mt-3">
                    
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" name="address" id="address" value="<?php echo $address;?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" id="email" name="email" value="<?php echo $email;?>"></div>
                    <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" placeholder="enter city name" id="city" name="city" value="<?php echo $city;?>"></div>
                    
                </div>
                <div class="mt-5 text-center"><input class="btn btn-danger" type="submit" value="Save Profile" name="edit"></div>
                </form>
                <!--Password Update form-->
                
                <div class="row mt-3">
                <div class="col-md-12">
                <form action="updatepass.php" method="post">
                    <label class="labels">Current Password</label><input type="password" class="form-control"  id="password" name="password" value=""></div>
                    <div class="col-md-12"><label class="labels">New Password</label><input type="password" class="form-control" id="new-pass" name="new-pass" value=""></div>
                    <div class="col-md-12"><label class="labels">Retype New Password</label><input type="password" class="form-control" id="c-new-pass" name="c-new-pass" value=""></div>
                    <div class="d-flex justify-content-evenly">
                    <div class="mt-5 text-left"><input class="btn btn-danger" type="submit" value="Update Password" name="edit"></div>
                </form>
                    <div class="mt-5 text-right"><a href="delete.php" class="btn btn-danger" role="button" >Delete Profile</a></div>
                </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
      </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php include "footer.php"; ?>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="script.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
