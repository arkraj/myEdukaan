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

$pid=$_GET['pid'];

include('../shared/connection.php');
$status=mysqli_query($conn,"DELETE FROM product WHERE pid='$pid'");
if($status){
    echo "Deleted successfully";
    header("location:view_product.php");
}
else{
    echo "Product not deleted";
    echo mysqli_error($conn);
}
?>
