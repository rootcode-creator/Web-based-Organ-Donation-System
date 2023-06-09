<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone']) && isset($_POST['delivered']) && isset($_POST['orderId']) ) {

	$orderId = $_POST['orderId'];

        
		$sql = "UPDATE ordermedicine SET deliveryStatus = 1 where orderId = '$orderId' ";

		
		$run = mysqli_query($con, $sql) ;
		
	
		if ($run == true ) {
	
			echo "<script> 
						alert('Delivery Status Updated');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Update Delivery Status');
				</script>";
		}
	



} else {
	header('location:pharmacistsignin');
}
