<?php
$conn= new mysqli("localhost","ark","abc123","ecommerce");
if($conn->connect_error)
{
    echo " Error in connecting database";
    die;
}
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: client_login.html");
    exit();
  }
//
$email = $_SESSION['email'];
$sql = "SELECT first_name FROM users WHERE email = '$email'";
$result = $conn->query($sql);
//
$userid=$_SESSION['userdata']['id'];
$conn= new mysqli("localhost","ark","abc123","ecommerce");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
  } else {
    $first_name = "Unknown";
  }
//join table
$query="SELECT * FROM product JOIN cart ON product.pid=cart.pid WHERE cart.id=$userid ";
$sql_cursor=mysqli_query($conn,$query);

//for viewing product
?>
<!DOCTYPE html>
<html>
  
  <head>
    <title><?php echo $first_name; ?> 's Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
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
    <!-- Navigation bar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-info">
    <a class="navbar-brand" href="#">E-Dukaan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active ">
          <a class="nav-link" href="after_login.php"> Home</a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="../shared/contact_us.html">Contact Us</a>
        </li>
      </ul>
     
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active ">
          <a class="nav-link" href="#"><i class="fa-solid fa-user"></i><?php echo  $first_name; ?> </a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="../admin/main.php">Logout <i class="fa-solid fa-right-from-bracket"></i> </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Jumbotron -->
<div class="jumbotron text-center bg-emphasis" >
    <h1 class="text-primary"><?php echo  $first_name; ?>'s Cart</h1>
    <p>Shop with us for the best deals on your favorite products!</p>
    
</div>
      <!-- Page content -->
     <h2 class="text-center text-info bg-light">Items in cart:</h2>
   <!-- check -->
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
                        <a href="remove_cart.php?cartid=<?php echo $row1['cartid']; ?>" class="btn btn-danger" role="button">Remove from Cart <i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<div>
<div class="text-center ">
  <a href="checkout.php" class="btn btn-success" role="button">Proceed to Checkout <i class="fa-solid fa-indian-rupee-sign"></i></a>
</div>
</div>
   <br>
   <!-- Bootstrap JS -->
<footer class="bg-dark text-light">
<div class="row pt-3">
        <div class="col-md-12 text-center">
          <p>&copy; 2023 E-dukaan. All rights reserved. </p>
          <p> Website Designed by Ark Raj. Linkedin Profile: <a href="https://www.linkedin.com/in/ark-raj-84a1481b1/" ><i class="fa-brands fa-linkedin"></i></a></p>
        </div>
      </div>
    </footer>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
