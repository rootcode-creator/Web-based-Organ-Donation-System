<?php

include 'inc/config.php';
if (isset($_POST['apply'])) {
	$name = $_POST['name'];
	$phone_number = $_POST['phone_number'];
	$gender = $_POST['gender'];
	$blood = $_POST['blood'];
	$application_date = $_POST['application_date'];
	$application_reason = $_POST['application_reason'];
	$status = $_POST['status'];

	$sql = "INSERT INTO organ(name,phone_number,gender,blood,application_date,application_reason,status)VALUES('$name','$phone_number','$gender','$blood','$application_date','$application_reason','$status')";

	$run = mysqli_query($con, $sql);

	if ($run == true) {

		echo "<script> 
					alert('Applied successfully, Please wait for approval status');
					window.location.href='dashboard.php';
				  </script>";
	} else {
		echo "<script> 
			alert('Failed To Apply');
			</script>";
	}
}

?>