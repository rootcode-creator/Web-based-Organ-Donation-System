<?php
include('inc/head.php');
session_start();

// if (isset($_SESSION['name'] )&& isset($_SESSION['phone_number']) && isset($_SESSION['blood']) && isset($_SESSION['gender']) ) {
// } else {
// 	header('location:signin.html');
// }





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
                    <li class="nav-item px-2"><a href="#" class="nav-link active">Doctors Name → <?php echo $_SESSION['name'] ?></a></li>

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
                    <h1><i class="fa-sharp fa-solid fa-prescription-bottle"></i> Prescription Dashboard</h1>
                </div>
            </div>
        </div>
    </header>
    <!--This is section-->

    <section id="sections" class="py-4 mb-4 bg-faded">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#prescriptionModal"><i class="fa-solid fa-prescription"></i> Write prescription</a>
                </div>


                <!-- <div class="col-md-3">
                    <a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa-sharp fa-solid fa-spinner"></i> Pendings</a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#approveModal"><i class="fa-solid fa-thumbs-up"></i> Approved Applications</a>
                </div>

                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#rejectModal"><i class="fa-solid fa-skull-crossbones"></i> Rejected Applications</a>
                </div> -->

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
                                    echo date('d/m/Y', $timestamp); ?></td>
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

    <!-- Prescription Modal -->
    
    <div class="modal fade" id="prescriptionModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <div class="modal-title">
                        <h5>Write Your Prescription</h5>
                    </div>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $_POST['id'] ?>">
                            <input type="hidden" name="name" class="form-control" value="<?php echo $_POST['name'] ?>">
                            <input type="hidden" name="phone" value="<?php echo $_POST['phone'] ?>">
                            <input type="hidden" name="gender" value="<?php echo $_POST['gender'] ?>">
                            <input type="hidden" name="blood" value="<?php echo $_POST['blood'] ?>">
                            <input type="hidden" name="application_date" value="<?php echo $_POST['date'] ?>">
                            <input type="hidden" name="doctor" value="<?php echo  $_POST['doctor'] ?>">



                            

                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Prescription Written Date</label>
                            <input type="date" name="prescription_written_date" class="form-control" required />

                            
                        </div>
                        <div class="form-group">
                            <label>Prescription With Quantity</label>
                            <textarea name="prescription" class="form-control" required></textarea>


                            <script src="js/jquery.min.js"></script>
                            <script src="js/tether.min.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('prescription');
                            </script>

                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" style="border-radius:0%;" data-dismiss="modal">CLOSE</button>
                    <input type="hidden" name="status" value="0">
                    <input type="submit" class="btn btn-success btn-sm" style="border-radius:0%;" name="write" value="WRITE">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal Category-->
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
                                        echo date('d/m/Y', $timestamp); ?></td>

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
                            <th>Phone Number</th>
                            <th>Gender</th>
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
                                    <td><?php $timestamp = strtotime($result['application_date']);
                                        echo date('d/m/Y', $timestamp); ?></td>

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

    <!-- User Modal -->
    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
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
                                        echo date('d/m/Y', $timestamp); ?></td>

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


</body>

</html>
<?php
if (isset($_POST['write'])) {
    if(isset($_POST['id']) &&isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['gender']) && isset($_POST['blood']) && isset($_POST['application_date']) 
    
    && isset( $_POST['doctor']) && isset($_POST['prescription_written_date']) && isset($_POST['prescription'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $blood = $_POST['blood'];
    $application_date = $_POST['application_date'];
    $doctor =  $_POST['doctor'];
    $prescription_written_date = $_POST['prescription_written_date'];
    $prescription = $_POST['prescription'];

    $sql = "INSERT INTO prescription(id,name,phone,gender,blood,application_date,doctor_info,prescription_written_date,prescription)VALUES('$id','$name','$phone','$gender','$blood','$application_date','$doctor','$prescription_written_date','$prescription')";
    $sql2 = "update organ SET prescriptionwritten = 1 WHERE id = '$id'";

    $run = mysqli_query($con, $sql);
    $run2 = mysqli_query($con, $sql2);

    if ($run == true && $run2 == true) {

        echo "<script> 
					alert('Prescription Written Successfully');
					window.open('doctorshomepage.php','_self');
				  </script>";
    } else {
        echo "<script> 
			alert('Failed To Write The Prescription');
			</script>";
    }
}

}

?>