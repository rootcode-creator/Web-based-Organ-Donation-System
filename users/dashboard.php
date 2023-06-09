<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone_number']) && isset($_SESSION['blood']) && isset($_SESSION['gender'])) {
} else {
	header('location:signin.html');
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
					<li class="nav-item px-2"><a href="#" class="nav-link active">PATIENT NAME ⇒ <?php echo strtoupper( $_SESSION['name']); ?> 
				
				
					|| PATIENT PHONE ⇒ <?php echo strtoupper( $_SESSION['phone_number']); ?> </a></li>

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
					<h1><i class="fa-sharp fa-solid fa-user"></i> Users Dashboard</h1>
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
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa-sharp fa-solid fa-plus"></i> Apply For Organ</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa-sharp fa-solid fa-spinner"></i> Pendings</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#approveModal"><i class="fa-solid fa-thumbs-up"></i> Approved Applications</a>
				</div>
				<br><br>

				<div class="col-md-3">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#rejectModal"><i class="fa-solid fa-skull-crossbones"></i> Rejected Applications</a>
				</div>

				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#myprescription"><i class="fa-sharp fa-solid fa-prescription"></i> My Prescription</a>
				</div>


				<div class="col-md-3">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#ordermedicine"><i class="fa-solid fa-cart-shopping"></i> Order Medicine</a>
				</div>

				<div class="col-md-3">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#orderstatus"><i class="fa-sharp fa-solid fa-arrows-spin"></i> Madicine Order Status</a>
				</div>

				<br><br>

				<div class="col-md-3">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#pharmacistcomment"><i class="fa-solid fa-comment"></i> Pharmacist Comment</a>
				</div>
				
				<div class="col-md-3">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#orderDelivery"><i class="fa-solid fa-truck"></i> Order Delivery Status</a>
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
						<th>Name</th>
						<th>Phone Number</th>
						<th>Gender</th>
						<th>Application Date</th>
						<th>Application Reason</th>
						<th>Doctor Information</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
						$sql = "SELECT * FROM organ WHERE phone_number='" . $_SESSION['phone_number'] . "'";
						$que = mysqli_query($con, $sql);
						$cnt = 1;
						while ($result = mysqli_fetch_assoc($que)) {
						?>


							<tr>
								<td><?php echo $cnt; ?></td>
								<td><?php echo $result['name']; ?></td>
								<td><?php echo $result['phone_number']; ?></td>
								<td><?php echo $result['gender']; ?></td>
								<td><?php $timestamp = strtotime($result['application_date']);
									echo date('d-M-y', $timestamp); ?></td>
								<td><?php echo $result['application_reason']; ?></td>
								<td><?php echo nl2br($result['doctor_info']); ?></td> <!-- Fetch with next line -->
								<td>
								<?php
								if ($result['status'] == 0) {
									echo "<span class='badge badge-warning'>Pending</span>";
								} else if ($result['status'] == 1) {
									echo "<span class='badge badge-success'>Approved</span>";
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
							<th>Gender</th>
							<th>Blood Group</th>
							<th>Registration Date</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM users WHERE  phone_number='" . $_SESSION['phone_number'] . "'";
							$que = mysqli_query($con, $sql);

							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>

									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>
									<td><?php echo $result['gender']; ?></td>
									<td><?php echo $result['blood_group']; ?></td>

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




	<!-- Request For organ -->

	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Request for organ</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">

							<input type="hidden" name="name" class="form-control" value="<?php echo $_SESSION['name'] ?>">
							<input type="hidden" name="phone_number" value="<?php echo $_SESSION['phone_number'] ?>">
							<input type="hidden" name="gender" value="<?php echo $_SESSION['gender'] ?>">
							<input type="hidden" name="blood" value="<?php echo $_SESSION['blood'] ?>">

						</div>
						<div class="form-group">
							<label class="form-control-label">Application Date</label>
							<input type="date" name="application_date" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Reason For Application (Less than 10 words)</label>
							<textarea name="application_reason" maxlength="20" class="form-control" required></textarea>

						</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-sm" style="border-radius:0%;" data-dismiss="modal">Close</button>
					<input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="apply" value="Apply">
				</div>
				</form>
			</div>
		</div>
	</div>


	<!--Pending Applications-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Pending Applications</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Gender</th>
							<th>Blood Group</th>
							<th>Application Date</th>

							<th>Application Status</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 0 && phone_number='" . $_SESSION['phone_number'] . "'";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>
									<td><?php echo $result['gender']; ?></td>
									<td><?php echo $result['blood']; ?></td>
									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td>
									<?php
									if ($result['status'] == 0) {
										echo "<span class='badge badge-warning'>Pending</span>";
									} else if ($result['status'] == 1) {
										echo "<span class='badge badge-success'>Approved</span>";
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
		</div>
	</div>



	<!-- User Modal -->
	<div class="modal fade" id="approveModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:850px;position: left-centered;">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Approved Applications</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>

							<th>Name</th>
							<th>Phone Number</th>
							<th>Gender</th>
							<th>Application Id</th>
							<th>Application Date</th>
							<th>Doctor Information</th>


							<th>Status</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 1 AND phone_number='" . $_SESSION['phone_number'] . "'";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>

									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>
									<td><?php echo $result['gender']; ?></td>
									<td><?php echo $result['id']; ?></td>
									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td><?php echo nl2br($result['doctor_info']); ?></td> <!-- Fetch with next line -->
									<td>
									<?php
									if ($result['status'] == 0) {
										echo "<span class='badge badge-warning'>Pending</span>";
									} else {
										echo "<span class='badge badge-success'>Approved</span>";
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
		</div>
	</div>

	<!-- Rejected Modal -->
	<div class="modal fade" id="rejectModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>Rejected Applications</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Phone Number</th>
							<th>Gender</th>
							<th>Blood Group</th>
							<th>Application Date</th>

							<th>Status</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 2 AND phone_number='" . $_SESSION['phone_number'] . "'";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>
									<td><?php echo $result['gender']; ?></td>
									<td><?php echo $result['blood']; ?></td>
									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td>
									<?php
									if ($result['status'] == 0) {
										echo "<span class='badge badge-warning'>Pending</span>";
									} else if ($result['status'] == 2) {
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
		</div>
	</div>






	<!--my prescription Modal -->
	<div class="modal fade" id="myprescription">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>My Prescription</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							
							<th>Serial Number</th>
							<th>Doctor Name</th>
							<th>Doctor Phone</th>

							<th>Prescription</th>
							
							<th>Prescription Written Date</th>

							

						</thead>
						<tbody>
							<?php
							
							
							// $sql = "SELECT * FROM prescription WHERE  phone ='" . $_SESSION['phone_number'] . "'";
							// $que = mysqli_query($con, $sql);

							
							
							
							
							$sql2 = "SELECT doctors.name, doctors.phone, prescription.prescription , prescription.prescription_written_date FROM doctors
							INNER JOIN prescription ON doctors.phone = prescription.doctor_info AND  prescription.phone = '" . $_SESSION['phone_number'] . "' ";
							$que2 = mysqli_query($con, $sql2);
										


							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que2) ) {

							?>

								<tr>

								<td><?php echo $cnt; ?></td>	
								
								<td><?php echo $result['name']; ?></td>

									
									
									<td><?php echo $result['phone']; ?></td>
									
									<td><?php echo nl2br($result['prescription']); ?></td>

									<td><?php $timestamp = strtotime($result['prescription_written_date']);
										echo date('d-M-y', $timestamp); ?></td>


									

								<?php $cnt++; } ?>
								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>

	<!--my Order Modal -->
	<div class="modal fade" id="ordermedicine">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Order Your Medicine</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Application Id</th>

							<th>Prescription</th>
							

							<th>Action</th>

						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM prescription WHERE ( ordered = '' OR ordered = 0 ) AND  phone ='" . $_SESSION['phone_number'] . "'";
							$que = mysqli_query($con, $sql);





							while ($result = mysqli_fetch_assoc($que)) {

							?>

								<tr>

									<td><?php echo $result['id']; ?></td>

									<td><?php echo nl2br($result['prescription']); ?></td>

									<form action="ordermedicinepannel.php" method="POST">





										<td>


											<input type="hidden" name="applicationid" value="<?php echo $result['id'] ?>">
											<input type="hidden" name="patientname" value="<?php echo $result['name'] ?>">
											<input type="hidden" name="patientphone" value="<?php echo $result['phone'] ?>">
											<input type="hidden" name="patientgender" value="<?php echo $result['gender'] ?>">
											<input type="hidden" name="patientbloodgroup" value="<?php echo $result['blood'] ?>">
											<input type="hidden" name="doctor" value="<?php echo $result['doctor_info'] ?>">
											<input type="hidden" name="prescriptionwrittendate" value="<?php echo $result['prescription_written_date'] ?>">
											<input type="hidden" name="prescription" value="<?php echo $result['prescription'] ?>">


											<input type="submit" value="REDIRECT TO ORDER PAGE" name="rorder" class="btn btn-outline-primary btn-sm" style="border: radius 5px;position: center;">
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




	<!--Pending Applications-->
	<div class="modal fade" id="orderstatus">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:1050px;position: left-centered;">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Order Status</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order Number</th>

							<th>Odered Medicines</th>
						
							<th>Order Date</th>
							<th>Individual Price</th>
							<th>Total Price</th>

							<th>My Response </th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine WHERE ( orderstatus = 1 or orderstatus = 0) AND userResponse = 0 AND patientPhone ='" . $_SESSION['phone_number'] . "' ORDER BY application_id ASC";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>

									<td><?php 
									echo nl2br($result['med1name']." " .$result['med2name']. " " . $result['med3name']." " .$result['med4name']." " .
											   $result['med5name']." " .$result['med6name']. " " . $result['med7name']." " .$result['med8name']." " .
											   $result['med9name']." " .$result['med10name']. " " . $result['med11name']." " .$result['med12name']
									
									); ?></td>
									

									<td><?php $timestamp = strtotime($result['orderdate']);
										echo date('d-M-y', $timestamp); ?></td>
									<td><?php echo $result['individualPrice']; ?></td>

									<td><?php echo $result['totalPrice']; ?></td>

									
									<?php
									if($result['orderstatus'] == '0'){

									}elseif($result['orderstatus'] == '1'){
									?>


									<td>

										<form action="userpriceacceptreject.php" method="POST">
											<input type="hidden" name="orderId" value="<?php echo $result['orderId']; ?>">
											<input type="hidden" name="id" value="<?php echo $result['application_id']; ?>">
											<input type="submit" class="btn btn-success btn-sm" name="userResponse" value="Confirm Order">
											<br><br>
											<input type="submit" class="btn btn-danger btn-sm" name="userResponse" value="Decline Order">
										</form>




									<?php




									// if ($result['status'] == 0) {
									// 	echo "<span class='badge badge-warning'>Pending</span>";
									// } else if ($result['status'] == 1) {
									// 	echo "<span class='badge badge-success'>Approved</span>";
									// }
									$cnt++;
								}
									?>
									</td>

							<?php }?>
								</tr>

						</tbody>
					</table>

				</div>

			</div>
		</div>
	</div>




	<!--Pending Applications-->
	<div class="modal fade" id="pharmacistcomment">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="width:1050px;position: left-centered;">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Pharmacist Comment</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order Number</th>

							<th>Prescription</th>
							<th>Quantity</th>
							<th>Order Date</th>
							<th>Pharmacist Comment</th>

							<th>My Response </th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine WHERE orderstatus = 0 AND commentexist = 1 AND usercommentexist = '' AND patientPhone ='" . $_SESSION['phone_number'] . "' ORDER BY application_id ASC";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>

									<td><?php echo nl2br($result['prescription']); ?></td>
									<td><?php echo $result['quantity']; ?></td>

									<td><?php $timestamp = strtotime($result['orderdate']);
										echo date('d-M-y', $timestamp); ?></td>

									<td><?php echo $result['pharmacistcomment']; ?></td>

									<form action="usercomment.php" method="POST">
									<td><input type="text" style="height:70px ;width: 100px" name="comment"> </td>

									<td>

										
											<input type="hidden" name="orderId" value="<?php echo $result['orderId']; ?>">
											
											<input type="submit" class="btn btn-success btn-sm" name="usercomment" value="SEND COMMENT">
										</form>




									<?php




									// if ($result['status'] == 0) {
									// 	echo "<span class='badge badge-warning'>Pending</span>";
									// } else if ($result['status'] == 1) {
									// 	echo "<span class='badge badge-success'>Approved</span>";
									// }
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







	<!-- Approve Applications -->
	<div class="modal fade" id="orderDelivery">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Order Delivery Status</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Order Number</th>
							
							<th>Phone Number</th>
							
							<th>Total Price (Taka)</th>
							<th>Delivery Status</th>
							
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM ordermedicine WHERE (deliveryStatus = '0' OR deliveryStatus = '1') AND patientPhone ='" . $_SESSION['phone_number'] . "' ORDER BY orderId ASC ";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									
									<td><?php echo $result['patientPhone']; ?></td>
									
									<td><?php echo $result['totalPrice']; ?></td>

									<td>
										<?php
										if ($result['deliveryStatus'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										} elseif($result['deliveryStatus'] == 1) {
											echo "<span class='badge badge-success'>Delivered</span>";
										}
										$cnt++;

										?>
									</td>

									
								<?php } ?>
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