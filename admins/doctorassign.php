
<?php
include('inc/config.php'); 

$doctor_information = $_POST['doctor_information'];

$id = $_POST['id'];


if (isset($_POST['submit'])) {
    if (isset($_POST['doctor_information'])) {

        $sql = "UPDATE  organ SET  doctor_info = '$doctor_information' WHERE id =  '$id'";

        $run = mysqli_query($con, $sql);
        if ($run == true) {

            echo "<script> alert('Doctor Assigned');
                window.open('dashboard.php','_self');
                	 		</script>";
        } else {
            
        }
    }
}



mysqli_close($con);
?>





   

    

   
