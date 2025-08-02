<?php
include('inc/config.php');

if (isset($_POST['addpharmacy'])) {
	if (isset($_POST['pharmaname']) && isset($_POST['pharmareg_number']) && isset($_POST['pharmaphone']) && isset($_POST['pharmaaddress'])) {

		$pharmaname = $_POST['pharmaname'];
		$pharmareg_number = $_POST['pharmareg_number'];
		$pharmaphone = $_POST['pharmaphone'];
		$pharmaaddress = $_POST['pharmaaddress'];


		
		if ($con->connect_error) {
			die('Could not connect to the database.');
		} else {
			$User_data = "SELECT registrationNumber FROM pharmacy WHERE registrationNumber = ? LIMIT 1";
			$Insert = "INSERT INTO pharmacy(pharmacyName,registrationNumber,phone,address) values(?,?,?,?)";
			$stmt = $con->prepare($User_data);
			$stmt->bind_param("s", $pharmareg_number);
			$stmt->execute();
			$stmt->bind_result($resultpharmareg_number);
			$stmt->store_result();
			$stmt->fetch();
			$rnum = $stmt->num_rows;
			if ($rnum == 0) {
				$stmt->close();
				$stmt = $con->prepare($Insert);
				$stmt->bind_param("ssss", $pharmaname, $pharmareg_number, $pharmaphone, $pharmaaddress);
				mysqli_report(MYSQLI_REPORT_OFF);
				if ($stmt->execute()) {
					echo "<script> alert('Pharmacy added sucessfully'); window.location.href='dashboard.php'; </script>";
				} else {

					echo "<script> alert('Already a pharmacy have this registration number or phone number'); window.location.href='dashboard.php'; </script>";
				}
			} else {

				echo "<script> alert('Already a pharmacy have this registration number or phone number'); window.location.href='dashboard.php'; </script>";
			}
			$stmt->close();
			$con->close();
		}
	}
}

?>