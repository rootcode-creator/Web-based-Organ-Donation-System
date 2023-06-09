<?php
include('inc/config.php'); 
$sql = "DELETE FROM organ WHERE id ='" . $_GET["id"] . "'";

$run = mysqli_query($con,$sql);

if($run == true){
			
    echo "<script> 
            alert('Application Deleted');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Failed to delete the application');
    </script>";
}

mysqli_close($con);
?>