<?php
$conn = new mysqli("localhost","ark","abc123","ecommerce");
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

$email = $_SESSION['email'];
$sql = "SELECT first_name FROM users WHERE email = '$email'";
$result = $conn->query($sql);

$userid = $_SESSION['userdata']['id'];

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
} else {
    $first_name = "Unknown";
}

// Get the cart items
$query = "SELECT * FROM product JOIN cart ON product.pid=cart.pid WHERE cart.id=$userid ";
$sql_cursor = mysqli_query($conn,$query);

// Calculate the total amount of the cart items
$total_amount = 0;
while ($row1 = $sql_cursor->fetch_assoc()) {
    $total_amount += $row1['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
    <!-- Bootstrap CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
    <style>
		.container {
			margin-top: 50px;
			
			padding: 50px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		h1 {
			text-align: center;
			margin-bottom: 50px;
		}

		.btn-checkout {
			background-color: #f39c12;
			border-color: #f39c12;
			color: #fff;
			font-size: 20px;
			font-weight: bold;
			padding: 10px 30px;
			margin-top: 30px;
			border-radius: 5px;
			box-shadow: none;
			transition: all 0.3s ease-in-out;
		}

		.btn-checkout:hover {
			background-color: #e67e22;
			border-color: #e67e22;
		}

        .price-breakup {
            margin-top: 30px;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: left;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .price-breakup h3 {
            margin-top: 0;
        }

        .cancel-order {
            background-color: #c0392b;
            border-color: #c0392b;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding: 10px 30px;
            margin-top: 30px;
            border-radius: 5px;
            box-shadow: none;
            transition: all 0.3s ease-in-out;
        }

        .cancel-order:hover {
            background-color: #a93226;
            border-color: #a93226;
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
        <li class="nav-item active ">
          <a class="nav-link" href="view_cart.php"> <i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
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

    <!-- Page content -->
    <h1>Thanks for shoping with us, Checkout :</h1>
    <div class="container text-center bg-warning">
        <h2>Cart Total: &#8377; <?php echo $total_amount; ?></h2>
        <p>Proceed to payment to complete your purchase.</p>
        <a href="#" class="btn btn-primary">Pay Now</a>
        <a href="view_cart.php" class="btn btn-danger">Cancel Order</a>
    </div>
    </div>
    </div>
    <!-- footer -->

</body>


</html>
<?php $conn->close(); ?>