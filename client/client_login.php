<?php
session_start();
$_SESSION['login_status']=false;
$email=$_POST['email'];
$upass=$_POST['upass'];
$phone = $_POST['phone'];
$hash=md5($upass);
  //establishing connection
include('../shared/connection.php');
  
$sql_cursor=mysqli_query($conn," SELECT * FROM users WHERE email='$email' AND password='$hash' ");

if(mysqli_num_rows($sql_cursor)==0){
 
    echo "<h1>Invalid credentials</h1>";
    die;
}
$row=mysqli_fetch_assoc($sql_cursor);

$_SESSION['userdata']=$row;
$_SESSION['login_status']=true;
$_SESSION['email']=$row['email'];

header("location:after_login.php");


?>
