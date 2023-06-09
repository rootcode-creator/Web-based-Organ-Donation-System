<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone_number']) && isset($_SESSION['blood']) && isset($_SESSION['gender'])) {

	if (isset($_POST['order'])) {
		$application_id = $_POST['applicationid'];
		$name = $_POST['patientname'];
		$phone = $_POST['patientphone'];
		$gender = $_POST['patientgender'];
		$blood = $_POST['patientbloodgroup'];
		$doctor = $_POST['doctor'];
		$prescription_written_date = $_POST['prescriptionwrittendate'];
		
		$prescription = $_POST['prescription'];

		$med1name = $_POST['med1name'];
		$med1quantity = $_POST['med1quantity'];

		$med2name = $_POST['med2name'];
		$med2quantity = $_POST['med2quantity'];

		$med3name = $_POST['med3name'];
		$med3quantity = $_POST['med3quantity'];

		$med4name = $_POST['med4name'];
		$med4quantity = $_POST['med4quantity'];

		$med5name = $_POST['med5name'];
		$med5quantity = $_POST['med5quantity'];

		$med6name = $_POST['med6name'];
		$med6quantity = $_POST['med6quantity'];

		
		$med7name = $_POST['med7name'];
		$med7quantity = $_POST['med7quantity'];

		$med8name = $_POST['med8name'];
		$med8quantity = $_POST['med8quantity'];

		$med9name = $_POST['med9name'];
		$med9quantity = $_POST['med9quantity'];

		$med10name = $_POST['med10name'];
		$med10quantity = $_POST['med10quantity'];

		$med11name = $_POST['med11name'];
		$med11quantity = $_POST['med11quantity'];
		
		$med12name = $_POST['med12name'];
		$med12quantity = $_POST['med12quantity'];
		
		


		
		$sql = "INSERT INTO ordermedicine(application_id,patientName,patientPhone,patientGender,patientBlood,doctor,prescription_written_date,prescription,
		med1name,med1quantity,med2name,med2quantity,med3name,med3quantity,med4name,med4quantity,med5name,med5quantity,
		med6name,med6quantity,med7name,med7quantity,med8name,med8quantity,med9name,med9quantity,med10name,med10quantity,med11name,med11quantity,med12name,med12quantity)
		VALUES('$application_id','$name','$phone','$gender','$blood','$doctor','$prescription_written_date','$prescription','$med1name','$med1quantity',
		'$med2name','$med2quantity','$med3name','$med3quantity','$med4name','$med4quantity','$med5name','$med5quantity','$med6name','$med6quantity',
		'$med7name','$med7quantity','$med8name','$med8quantity','$med9name','$med9quantity','$med10name','$med10quantity','$med11name','$med11quantity',
		'$med12name','$med12quantity')";
		
		$sql2 = "Update prescription SET ordered = 1 where id = '$application_id' ";

		$sql3 = "Update ordermedicine SET orderstatus = 0 where application_id = '$application_id' ";

		$run = mysqli_query($con, $sql);
		$run2 = mysqli_query($con, $sql2);
		$run3 = mysqli_query($con, $sql3);
	
		if ($run == true && $run2 == true && $run3 == true) {
	
			echo "<script> 
						alert('Order Successfully');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Order');
				</script>";
		}
	}



} else {
	header('location:signin.html');
}

?>
