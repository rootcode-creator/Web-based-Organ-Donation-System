<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone'])) {
} else {
	header('location:pharmacistsignin.html');
}

?>

<body>

	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Organ Donation Web app</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav">
					<li class="nav-item px-2"><a href="#" class="nav-link active">PHARMACIST NAME  ⇒ <?php echo strtoupper($_SESSION['name']); ?>|| PHARMACIST PHONE ⇒ <?php echo strtoupper( $_SESSION['phone']); ?></a></li>

				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">

					<li class="nav-item">
						<a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
					</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->

	<header id="main-header" class="bg-primary py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa-solid fa-prescription-bottle-medical"></i> Pharmacist Dashboard</h1>
				</div>
			</div>
		</div>
	</header>
	<!--This is section-->

	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">

				<div class="col-md-3">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#myInformation"><i class="fa-solid fa-circle-info"></i> My Information</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addmedicine"><i class="fa-solid fa-square-plus"></i> Add Medicine Details</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%; min-width: 260px ;" data-toggle="modal" data-target="#updatemedicine"><i class="fa-sharp fa-solid fa-marker"></i> Update Medicine Details</a>

				</div>

				<div class="col-md-3">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa-sharp fa-solid fa-spinner"></i> Orders</a>
				</div>
				<br><br>
				<div class="col-md-3">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#usercomment"><i class="fa-sharp fa-solid fa-comment"></i> User Comment</a>
				</div>


				<div class="col-md-3">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#ordershistory"><i class="fa-solid fa-clock-rotate-left"></i> Orders History</a>
				</div>

				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;min-width: 260px ;" data-toggle="modal" data-target="#orderDelivery"><i class="fa-solid fa-truck"></i> Order Delivery</a>
				</div>





			</div>
		</div>

	</section>
	<!----Section2 for showing Post Model ---->

	<section id="post">
		<div class="container">
			<div class="row">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>#</th>
						<th>Customer Name</th>
						<th>Phone Number</th>
						<th>Customer Response</th>
						<th>Doctor Information</th>
						
						
						<th>Order Date</th>
						<th>Order Status</th>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
						$sql = "SELECT * FROM ordermedicine ";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>


							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['patientName']; ?></td>
								<td><?php echo $result['patientPhone']; ?></td>
								<td><?php echo $result['usercomment']; ?></td>
								<td><?php echo $result['doctor']; ?></td>
								<td><?php $timestamp = strtotime($result['orderdate']);
									echo date('d-M-y', $timestamp); ?></td>
								
								
								<td>
								<?php
								if ($result['deliveryStatus'] == 0) {
									echo "<span class='badge badge-warning'>Pending</span>";
								} else if ($result['deliveryStatus'] == 1) {
									echo "<span class='badge badge-success'>Delivered</span>";
								} else {
									echo "<span class='badge badge-danger'>Rejected</span>";
								}
								$cnt++;
							}
								?>
								</td>
							</tr>

					</tbody>
				</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- <p class="lead">&copy; <?php echo date("Y") ?> </p> -->
				</div>
			</div>
		</div>
	</section>


	<!--myInformation Modal -->
	<div class="modal fade" id="myInformation">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>My Information</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>

							<th>Name</th>
							<th>Phone Number</th>

							<th>Registration Date</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM pharmacist WHERE  phone_number='" . $_SESSION['phone'] . "'";
							$que = mysqli_query($con, $sql);

							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>

									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>


									<td><?php $timestamp = strtotime($result['date']);
										echo date('d-M-y', $timestamp); ?></td>


								<?php } ?>
								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>






	<!-- Creating Modal -->
	<!-- Header Post -->
	<div class="modal fade" id="addmedicine">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Add Medicine Details</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">

					<div class="form-group">

						<form action="addmedicine.php" method="Post">
							<label class="form-control-label">Medicine Name</label>
							<input type="text" name="medicinename" class="form-control" required>
							<br>
							<label class="form-control-label">Dose or Ingredient</label>
							<input type="text" name="dose" class="form-control" required>
							<br>
							<label class="form-control-label">Quantity</label>
							<input type="number" name="quantity" class="form-control" required>
							<br>
							<label class="form-control-label">Manufacturer Name</label>
							<input type="text" name="manufacturer" class="form-control" required>
							<br>

							<div class="modal-footer">
								<button class="btn btn-danger btn-sm" style="border-radius:0%;" data-dismiss="modal">Close</button>

								<input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="add" value="Add">
							</div>
						</form>

					</div>

				</div>

			</div>
		</div>
	</div>







	<!--Update medicine-->
	<div class="modal fade" id="updatemedicine">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:1050px;position: left-centered;">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>Update Medicine Details</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Medicine Number</th>
							<th>Medicine Name</th>
							<th>Dose Or Ingredients</th>
							<th>Manufacturer</th>

							<th>Quantity</th>

							<th>Added Date</th>

							<th>Quantity Sold Now</th>

							<th>Action</th>


						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM stockmedicine  ORDER BY id ASC";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['medicinename']; ?></td>
									<td><?php echo $result['dose']; ?></td>
									<td><?php echo $result['manufacturer']; ?></td>


									<td class='badge badge-primary' style="position:relative; right:-25px; top:20px;"><?php echo $result['quantity']; ?></td>







									<td><?php $timestamp = strtotime($result['added_date']);
										echo date('d-M-y', $timestamp);
										$cnt++; ?></td>



									<form action="medicinedetailsupdate.php" method="POST">



										<input type="hidden" value="<?php echo $result['id']; ?>" name="id">
										<input type="hidden" value="<?php echo $result['quantity']; ?>" name="totalquantity">

										<td><input type="text" style="height:70px ;width: 100px" name="quantitysoldnow"> </td>

										<style>
											.btn {
												border-radius: 0px;
											}

											.btn-1:hover {
												background-color: #b0e627;
											}

											.btn-2:hover {
												background-color: #eb4034;
											}

											.btn-3:hover {
												background-color: #c4c79f;
											}
										</style>
										<td><input type="submit" class="btn btn-success btn-1 btn-sm" style="border-radius:0%;" name="updatequantitystatus" value="ADD QUANTITY">
											<br><br>
											<input type="submit" class="btn btn-primary btn-2 btn-sm" style="border-radius:0%;" name="updatequantitystatus" value="SUBTRACT QUANTITY">
											<br><br>
											<input type="submit" class="btn btn-danger btn-3 btn-sm" style="border-radius:0%;" name="updatequantitystatus" value="DELETE MEDICINE">
										</td>
									</form>


								<?php } ?>

								</tr>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>




















	<!--Pending Orders-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:1050px;position: left-centered;">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Pending Orders</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Customer Name</th>
							<th>Phone Number</th>
							<th>Odered Medicine</th>
							<th>Quantity</th>


							<th>Individual Price</th>
							<th>Total Price</th>
							<th>Pharmacist Comment</th>
							<th>Action</th>


						</thead>
						<tbody>
							<?php
							// $sql = "SELECT * FROM ordermedicine where orderstatus = 0 AND commentexist != 1 ORDER BY orderId ASC";
							
							$sql = "SELECT orderId,application_id,patientName,patientPhone,patientGender,patientBlood,doctor,prescription_written_date,prescription,orderstatus,individualPrice,totalPrice,userResponse,pharmacistcomment,commentexist,usercomment,usercommentexist,deliveryStatus,
							ordermedicine.med1name,ordermedicine.med2name,ordermedicine.med3name,ordermedicine.med4name,ordermedicine.med5name,ordermedicine.med6name,ordermedicine.med7name,ordermedicine.med8name,ordermedicine.med9name,ordermedicine.med10name,ordermedicine.med11name,ordermedicine.med12name,
							CONCAT(med1quantity, '\n',
							med2quantity,'\n',
							med3quantity,'\n',
							med4quantity,'\n',
							med5quantity,'\n',
							med6quantity,'\n',
							med7quantity,'\n',
							med8quantity,'\n',
							med9quantity,'\n',
							med10quantity,'\n',
							med11quantity,'\n',
							med12quantity ) AS quantity  FROM ordermedicine where orderstatus = 0 AND commentexist != 1 ORDER BY orderId ASC";

							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['patientName']; ?></td>
									<td><?php echo $result['patientPhone']; ?></td>

									<td>
										<?php


										echo nl2br($result['med1name']."  " .$result['med2name']. "  " . $result['med3name']."  " .$result['med4name']."  " .
										$result['med5name']."  " .$result['med6name']. "  " . $result['med7name']."  " .$result['med8name']."  " .
										$result['med9name']."  " .$result['med10name']. "  " . $result['med11name']."  " .$result['med12name']);

										// if ($result['status'] == 0) {
										// 	echo "<span class='badge badge-warning'>Pending</span>";
										// } else if($result['status'] == 1) {
										// 	echo "<span class='badge badge-success'>Approved</span>";
										// }

										$cnt++;

										?>
									</td>

									<td><?php echo $result['quantity']; ?></td>





									<!-- <td><?php echo $result['orderId']; ?></td> -->

									<!-- <td><?php $timestamp = strtotime($result['orderdate']);
												echo date('d/m/Y', $timestamp); ?></td> -->




									<form action="priceupdate.php" method="POST">



										<input type="hidden" value="<?php echo $result['orderId']; ?>" name="orderId">
										<td><input type="text" style="height:70px ;width: 100px" name="individualprice"> </td>
										<td><input type="text" style="height:70px ;width: 100px" name="totalprice"> </td>
										<td><input type="text" style="height:70px ;width: 100px" name="pharmacistcomment"> </td>

										<td><input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="sendprice" value="SEND PRICE">
											<br><br>
											<input type="submit" class="btn btn-info btn-sm" style="border-radius:0%;" name="sendprice" value="SEND COMMENT">
										</td>
									</form>


								<?php } ?>

								</tr>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>






	<!--Orders History-->
	<div class="modal fade" id="ordershistory">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:1050px;position: left-centered;">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Orders History</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order Number</th>
							<th>Customer Name</th>
							<th>Phone Number</th>
							<th>Prescription</th>
							<th>Order Id</th>
							
							<th>Total Price</th>
							<th>Delivery Status</th>
							<th>Order Date</th>



						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine Where deliveryStatus = '0' OR deliveryStatus = '1' ORDER BY orderId ASC";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['patientName']; ?></td>
									<td><?php echo $result['patientPhone']; ?></td>


									
									<td><?php echo nl2br($result['med1name']." " .$result['med2name']. " " . $result['med3name']." " .$result['med4name']." " .
											   $result['med5name']." " .$result['med6name']. " " . $result['med7name']." " .$result['med8name']." " .
											   $result['med9name']." " .$result['med10name']. " " . $result['med11name']." " .$result['med12name']); ?> </td>

									<!-- <td><?php echo nl2br($result['prescription']); ?> </td> -->

									<td><?php echo $result['orderId']; ?></td>
									

									<td><?php echo $result['totalPrice']; ?></td>

									<td>
										<?php
										if ($result['deliveryStatus'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										} elseif ($result['deliveryStatus'] == 1) {
											echo "<span class='badge badge-success'>Delivered</span>";
										}

										?>
									</td>
									<td><?php $timestamp = strtotime($result['orderdate']);
										echo date('d-M-y', $timestamp); ?></td>




									<!-- <td><?php echo $result['orderId']; ?></td> -->

									<!-- <td><?php $timestamp = strtotime($result['orderdate']);
												echo date('d/m/Y', $timestamp); ?></td> -->







								<?php $cnt++;
							} ?>

								</tr>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>




	<!-- Approve Applications -->
	<div class="modal fade" id="orderDelivery">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Order Delivery Action</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order Number</th>
							<th>Customer Name</th>
							<th>Phone Number</th>
							<th>Quantity</th>
							<th>Total Price</th>
							<th>Delivery Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine WHERE deliveryStatus = '0' ORDER BY deliveryStatus ASC ";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['patientName']; ?></td>
									<td><?php echo $result['patientPhone']; ?></td>
									<td><?php echo $result['quantity']; ?></td>
									<td><?php echo $result['totalPrice']; ?></td>

									<td>
										<?php
										if ($result['deliveryStatus'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										} elseif ($result['deliveryStatus'] == 1) {
											echo "<span class='badge badge-success'>Delivered</span>";
										}
										$cnt++;

										?>
									</td>

									<td>
										<form action="deliverystatuschange.php" method="Post">

											<input type="hidden" name="orderId" value="<?php echo $result['orderId'] ?>">


											<input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="delivered" value="DELIVERED">
										</form>
									</td>
								<?php } ?>
								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>










	<!-- User Modal -->
	<div class="modal fade" id="usercomment">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>User Comment</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order No</th>
							<th>Customer Name</th>
							<th>Order Id</th>

							<th>Phone Number</th>
							<th>My Comment</th>
							<th>Customer Comment</th>



						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine WHERE commentexist = 1";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>

									<td><?php echo $result['patientName']; ?></td>
									<td><?php echo $result['orderId']; ?></td>
									<td><?php echo $result['patientPhone']; ?></td>
									<td><?php echo $result['pharmacistcomment']; ?></td>
									<td><?php echo $result['usercomment']; ?></td>





								<?php
								$cnt++;
							}
								?>
								</td>
								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('application_reason');
	</script>
</body>

</html>
<?php
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
					window.open('dashboard.php','_self');
				  </script>";
	} else {
		echo "<script> 
			alert('Failed To Apply');
			</script>";
	}
}

?>