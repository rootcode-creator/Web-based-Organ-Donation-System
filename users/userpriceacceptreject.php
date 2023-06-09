

<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone_number']) && isset($_SESSION['blood']) && isset($_SESSION['gender'])) {

	if (isset($_POST['userResponse']) && isset($_POST['orderId'])) {
		$Order_id = $_POST['orderId'];

		$id = $_POST['id'];




		if ($_POST['userResponse'] == 'Confirm Order') {

			$sql = "UPDATE ordermedicine SET userResponse = 1, deliveryStatus = 0 where orderId = '$Order_id' ";
			$run = mysqli_query($con, $sql);

			$sqlo = "SELECT * FROM ordermedicine WHERE orderId = '$Order_id' ";
			$que = mysqli_query($con, $sqlo);
			$result = mysqli_fetch_assoc($que);
			
			


			$sqlsm = "SELECT medicinename,quantity FROM stockmedicine";
			$que2 = mysqli_query($con, $sqlsm);
			while($result2 = mysqli_fetch_assoc($que2)){

				


				if (strcasecmp($result['med1name'], $result2['medicinename']) == 0 ) {

					$med1name = $result['med1name'];
					$sqlsmu1 = "SELECT quantity FROM stockmedicine Where medicinename = '$med1name' ";
					$que4 = mysqli_query($con, $sqlsmu1);
					$result4 = mysqli_fetch_assoc($que4);
	
				
	
						$updatedquantity = (int)  $result4['quantity'] - (int) $result['med1quantity'];
	
						$sql2 = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med1name' ";
	
	
						$run2 = mysqli_query($con, $sql2);
					
	
	
	
	
				}if( strcasecmp($result['med2name'], $result2['medicinename']) == 0){
	
					
					$med2name = $result['med2name'];
					$sqlsmu2 = "SELECT quantity FROM stockmedicine Where medicinename = '$med2name' ";
					$que5 = mysqli_query($con, $sqlsmu2);
	
					$result5 = mysqli_fetch_assoc($que5);
	
				
	
						$updatedquantity = (int)  $result5['quantity'] - (int) $result['med2quantity'];
	
						$sql3 = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med2name' ";
	
	
						$run3 = mysqli_query($con, $sql3);
	
				}if(strcasecmp($result['med3name'], $result2['medicinename']) == 0 ){
	
					
					$med3name = $result['med3name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med3name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med3quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med3name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if( strcasecmp($result['med4name'], $result2['medicinename']) == 0){
	
					
					$med4name = $result['med4name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med4name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med4quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med4name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med5name'], $result2['medicinename']) == 0){
	
					
					$med5name = $result['med5name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med5name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med5quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med5name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med6name'], $result2['medicinename']) == 0){
	
					
					$med6name = $result['med6name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med6name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med6quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med6name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med7name'], $result2['medicinename']) == 0){
	
	
					
					$med7name = $result['med7name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med7name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med7quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med7name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if( strcasecmp($result['med8name'], $result2['medicinename']) == 0){
	
	
					
					$med8name = $result['med8name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med8name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med8quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med8name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med9name'], $result2['medicinename']) == 0){
	
					
					$med9name = $result['med9name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med9name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med9quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med9name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med10name'], $result2['medicinename']) == 0){
	
					
					$med10name = $result['med10name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med10name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med10quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med10name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if(strcasecmp($result['med11name'], $result2['medicinename']) == 0){
	
					
					$med11name = $result['med11name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med11name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med11quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med11name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}if( strcasecmp($result['med12name'], $result2['medicinename']) == 0){
					
					$med12name = $result['med12name'];
					$sqlsmu = "SELECT quantity FROM stockmedicine Where medicinename = '$med12name' ";
					$que3 = mysqli_query($con, $sqlsmu);
					$result3 = mysqli_fetch_assoc($que3);
	
				
	
						$updatedquantity = (int)  $result3['quantity'] - (int) $result['med12quantity'];
	
						$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where medicinename = '$med12name' ";
	
	
						$run = mysqli_query($con, $sql);
	
				}
	













			}
			

			



		} elseif ($_POST['userResponse'] == 'Decline Order') {



			$sql = "UPDATE ordermedicine SET userResponse = 2 where orderId = '$Order_id' ";

			$run = mysqli_query($con, $sql);
			$sql2 = "UPDATE prescription  SET ordered = 0  where id = '$id' ";

			$run2 = mysqli_query($con, $sql2);
		}







		if ($run == true) {

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