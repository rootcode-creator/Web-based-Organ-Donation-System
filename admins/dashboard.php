<?php
include('inc/head.php');

session_start();
if (isset($_SESSION['name'])) {
} else {
	echo "<script> alert('Login to see Admin pannel'); window.open('adminsignin.html','_self'); </script>";
}

?>

<body>
	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse p-0">
		<div class="container">
			<button class="navbar-toggler toggler-right" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Organ Donation web App</a>

			<div class="collapse navbar-collapse" id="mynavbar">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">

						<h5 style="color:white">Administrator ⇒ &nbsp<?php echo strtoupper($_SESSION['name']); ?></h5>
					<li class="nav-item">
						<a href="logout.php" class="nav-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
					</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa-sharp fa-solid fa-user-secret"></i> Admin Panel</h1>

				</div>
			</div>
		</div>
	</header>
	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block  " style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#myInformation"><i class="fa-solid fa-circle-info"></i> My Information</a>
				</div>

				<div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#AssignDoctorsModal"><i class="fa-solid fa-suitcase-medical"></i> Assign Doctors</a>
				</div>

				<div class="col-md-2">
					<a href="#" class="btn btn-warning btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#addPostModal"><i class="fa-sharp fa-solid fa-spinner"></i> Pending</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="width:180px;border-radius:0%;margin-right: 15px;"  data-toggle="modal" data-target="#addCateModal"><i class="fa-solid fa-thumbs-up"></i> Approved</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#addRejModal"><i class="fa-sharp fa-solid fa-ban"></i> Rejected</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="width:230px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#totalUserModel"><i class="fas fa-users"></i> Total Applications</a>
				</div>
				<br><br>
				<div class="col-md-2">
					<a href="#" class="btn btn-primary btn-block" style="width:180px;border-radius:0%;" data-toggle="modal" data-target="#addDocModal"><i class="fa-solid fa-user-plus"></i> Add Doctors</a>
				</div>

				<br><br>
				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#viewUserModal"><i class="fa-regular fa-eye"></i> View Users</a>
				</div>
				<br><br>

				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#viewDoctorsModal"><i class="fa-sharp fa-solid fa-eye"></i> View Doctors</a>
				</div>

				

				<div class="col-md-2">
					<a href="#" class="btn btn-primary btn-block" style="width:180px;border-radius:0%;margin-right: 15px;" data-toggle="modal" data-target="#PharmacyModal"><i class="fa-solid fa-pills"></i> Add Pharmacy</a>
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
						<th>Blood Group</th>
						<th>Application Reason</th>
						<th>Doctor Information</th>
						<th>Status</th>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
						$sql = "SELECT * FROM organ ORDER BY id ASC";
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
								<td><?php echo $result['application_reason']; ?></td>
								<td><?php echo nl2br($result['doctor_info']); ?></td> <!-- Fetch with next line -->
								<td>
								<?php
								if ($result['status'] == 0) {
									echo "<span class='badge badge-warning'>Pending</span>";
								} elseif ($result['status'] == 1) {
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
							<th>Registration Date</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM admins WHERE  name='" . $_SESSION['name'] . "'";
							$que = mysqli_query($con, $sql);

							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>

									<td><?php echo $result['name']; ?></td>
									

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
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style = "width:1050px;">
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
							<th>Phone Number </th>
							<th>Application Date</th>
							<th>Application Status</th>
							<th>Doctor Recomendation</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 0";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>

									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>

									<td>
										<?php
										if ($result['status'] == 0) {

											echo "<span class='badge badge-warning '>Pending</span>";
										}
										?>
									</td>

									<td>
										<?php

										if ($result['doctor_recommendation'] == 0) {

											echo "<span class='badge badge-primary'>You can approve this application</span>";
										} else if ($result['doctor_recommendation'] == 1) {
											echo "<span class='badge badge-primary'>You can reject this application</span>";
										} else {
											echo "";
										}
										?>


									</td>


									<td>
										<form action="accept.php?id=<?php echo $result['id']; ?>" method="POST">
											<input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
											<input type="submit" class="btn btn-success btn-sm" name="status" value="Approved">
											<br><br>
											<input type="submit" class="btn btn-danger btn-sm" name="status" value="Rejected">
										</form>
									</td>
								<?php



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

	<!--Modal Category-->
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
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
							<th>Phone Number </th>
							<th>Gender</th>
							<th>Blood</th>
							<th>Application Date</th>

							<th>Application Status</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 1";
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

	<!--Model rejected -->
	<!--Modal Category-->
	<div class="modal fade" id="addRejModal">
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
							<th>Phone Number </th>
							<th>Gender</th>
							<th>Blood</th>
							<th>Application Date</th>

							<th>Status</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = 2 ORDER BY id ASC";
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

	<!-- User Modal -->
	<div class="modal fade" id="totalUserModel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Total Applications</h5>
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
							<th>Blood</th>
							<th>Application Date</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM organ ORDER BY id ASC";
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
										} else {
											echo "<span class='badge badge-danger'>Rejected</span>";
										}
										$cnt++;

										?>
									</td>
									<td><a href="applicationdelete.php?id=<?php echo $result["id"]; ?>"><button type="button" class="btn btn-danger btn-sm" style="border-radius:0%;">Delete</button></a> </td>
								<?php
							}
								?>

								</tr>

						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>


	<!-- Add Users Modal -->
	<div class="modal fade" id="addDocModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Add Doctors</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<input type="text" oninvalid="this.setCustomValidity('Enter your Name')" oninput="setCustomValidity('')" name="name" class="form-control" required />
							<label class="form-control-label">Registration Number</label>
							<input type="text" oninvalid="this.setCustomValidity('Enter your Registration Number')" oninput="setCustomValidity('')" name="reg_number" class="form-control" required />

							<label class="form-control-label">Doctors Phone Number</label>
							<input type="tel" class="form-control" pattern="[0-9]{3}[0-9]{8}" oninvalid="this.setCustomValidity('Enter your Phone Number Format: 01301701410')" oninput="setCustomValidity('')" name="phone" required>


							<label class="form-control-label">Hospital</label>
							<select name="hospital" oninvalid="this.setCustomValidity('Select your Hospital Name')" oninput="setCustomValidity('')" required class="form-control">

								<option value="">Choose Hospital</option>
								<option value="Shahid Suhrawardy Hospital">Shahid Suhrawardy Hospital</option>
								<option value="Ad-Din Hospital">Ad-Din Hospital</option>
								<option value="Appolo Hospital">Appolo Hospital</option>
								<option value="CMH (Dhaka Cantonment)">CMH (Dhaka Cantonment)</option>
								<option value="Dhaka Orthopaedic Hospital">Dhaka Orthopaedic Hospital</option>
								<option value="Sir Salimullah Medical College">Sir Salimullah Medical College</option>
								<option value="Ibn Sina Hospital">Ibn Sina Hospital</option>
								<option value="National Heart Foundation Hospital">National Heart Foundation</option>
							</select>

							<label class="form-control-label">Password</label>
							<input type="password" oninvalid="this.setCustomValidity('Enter your Password')" oninput="setCustomValidity('')" name="password" class="form-control required" required />


						</div>


				</div>
				<div class="modal-footer">
					<button class="btn btn-danger btn-sm" style="border-radius:0%;" data-dismiss="modal">Close</button>
					<input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="adddoctors" value="Add">
				</div>
				</form>
			</div>
		</div>
	</div>







	<!-- View Employee Modal -->
	<div class="modal fade" id="viewUserModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>User List</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Blood Group</th>
							<th>Height</th>
							<th>Phone Number</th>
							<th>Registration Date</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM users";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['gender']; ?></td>
									<td><?php echo $result['blood_group']; ?></td>
									<td><?php echo $result['height']; ?></td>
									<td><?php echo $result['phone_number']; ?></td>
									<td><?php $timestamp = strtotime($result['date']);
										echo date('d-M-y', $timestamp); ?></td>
									<td><a href="userdelete.php?id=<?php echo $result["phone_number"]; ?>"><button type="button" class="btn btn-danger btn-sm" style="border-radius:0%;">Delete</button></a> </td>
								</tr>

						</tbody>
					<?php $cnt++;
							} ?>
					</table>
				</div>

			</div>
		</div>
	</div>


	<!-- View Doctors Modal -->
	<div class="modal fade" id="viewDoctorsModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Doctors List</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Registration Number</th>
							<th>Name</th>
							<th>Hospital Name</th>
							<th>Phone Number</th>
							<th>Registration Date</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM doctors";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['reg_number']; ?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['hospital']; ?></td>
									<td><?php echo $result['phone']; ?></td>
									<td><?php $timestamp = strtotime($result['date']);
										echo date('d-M-y', $timestamp); ?></td>
									<td><a href="doctordelete.php?id=<?php echo $result["reg_number"]; ?>"><button type="button" class="btn btn-danger btn-sm" style="border-radius:0%;">Delete</button></a> </td>
								</tr>

						</tbody>
					<?php $cnt++;
							} ?>
					</table>
				</div>

			</div>
		</div>
	</div>




	<!-- View Doctors Modal -->
	<div class="modal fade" id="AssignDoctorsModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Assign Doctor</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>

							<th>Application Date</th>
							<th>Application Status</th>
							<th>Doctor Information</th>
							<th>Select Doctor</th>
							<th>Action</th>
						</thead>




						<tbody>
							<?php
							$sql = "SELECT * FROM organ WHERE status = '0'";
							$que = mysqli_query($con, $sql);
							$cnt = 1;
							while ($result = mysqli_fetch_assoc($que)) {
							?>


								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['name']; ?></td>

									<td><?php $timestamp = strtotime($result['application_date']);
										echo date('d-M-y', $timestamp); ?></td>
									<td> <?php echo "<span class='badge badge-warning'>Pending</span>" ?><?php $did = $result['id'] ?></td>
									<td><?php echo $result['doctor_info']; ?></td>
									<td>
										<form method="POST" action="doctorassign.php">

											<?php


											$con = mysqli_connect("localhost", "root", "", "user");


											$sql = "SELECT * FROM doctors";
											$all_categories = mysqli_query($con, $sql);
											?>





											<select name="doctor_information">
												<?php


												while ($doctor = mysqli_fetch_array(
													$all_categories,
													MYSQLI_ASSOC
												)) :;
												?>
													<option value="<?php echo $doctor['phone'];
																	// The value we usually set is the primary key
																	?>">
														<?php echo $temp = $doctor['name'];


														// To show the category name to the user
														?>
													</option>



												<?php
												endwhile;
												// While loop must be terminated
												?>
											</select>

											<input type="hidden" name="id" value="<?php echo $result['id'] ?>">



											<!-- <input type="submit" value="Assign" name="submit" class="btn btn-danger" style="border-radius:0%;"> -->
									<td><input type="submit" value="Assign" name="submit" class="btn btn-outline-primary btn-sm" style="border-radius:0%;"></td>

									</form>
									</td>


								</tr>

						</tbody>


					<?php $cnt++;
							} ?>
					</table>
				</div>

			</div>
		</div>
	</div>



	<!-- Pharmacy Code  -->


	<div class="modal fade" id="PharmacyModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Add Pharmacy</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="addpharmacy.php" method="post">
						<div class="form-group">
							<label class="form-control-label">Pharmacy Name</label>
							<input type="text" oninvalid="this.setCustomValidity('Enter Pharma Name')" oninput="setCustomValidity('')" name="pharmaname" class="form-control" required />
							<label class="form-control-label">Registration Number</label>
							<input type="text" oninvalid="this.setCustomValidity('Enter Pharma Registration Number')" oninput="setCustomValidity('')" name="pharmareg_number" class="form-control" required />

							<label class="form-control-label">Phone Number</label>
							<input type="tel" class="form-control" pattern="[0-9]{3}[0-9]{8}" oninvalid="this.setCustomValidity('Enter Pharma Phone Number Format: 01301701410')" oninput="setCustomValidity('')" name="pharmaphone" required>

							<label class="form-control-label">Pharmacy Location</label>
							<textarea oninvalid="this.setCustomValidity('Enter Pharma Address')" oninput="setCustomValidity('')" name="pharmaaddress" class="form-control required" required></textarea>


							<script src="js/jquery.min.js"></script>
							<script src="js/tether.min.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
							<script>
								CKEDITOR.replace('pharmaaddress');
							</script>

						</div>
						<div class="modal-footer">
							<button class="btn btn-danger btn-sm" style="border-radius:0%;" data-dismiss="modal">Close</button>
							<input type="hidden" name="status" value="0">
							<input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="addpharmacy" value="Add">
						</div>
					</form>
				</div>



			</div>

		</div>
	</div>
	</div>



	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('editor1');
	</script>

</body>

</html>

<?php
if (isset($_POST['adddoctors'])) {
	if (isset($_POST['name']) && isset($_POST['reg_number']) && isset($_POST['phone']) && isset($_POST['hospital']) && isset($_POST['password'])) {

		$name = $_POST['name'];
		$reg_number = $_POST['reg_number'];
		$phone = $_POST['phone'];
		$hospital = $_POST['hospital'];
		$password = hash('sha256', $_POST['password']);

		$host = "127.0.0.1";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "user";
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
		if ($conn->connect_error) {
			die('Could not connect to the database.');
		} else {
			$User_data = "SELECT reg_number FROM doctors WHERE reg_number = ? LIMIT 1";
			$Insert = "INSERT INTO doctors (name,reg_number,phone,hospital,password) values(?,?,?,?, ?)";
			$stmt = $conn->prepare($User_data);
			$stmt->bind_param("s", $reg_number);
			$stmt->execute();
			$stmt->bind_result($resultreg_number);
			$stmt->store_result();
			$stmt->fetch();
			$rnum = $stmt->num_rows;
			if ($rnum == 0) {
				$stmt->close();
				$stmt = $conn->prepare($Insert);
				$stmt->bind_param("sssss", $name, $reg_number, $phone, $hospital, $password);
				mysqli_report(MYSQLI_REPORT_OFF);
				if ($stmt->execute()) {
					echo "<script> alert('Doctor added sucessfully'); window.location.href='dashboard.php'; </script>";
				} else {

					echo "<script> alert('Someone already registered using this registration number or phone number'); window.location.href='dashboard.php'; </script>";
				}
			} else {

				echo "<script> alert('Someone already registered using this registration number or phone number'); window.location.href='dashboard.php'; </script>";
			}
			$stmt->close();
			$conn->close();
		}
	}
}

?>