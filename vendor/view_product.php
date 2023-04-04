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
  <title>View Products</title>
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
						<a class="nav-link" href="upload.php">Add Product</a>
            
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
   <!--body-->
   <span class="border ">
<div class="text-center ">
   <h2 >My Products :</h2>
</div>
</span>
   <div class="container">
    <div class="table-responsive">
      <table id="product-table" class="table table-striped table-bordered ">
        <thead>
          <tr class="table-primary">
            <th>Name</th>
            <th>Price &#8377;</th>
            <th>Description</th>
            <th>Image</th>
            <th>Edit</th>
           <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conn = new mysqli("localhost", "ark", "abc123", "ecommerce");
          if ($conn->connect_error) {
            echo "Error in connecting database";
            die;
          }
         
          $vendor = $_SESSION['userdata']['username'];
          $result = mysqli_query($conn, "SELECT * FROM product WHERE vendor='$vendor'");
          while ($row = mysqli_fetch_assoc($result)) {
            $pid=$row['pid'];
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>". $row['price'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td><img src='" . $row['impath'] . "' height='100px'></td>";
            echo "<td><a href='edit_product.php?pid=".$pid."' >Edit <i class='fa-solid fa-pen'></i></a></td>";
           echo "<td ><a href='delete_product.php?pid=".$pid."' class='text-danger'>Delete <i class='fa-solid fa-trash'></i></a></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
</body>
</html>