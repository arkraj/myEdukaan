<?php
session_start();
$_SESSION['login_status']=false;
$uname=$_POST['name'];
$upass=$_POST['upass'];
$phone = $_POST['phone'];
$hash=md5($upass);
  //establishing connection
  $conn= new mysqli("localhost","ark","abc123","ecommerce");
  if($conn->connect_error)
  {
      echo " Error in connecting database";
      die;
  }
  
$sql_cursor=mysqli_query($conn," SELECT * FROM vendor_user WHERE username='$uname' AND password='$hash' ");

if(mysqli_num_rows($sql_cursor)==0){
 
    echo "<h1>Invalid credentials</h1>";
    die;
}
$row=mysqli_fetch_assoc($sql_cursor);
session_start();
$_SESSION['userdata']=$row;
$_SESSION['login_status']=true;
$_SESSION['username']=$row['username'];
$_SESSION['id']=$row['id'];
header("location:upload.php");


?>
