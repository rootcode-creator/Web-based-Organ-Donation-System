<?php
; 
include 'inc/config.php';
$username = hash('sha256',$_POST['username']);
$password = hash('sha256',$_POST['password']);




$s = " select * from admins where username = '$username' && password = '$password'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
$userdata = mysqli_fetch_assoc($result);
error_reporting(0);
$_SESSION['name'] = $userdata['name'];

if($num==1){
    session_start();
    $_SESSION['name'] = $userdata['name'];
    echo "<script> alert('Welcome to the admin pannel '); window.open('dashboard.php','_self'); </script>";
    
}else{


    echo "<script> alert('Username or password is incorrect!'); window.location.href='adminsignin.html'; </script>";
    
   
}

?>