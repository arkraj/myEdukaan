<?php
// Connect to database
$conn = new mysqli("localhost", "ark", "abc123", "ecommerce");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all products
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>View Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">My Website</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="active"><a href="#">View Products</a></li>
          <li><a href="#">View Cart</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>

    <!-- Page content -->
    <h1>Happy Shopping</h1>
    <div class="container text-center">
      <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="<?php echo $row['impath']; ?>" alt="<?php echo $row['name']; ?>">
              <div class="caption">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <p><strong>Price:</strong> <?php echo $row['price']; ?></p>
                <p>
                  <a href="#" class="btn btn-primary" role="button">Add to Cart</a>
                 
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
