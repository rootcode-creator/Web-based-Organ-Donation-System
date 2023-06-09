<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone']) && isset($_POST['individualprice']) && isset($_POST['totalprice']) ) {

	$orderId = $_POST['orderId'];

	if ($_POST['sendprice'] == 'SEND PRICE') {
		$individualprice = $_POST['individualprice'];
		$totalprice = $_POST['totalprice'];
		
		

        
		$sql = "UPDATE ordermedicine SET individualPrice = '$individualprice', totalPrice = '$totalprice',orderstatus = '1',userResponse = 0  where orderId = '$orderId' ";

		
		$run = mysqli_query($con, $sql) ;
		
	
		if ($run == true ) {
	
			echo "<script> 
						alert('Price Updated');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Update Order');
				</script>";
		}
	}elseif ($_POST['sendprice'] == 'SEND COMMENT') {
		
		$pharmacistcomment = $_POST['pharmacistcomment'];

		$sql = "UPDATE ordermedicine SET pharmacistcomment = '$pharmacistcomment', commentexist = 1 where orderId = '$orderId' ";
		$run = mysqli_query($con, $sql) ;

		if ($run == true ) {
	
			echo "<script> 
						alert('Comment Send to User');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Send Comment ');
				</script>";
		}
	}



} else {
	header('location:pharmacistsignin');
}

?>
