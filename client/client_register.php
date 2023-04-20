<?php

include('../shared/connection.php');


$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$upass = $_POST['upass'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
//hashing the password in the form of encryption


$hash=md5($upass);



$status = mysqli_query($conn, "INSERT INTO users(first_name,last_name,email,phone,password,address, city, state, zip) VALUES('$fname','$lname',  '$email',  '$phone','$hash','$address', '$city', '$state', '$zip')");
if($status){
echo "Registration sucessfull";
   header("location:client_login.html");
}
else{
    echo "Error in SQL";
    echo mysqli_error($conn);

}

?>
