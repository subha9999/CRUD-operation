<?php
    session_start();
    $name=$_SESSION['name'];
    //echo $name;
    $email=$_SESSION['email'];
    //echo $email;
    if($email=="" && $pass==""){
        header('Refresh: 0.5; URL = login.html');
    }
  require "display.php"; 
$sql="SELECT * FROM users;";
$result=mysqli_query($link,$sql);

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Manage users</title>
  <meta content="" name="description">
  <meta content="" name="keywords">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
  <link href="styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <!-- ======= Header ======= -->
  <?php include "admin-header.php"; ?>
  <main id="main">
    <section class="sample-page">
      <div class="container" data-aos="fade-up">

      <div class="container">
        <div class="container rounded bg-danger mt-5 mb-5">
      <div class="row">
          
          <div class="col-md-13 border-right">
              <div class="p-3 py-5">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="text-right"><span class="material-symbols-outlined">
                        manage_accounts
                        </span>Manage Users</h4>
                        <div class="d-grid gap-3 d-md-flex">
                        <div class="dropdown">
    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
     Download
    </button>
    <ul class="dropdown-menu">
      
      <li> <a class="dropdown-item" href="csv.php" role="button">Download CSV file</a></li>
      <li><a class="dropdown-item" href="xlsx.php" role="button">Download XLS file</a></li>
    </ul>
  </div>
  
<div class="btn-group dropstart">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Add User
  </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
         
      <form  action="addUser.php" method="POST" class="px-3 py-3" style="width: 500px;">
      <div class="mb-3">
  <label for="inputName" class="form-label">Name</label>
  <input type="text" class="form-control" id="inputName"  name="name" required>
</div>
<div class="mb-3">
  <label for="inputEmail4" class="form-label">Email address</label>
  <input type="email" class="form-control" id="inputEmail4" aria-describedby="emailHelp"  name="email" required>
 
</div>
<div class="mb-3">
  <label for="inputPassword4" class="form-label">Password</label>
  <input type="password" class="form-control" id="inputPassword4"  name="password" required>
</div>
<div class="mb-3">
  <label for="inputAddress" class="form-label">Address</label>
  <input type="text" class="form-control" id="inputAddress"  name="address" required>
</div>
<div class="mb-3">
  <label for="inputCity" class="form-label">City</label>
  <input type="text" class="form-control" id="inputCity" name="city" required>
</div>

<div class="mb-3"></div><div class="col-12">   <input class="btn btn-danger" type="submit" value="Add"> </div>

</form>
</div>
 
</div>
                  </div>
                  </div>
                  <div class="table-responsive" >
                  
                  <table class="table table-bordered  border-dark table-dark table-striped" id="showData">
		<thead>
			<tr>
			<th >User Image</th>
				<th>User ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Actions</th>
				
			</tr>
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_assoc($result)){?>
			<tr>
			<td><img class="img-thumbnail" width="60px" height="70px"
              src="./image/<?php echo $row['image_file']; ?>"></td>
			<td><?php echo $row['userID']?></td>
			<td><?php echo $row['name']?></td>
			<td><?php echo $row['email']?></td>
			<td ><div class="d-grid gap-3 d-md-flex">
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                onclick="showUser(<?php echo $row['userID'];?>)">View</button>
                <button class="btn btn-danger" type="button" onclick="deleteUser(<?php echo $row['userID'];?>)">Delete</button>
            </div>
      </td>
				
			</tr>
			<?php } ?>
		</thead>
	  </table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" >
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div id="info"></div>
      </div>
      <div class="modal-footer">
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
<!--Manage users-->

      </div>
  </div>
</div> 
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
 

  <script src="script.js"></script>
  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('#showData').DataTable();
  });
  </script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" ></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
</body>

</html>
