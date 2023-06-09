<?php
	include'inc/config.php'; 
	if (isset($_POST['status'])){
		$appid = $_POST['appid'];
		
		
		if ($_POST['status'] == 'Approved'){
			
			$sql = "UPDATE  organ SET status= '1' WHERE id = '$appid'";

		}else{
			
			$sql = "UPDATE organ SET status='2' WHERE id = '$appid'";

		

		}
		
		$run = mysqli_query($con,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Application Updated');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>