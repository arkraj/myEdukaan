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
	<title>Vendor Upload Product</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
	
</head>
<body>

		<!--Navbar -->
		
	
	 
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
						<a class="nav-link" href="order.php">Orders</a>
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


		
		
		
		<!--body -->
	<section class="container my-4">
		<h1>Upload Product</h1>
		<form action ="upload_server.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="productName">Product Name</label>
				<input type="text" class="form-control" id="productName" placeholder="Enter product name" name="name" required>
			</div>
			<div class="form-group">
				<label for="productPrice">Price</label>
				<input type="number" class="form-control" id="productPrice" placeholder="Enter price" name="price" required>
			</div>
			<div class="form-group">
				<label for="productImage">Product Image</label>
				<input type="file" class="form-control-file" id="productImage" name="pdtimg" required>
			</div>
			<div class="form-group">
				<label for="productDescription">Description</label>
				<textarea class="form-control" id="productDescription" rows="3" name="details" required></textarea >
			</div>
			<button type="submit" class="btn btn-primary">Upload</button>
		</form>
	</section>
</body>
</html>
