<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
  <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOUfXw704+h835Lr+6QL75aGXaLwM5SvWrTEwC4F0OdJh4M" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Shopping Cart</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h1 class="text-center my-5">Shopping Cart</h1>
    <form action="checkout.php" method="POST">
      <div class="form-group">
        <label for="product">Product:</label>
        <select class="form-control" id="product" name="product">
          <option value="product1">Product 1 - $19.99</option>
          <option value="product2">Product 2 - $29.99</option>
          <option value="product3">Product 3 - $39.99</option>
        </select>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="10" value="1">
      </div>
      <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
    <hr>
    <!-- Shopping Cart -->
    <div class="row">
      <div class="col-md-8">
        <h4 class="my-4">Shopping Cart</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <!-- Cart items will be dynamically added here -->
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <h4 class="my-4">Summary</h4>
        <table class="table">
          <tbody>
            <tr>
              <td>Subtotal</td>
              <td id="subtotal">$0.00</td>
            </tr>
            <tr>
              <td>Tax (5%)</td>
              <td id="tax">$0.00</td>
            </tr>
            <tr>
              <td>Total</td>
              <td id="total">$0.00</td>
            </tr>
          </tbody>
        </table>
        <a href="checkout.php" class="btn btn-success btn-block">Proceed to Checkout</a>
      </div>
    </div>
  </div>
</body>
</html>