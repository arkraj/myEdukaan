<?php

$host = 'localhost';
$username = 'ark';
$password = 'abc123';
$dbname = 'ecommerce';

//connect to the database 
$conn = mysqli_connect($host, $username, $password, $dbname);

if($conn->connect_error)
{
    echo " Error in connecting database";
    die;
}
?>
