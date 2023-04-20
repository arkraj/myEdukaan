<?php

include('../shared/connection.php');


$uname=$_POST['name'];
$upass=$_POST['upass'];
$upass2 = $_POST['upass2'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
//hashing the password in the form of encryption


$hash=md5($upass);



$status = mysqli_query($conn, "INSERT INTO vendor_user(username,email,phone,password,address, city, state, zip) VALUES('$uname',  '$email',  '$phone','$hash','$address', '$city', '$state', '$zip')");
if($status){
echo "Registration sucessfull";
   header("location:vendor_login.html");
}
else{
    echo "Error in SQL";
    echo mysqli_error($conn);

}

?>
