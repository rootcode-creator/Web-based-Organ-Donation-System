<?php
	include'inc/config.php'; 
	
	
	if (isset($_POST['recomendation'])){
		$appid = $_POST['appid'];
		
		
		if ($_POST['recomendation'] == 'Approved'){
			
			$sql = "UPDATE  organ SET doctor_recommendation = '0' WHERE id = '$appid'";
			$sql2 = "UPDATE  organ SET recomendationWritten = '1' WHERE id = '$appid'";

		}else{
			
			$sql = "UPDATE organ SET doctor_recommendation ='1' WHERE id = '$appid'";
			$sql2 = "UPDATE  organ SET recomendationWritten = '1' WHERE id = '$appid'";

		

		}
		
		$run = mysqli_query($con,$sql);
		$run2 = mysqli_query($con,$sql2);
		if($run == true && $run2 == true ){
			
			echo "<script> 
					alert('Application Updated');
					window.open('doctorshomepage.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>