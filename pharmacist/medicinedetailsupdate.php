<?php
include('inc/head.php');
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['phone']) && isset($_POST['id']) && isset($_POST['totalquantity']) && isset($_POST['updatequantitystatus']) ) {

	$id = $_POST['id'];
    $totalquantity = $_POST['totalquantity'];

	
    
    if ($_POST['updatequantitystatus'] == 'ADD QUANTITY') {
		$quantitysoldnow = $_POST['quantitysoldnow'];
		
        
        
        $updatedquantity = (int)  $totalquantity + (int) $quantitysoldnow;
        
		$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where id = '$id' ";

		
		$run = mysqli_query($con, $sql) ;

      
       
	
		if ($run == true ) {
	
			echo "<script> 
						alert('Medicine Quantuty Updated To Database');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Update Quantity');
				</script>";
		}
	}elseif ($_POST['updatequantitystatus'] == 'SUBTRACT QUANTITY') {
		$quantitysoldnow = $_POST['quantitysoldnow'];
		
       if (((int) $totalquantity ) < ((int) $quantitysoldnow)) {
       
        echo "<script> alert('Invalid Quantity'); window.open('dashboard.php','_self'); </script>";
       } else {
        
        $updatedquantity = (int)  $totalquantity - (int) $quantitysoldnow;
        
		$sql = "UPDATE stockmedicine SET quantity = '$updatedquantity'  where id = '$id' ";

		
		$run = mysqli_query($con, $sql) ;

       }
       
	
		if ($run == true ) {
	
			echo "<script> 
						alert('Medicine Quantuty Updated To Database');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Update Quantity');
				</script>";
		}
	}elseif ($_POST['updatequantitystatus'] == 'DELETE MEDICINE') {
		
		
		$sql = "DELETE FROM stockmedicine where id = '$id' ";

		$run = mysqli_query($con, $sql) ;

		if ($run == true ) {
	
			echo "<script> 
						alert('Medicine Record Deleted');
						window.open('dashboard.php','_self');
					  </script>";
		} else {
			echo "<script> 
				alert('Failed To Delete Record ');
				</script>";
		}
	}
}