<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // If the user is not logged in, redirect to the login page
  header("Location: client_login.html");
  exit();
}
include('../shared/connection.php');

$userid=$_SESSION['userdata']['id'];    
$pid=$_GET['pid'];
$status=mysqli_query($conn,"INSERT INTO cart(id,pid) VALUES($userid,$pid)");
if($status){
    echo "Successfuly added to cart";
    header("location:after_login.php");
}
?>
