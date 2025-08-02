<?php
session_start();

if (!(isset($_SESSION['name']) && isset($_SESSION['phone'])) ) {
	header('location:doctorsignin.html');
} else {
	
	// echo "<script> alert('Please login to access the doctor dashboard'); window.location.href='doctorsignin.html'; </script>";

	}

include('inc/head.php');
?>

<body>

	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav">
					<a href="#" class="navbar-brand mr-3">Organ Donation Web app</a>
					<li class="nav-item px-2"><a href="#" class="nav-link active">DOCTORS NAME → <?php echo strtoupper($_SESSION['name']) ?> || PHONE → <?php echo $_SESSION['phone'] ?></a></li>

				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">

					<li class="nav-item">
						<a href="logout.php" class="btn btn-xs nav-link logout"><i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i> Logout</a>
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
					<h1><i class="fa-solid fa-user-doctor"></i> Doctors Dashboard</h1>
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
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa-sharp fa-solid fa-spinner"></i> Pendings</a>
				</div>


				<div class="col-md-3">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#prescriptionModal"><i class="fa-solid fa-prescription"></i> Prescription</a>
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
						<th>Name</th>
						<th>Phone Number</th>
						<th>Gender</th>
						<th>Application Date</th>
						<th>Application Reason</th>
						<th>Doctor Recomendation</th>
						<th>Admin Action</th>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
						$sql = "SELECT * FROM organ WHERE status = '0' and doctor_info='" . $_SESSION['phone'] . "'";
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
				<p style = "color: #CCCCFF; font-weight: bold;" >&copy; Kawser Ahmad, <?php echo date("Y");?></P>
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
							<th>Registration Number</th>
							<th>Phone Number</th>
							<th>Hospital</th>
							<th>Registration Date</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM doctors WHERE  phone ='" . $_SESSION['phone'] . "'";
							$que = mysqli_query($con, $sql);

							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>

									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['reg_number']; ?></td>
									<td><?php echo $result['phone']; ?></td>
									
									<td><?php echo $result['hospital']; ?></td>

									<td><?php $timestamp = strtotime($result['date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td>
									<?php } ?>
								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>












	<!--Modal Category-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style = "width:850px;">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Assigned Applications</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Blood</th>
							<th>Application Date</th>
							<th>Application Status</th>
							<th>My Recommendation</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE (recomendationWritten = '0' or recomendationWritten IS NULL)  and doctor_info='" . $_SESSION['phone'] . "'";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>


									<td><?php echo $result['blood']; ?></td>
									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td>
										<?php
										if ($result['status'] == 0) {

											echo "<span class='badge badge-warning'>Pending</span>";
										?>
									</td>

									<td><?php
											if ($result['doctor_recommendation'] == 0) {

												echo "<span class='badge badge-primary'>You can approve this application</span>";
											} else if ($result['doctor_recommendation'] == 1) {
												echo "<span class='badge badge-primary'>You can reject this application</span>";
											} else {
												echo "";
											}
										?></td>
									<td>
										<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
											<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
											<input type="submit" class="btn btn-success btn-sm" name="recomendation" value="Approved">
											<br><br>
											<input type="submit" class="btn btn-danger btn-sm" name="recomendation" value="Rejected">
										</form>
									</td>
							<?php
										} elseif ($result['status'] == 2) {
											echo "Rejected";
										} else {
											echo "Approved";
										}
										$cnt++;
									}
							?>

								</tr>

						</tbody>
					</table>

				</div>


			</div>
		</div>
	</div>


	<!-- prescription Modal  -->
	<div class="modal fade" id="prescriptionModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Prescription</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Patient Name</th>
							<th>Phone Number</th>
							<th>Gender</th>
							<th>Application Date</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 1 AND prescriptionwritten IS NULL AND doctor_info = '" . $_SESSION['phone'] . "'";
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

									<td>
										<?php
										if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										} else {
											echo "<span class='badge badge-success'>Approved</span>";
										}
										$cnt++;

										?>
									</td>
									<td>
										<form action="prescription.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $result['id'] ?>">
											<input type="hidden" name="name" value="<?php echo $result['name'] ?>">
											<input type="hidden" name="phone" value="<?php echo $result['phone_number'] ?>">
											<input type="hidden" name="gender" value="<?php echo $result['gender'] ?>">
											<input type="hidden" name="blood" value="<?php echo $result['blood'] ?>">
											<input type="hidden" name="date" value="<?php echo $result['application_date'] ?>">

											<input type="hidden" name="doctor" value="<?php echo $result['doctor_info'] ?>">

											<input type="submit" value="WRITE PRESCRIPTION" name="submit" class="btn btn-outline-primary btn-sm" style="border-radius:0%;">
										</form>

									<?php } ?>
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