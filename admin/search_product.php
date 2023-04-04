<?php

$conn = new mysqli("localhost", "ark", "abc123", "ecommerce");
if ($conn->connect_error) {
    echo "Error in connecting database";
    die;
}

$search_query = $_POST['search_query'];


$sql = "SELECT * FROM product WHERE name LIKE '%$search_query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 ?>  
      <!DOCTYPE html>
<html>
<head>
    <title>E Dukaan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>

<!-- Display to login first on clicking add to cart-->
<script>
function displayAlert() {
  if (confirm("Please login first!", "Login")) {
    window.location.href = "../client/client_login.html";
  }
}
</script>

    <style>
        .col{
            transition: transform .2s; 
        }
    .col:hover {
        transform: scale(1.01);
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="#">E-Dukaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
          <a class="nav-link" href="main.php">Home</a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="../shared/about_us.html">About Us</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../shared/contact_us.html">Contact Us</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="post" action="search_product.php">
        <input class="form-control mr-sm-2 w-90" type="search" placeholder="Search products" aria-label="Search" name="search_query">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sign Up
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="vendor_register.html">Vendor</a>
            <a class="dropdown-item" href="../client/client_register.html">Client</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="vendor_login.html">Vendor</a>
            <a class="dropdown-item" href="../client/client_login.html">Client</a>
          </div>
        </li>
        
       
      </ul>
    </div>
  </nav>
  

  

<!-- Jumbotron -->
<div class="jumbotron text-center bg-emphasis" >
    <h1>Welcome E-dukaan Website</h1>
    <p>Shop with us for the best deals on your favorite products!</p>
    
    <a href="main.php" class="btn btn-primary">Shop Now</a>
</div>
<!-- product-->
<div class="container text-center">
    <h1> Searched Result :
</div>
<!-- check-->
<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($row1 = $result->fetch_assoc()): ?>
        <div class="col text-center">
            <div class="card mb-4 shadow-sm">
                <img src="<?php echo $row1['impath']; ?>" alt="<?php echo $row1['name']; ?>" class="card-img-top" alt="could not load image">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold h3""><?php echo $row1['name']; ?></h5>
                    <p class="card-text"><?php echo $row1['description']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                       
                        <p class="text h4 font-weight-bolder text-danger">&#8377; <?php echo $row1['price']; ?></p>
                        <div class="btn-group">
                            <a href="../client/client_login.html" class="btn btn-primary" role="button" onclick=displayAlert()>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>








<!-- footer-->
    <footer class="bg-dark text-light">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4">
          <h4>About Us</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada augue ac sollicitudin pretium.</p>
        </div>

        <div class="col-md-4">
          <h4>Contact Us</h4>
          <ul class="list-unstyled">
            <li>123 Main St</li>
            <li>New York, NY 10001</li>
            <li>Phone: (123) 456-7890</li>
            <li>Email: info@example.com</li>
          </ul>
        </div>
      </div>
      <div class="row pt-3">
        <div class="col-md-12 text-center">
          <p>&copy; 2023 Your Company Name. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>

        
    




<?php 
}
 else {
    echo "No products found.";
}

$conn->close();
?>
