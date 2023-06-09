<?php

session_start();

$doctor_signin = $_POST['doctor_signin'];
$password = hash('sha256',$_POST['password']);

$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "user";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);


$s = " select * from doctors where reg_number = '$doctor_signin' && password = '$password'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);
$userdata = mysqli_fetch_assoc($result);
error_reporting(0);
$_SESSION['name'] = $userdata['name'];
$_SESSION['phone'] = $userdata['phone'];
if($num==1){
    
    echo "<script> alert('SignIn Successfully'); window.location.href='doctorshomepage.php'; </script>";
    
    
}else{
        
        echo "<script> alert('Registration number or password is incorrect!'); window.location.href='doctorsignin.html'; </script>";
   
}

?>