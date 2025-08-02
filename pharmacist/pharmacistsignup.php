<?php
include('inc/config.php');

if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['phone']) &&
        isset($_POST['password']) ) {
        
			$name = $_POST['name'];
			$phone = $_POST['phone'];
            
			$password = hash('sha256',$_POST['password']);

        

        if ($con->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $User_data = "SELECT phone_number FROM pharmacist WHERE phone_number = ? LIMIT 1";
            $Insert = "INSERT INTO  pharmacist (name,phone_number,password) values(?, ?, ?)";
            $stmt = $con->prepare($User_data);
            $stmt->bind_param("s",$phone);
            $stmt->execute();
            $stmt->bind_result($resultphone);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $con->prepare($Insert);
                $stmt->bind_param("sss",$name,$phone, $password);
                mysqli_report(MYSQLI_REPORT_OFF);
                if ($stmt->execute()) {
                    echo "<script> alert('Your signup Process completed sucessfully'); window.location.href='pharmacistsignin.html'; </script>";
                    
                }
                else {
                    
                    echo "<script> alert('Someone already registered using this phone number'); window.location.href='pharmacistsignup.html'; </script>";
                   
                    
                }
            }
            else {
                
                echo "<script> alert('Someone already registered using this phone number'); window.location.href='pharmacistsignup.html'; </script>";
                
                
            }
            $stmt->close();
            $con->close();
        }
    }
    else {
        echo "<script> alert('All field are required'); window.location.href='pharmacistsignup.html'; </script>";
        die();
    }
}
else {
    echo '<script>alert("Submit button is not set")</script>';
}
?>

