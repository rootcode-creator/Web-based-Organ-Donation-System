<?php 
	 $host = "sql310.infinityfree.com";
	 $dbUsername = "if0_39521855";
	 $dbPassword = "TTn9dfMrcRxvg9";
	 $dbName = "if0_39521855_organ_donation";
	 $con = new mysqli($host, $dbUsername, $dbPassword, $dbName);
	if (!$con) {
		echo "Database Not Connected";
	}
 ?>