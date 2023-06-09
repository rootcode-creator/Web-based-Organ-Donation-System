

<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone_number']) && isset($_SESSION['blood']) && isset($_SESSION['gender'])) {

	if (isset($_POST['usercomment']) && isset($_POST['orderId']) ) {
		$Order_id = $_POST['orderId'];
		
		
        $comment = $_POST['comment'];
        
         

        
            
            $sql = "UPDATE ordermedicine SET usercomment = '$comment' where orderId = '$Order_id' ";
            $run = mysqli_query($con, $sql);

			$sql2 = "UPDATE ordermedicine SET usercommentexist = 1 where orderId = '$Order_id' ";
            $run2 = mysqli_query($con, $sql2);

	
		if ($run == true && $run2 == true) {
	
			echo "<script> 
						alert('User Comment Send To Pharmacist');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Send Comment To Pharmacist');
				</script>";
		}
	}



} else {
	header('location:signin.html');
}

?>