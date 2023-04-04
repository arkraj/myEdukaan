<?php
session_start();

//Check if user is logged in and has vendor access
if(!isset($_SESSION['login_status']) || $_SESSION['login_status'] != 'vendor')
{
    header("Location: vendor_login.html");
    die;
}

$conn = new mysqli("localhost", "ark", "abc123", "ecommerce");
$vendor=$_SESSION['userdata']['username'];
if($conn->connect_error)
{
    echo "Error in connecting database";
    die;
}

if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];

    // Get the product details from the database
    $query = "SELECT * FROM product WHERE pid = $pid";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
    }
    else
    {
        echo "Product not found";
        die;
    }
}

if(isset($_POST['submit']))
{
    $pname = $_POST['name'];
    $pprice = $_POST['price'];
    $pdetails = $_POST['details'];

    // Check if a new image was uploaded
    if($_FILES['pdtimg']['size'] > 0)
    {
        // Remove the old image file
        unlink($row['image']);   
        // Upload the new image file
        $target_dir = "../shared/images/";
        $target_file = $target_dir . basename($_FILES["pdtimg"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file_name = $prefix_path.$_SESSION['userdata']['username'].date("d-m-Y-H-i-s").$_FILES['pdtimg']['name'];
        $target_file = $target_dir . $new_file_name;
        if(move_uploaded_file($_FILES["pdtimg"]["tmp_name"], $target_file))
        {
            $pimage = $target_file;
        }
        else
        {
            echo "Error uploading image file";
            die;
        }
    }
    else
    {
        // Keep the old image file
        $pimage = $row['pdtimg'];
    }

    // Update the product details in the database
    $query = "UPDATE product SET name = '$pname', price = $pprice, impath = '$pimage', description = '$pdetails' WHERE pid = $pid";
    if($conn->query($query))
    {
        echo "Product updated successfully";
        header("Location: view_product.php");
        die;
    }
    else
    {
        echo "Error updating product";
        die;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vendor Edit Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d260e50942.js" crossorigin="anonymous"></script>
    <style>
        /* Custom styles here */
    </style>
</head>
<body>
<!--navbar-->
  
<!--check-->
 
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
					<li class="nav-item active">
						<a class="nav-link" href="order.php">Orders</a>
					</li>
					
      </ul>
      
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item active ">
          <a class="nav-link" href="../admin/main.php">Logout <i class="fa-solid fa-right-from-bracket"></i> </a>
        </li>
      </ul>
    </div>
  </nav>



<!--body-->

<main class="container mt-5  ">
    <h1 class="mb-4 text-center">Edit Product</h1>
    <form method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" min="0" step=".01" required>
        </div>
        <div class="form-group">
            <label for="pdtimg">Image:</label>
            <input type="file" class="form-control-file" id="pdtimg" name="pdtimg">
            <small class="form-text text-muted">Leave blank to keep the old image.</small>
        </div>
        <div class="form-group">
            <label for="details">Details:</label>
            <textarea class="form-control" id="details" name="details" rows="5"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
        <a href="view_product.php" class="btn btn-danger">Cancel</a>
    </form>
</main>
<footer>
    <!-- Footer content here -->
</footer>
</body>
</html>