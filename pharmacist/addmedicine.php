

<?php
if (isset($_POST['add'])) {
    if (isset($_POST['medicinename']) && isset($_POST['quantity']) && isset($_POST['manufacturer']) ) {

        
			
		$medicinename = $_POST['medicinename'];
        $dose = $_POST['dose'];
		$quantity = $_POST['quantity'];
		$manufacturer = $_POST['manufacturer'];
		
		

        $host = "127.0.0.1";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "user";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $User_data = "SELECT medicinename FROM stockmedicine WHERE medicinename = ? LIMIT 1";
            $Insert = "INSERT INTO stockmedicine(medicinename,dose,quantity,manufacturer) values(?, ?,?,?)";
            $stmt = $conn->prepare($User_data);
            $stmt->bind_param("s",$medicinename);
            $stmt->execute();
            $stmt->bind_result($resultmedicinename);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssis",$medicinename,$dose,$quantity,$manufacturer);
                mysqli_report(MYSQLI_REPORT_OFF);
                if ($stmt->execute()) {
                    echo "<script> alert('Medicine Added To Databse'); window.open('dashboard.php','_self'); </script>";
                    
                }
                else {
                    
                    echo "<script> alert('Medicine or manufacturer by these names are already stored in database'); window.location.href='dashboard.php'; </script>";
                   
                    
                }
            }
            else {
                
                echo "<script> alert('Medicine or manufacturer by these names are already stored in database'); window.location.href='dashboard.php'; </script>";
                
                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "<script> alert('All field are required'); window.location.href='dashboard.php'; </script>";
        die();
    }
}
else {
    echo '<script>alert("Submit button is not set")</script>';
}
?>