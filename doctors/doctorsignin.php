<?php
include('inc/config.php');


$doctor_signin = $_POST['doctor_signin'];
$password = hash('sha256',$_POST['password']);


$s = "select * from doctors where reg_number = '$doctor_signin' && password = '$password'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);
$userdata = mysqli_fetch_assoc($result);
error_reporting(0);

if($num==1){
        session_start();
        $_SESSION['name'] = $userdata['name'];
        $_SESSION['phone'] = $userdata['phone'];
        echo "<script> alert('SignIn Successfully'); window.location.href='doctorshomepage.php'; </script>";
    
}else{
        
        echo "<script> alert('Registration number or password is incorrect!'); window.location.href='doctorsignin.html'; </script>";
   
}

?>