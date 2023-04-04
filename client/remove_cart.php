<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // If the user is not logged in, redirect to the login page
  header("Location: client_login.html");
  exit();
}
$conn= new mysqli("localhost","ark","abc123","ecommerce");
if($conn->connect_error)
{
    echo " Error in connecting database";
    die;
}
$userid=$_SESSION['userdata']['id'];    
$pid=$_GET['pid'];
$cartid=$_GET['cartid'];
$status=mysqli_query($conn,"DELETE FROM cart WHERE cartid=$cartid ");
if($status){
    echo "Successfuly removed from the cart";
    header("location:view_cart.php");
}
?>