<?php

session_start();

if(!isset($_SESSION['login_status']))
{
    echo "Unauthorised Attempt!";
    die;
}

if($_SESSION['login_status']==false)
{
    echo "Illegal Access";
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
	
</head>
<body>
  <!--nav-->

   
	<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="#">E-Dukaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto active">
      <li class="nav-item active">
						<a class="nav-link" href="view_product.php">My Products</a>
					</li>
		<li class="nav-item active">
						<a class="nav-link" href="upload.php">Add Product</a>
            
					</li>
					
					
      </ul>
      
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active ">
          <a class="nav-link" href="#"><i class="fa-solid fa-user"></i><?php echo $_SESSION['username']; ?> </a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="../admin/main.php">Logout <i class="fa-solid fa-right-from-bracket"></i> </a>
        </li>
      </ul>
    </div>
  </nav>

  <!--Body-->

          <?php
         include('../shared/connection.php');
         
          $vendor = $_SESSION['userdata']['username'];
          
         
          $query="SELECT * FROM product JOIN cart ON product.pid=cart.pid WHERE product.vendor='$vendor' ";
          $sql_cursor=mysqli_query($conn,$query);
          if (!$sql_cursor) {
            printf("Error: %s\n", mysqli_error($conn));
            
         }
          ?>
          <div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($row1 = $sql_cursor->fetch_assoc()): ?>
        
        <div class="col text-center">
            <div class="card mb-4 shadow-sm">
                <img src="<?php echo $row1['impath']; ?>" alt="<?php echo $row1['name']; ?>" class="card-img-top" style="width: 300px; height: 300px;" alt="could not load image">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold h3"><?php echo $row1['name']; ?></h5>
                    <p class="card-text"><?php echo $row1['description']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
            
                        <p class="text h4 font-weight-bolder text-primary">&#8377; <?php echo $row1['price']; ?></p>
                        <div class="btn-group">
                        <a href="#" class="btn btn-success" role="button">Deliver <i class="fa-solid fa-truck"></i></a>
                        </div>
                    </div>
                    <p class="card-text text-danger">In cart for User id:<?php echo $row1['id']; ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<div>
       
  </body>
</html>
