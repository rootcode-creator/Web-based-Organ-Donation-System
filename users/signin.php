<?php
include('inc/head.php');
session_start();
$phone_no = $_POST['phone'];
$password = hash('sha256',$_POST['password']);

$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);


$s = " select * from users where phone_number = '$phone_no' && password = '$password'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);
$userdata = mysqli_fetch_assoc($result);
error_reporting(0);

if($num==1){
    
        session_start();
        $_SESSION['name'] = $userdata['name'];
        $_SESSION['phone_number'] = $userdata['phone_number'];
        $_SESSION['gender'] = $userdata['gender'];
        $_SESSION['blood'] = $userdata['blood_group'];
        echo "<script> alert('SignIn Successfully'); window.open('dashboard.php','_self'); </script>";
    
    
}else{
    
        echo "<script> alert('Phone number or password is not correct!'); window.location.href='signin.html'; </script>";
   
}

?>