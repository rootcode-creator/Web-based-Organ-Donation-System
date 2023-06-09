<?php
include('inc/config.php'); 
$sql = "DELETE FROM doctors WHERE reg_number='" . $_GET["id"] . "'";

$run = mysqli_query($con,$sql);

if($run == true){
			
    echo "<script> 
            alert('Doctor Deleted');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Failed to delete');
    </script>";
}

mysqli_close($con);
?>