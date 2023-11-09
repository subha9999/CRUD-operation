
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="table-responsive">
  <table class="table table-danger table-striped">
    <?php 
   require "display.php";
    $q = $_GET['q'];
    //echo $q;
    $sql = "SELECT * FROM users WHERE userID=$q" ;  
    $result = mysqli_query($link, $sql); 
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($row ){
     }?>
   
            <thead>
              <tr>
                <th scope="col" rowspan="3">User ID</th>
                <th scope="col" colspan="3">Image</th>
                <th scope="col" colspan="5">Name</th>
                <th scope="col" colspan="5">Email</th>
                <th scope="col" colspan="5">Address</th>
                <th scope="col" colspan="5">City</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row" rowspan="3"><?php echo $row['userID'];?></td>
                <?php if(!empty($row['image_file'])){?>
                    <td scope="col" colspan="3"><?php echo $row['image_file'];?></td>
                <?php } 
                else { ?>
                    <td scope="col" colspan="3">No file found</td>
                <?php } ?>
                <td scope="col" colspan="5"><?php echo $row['name'];?></td>
                <td scope="col"colspan="5"><?php echo $row['email'];?></td>
                <td scope="col" colspan="5"><?php echo $row['address'];?></td>
                <td scope="col" colspan="5"><?php echo $row['city'];?></td>
                </tr>

                
            </tbody>
            <?php 
                 mysqli_close($link);?>
          </table>
  </div>
          
</body>