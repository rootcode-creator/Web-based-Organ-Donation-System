<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['gender']) && 
        isset($_POST['blood']) && isset($_POST['height']) &&
        isset($_POST['password']) ) {
        
			$name = $_POST['name'];
			$phone = $_POST['phone'];
            $gender = $_POST['gender'];
			$blood = $_POST['blood'];
			$height = $_POST['height'];
			$password = hash('sha256',$_POST['password']);

        $host = "127.0.0.1";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "user";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $User_data = "SELECT phone_number FROM users WHERE phone_number = ? LIMIT 1";
            $Insert = "INSERT INTO users (name,gender,blood_group,height,phone_number,password) values(?, ?,?, ?, ?, ?)";
            $stmt = $conn->prepare($User_data);
            $stmt->bind_param("s",$phone_number);
            $stmt->execute();
            $stmt->bind_result($resultphone_number);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssdss",$name,  $gender, $blood, $height, $phone, $password);
                mysqli_report(MYSQLI_REPORT_OFF);
                if ($stmt->execute()) {
                    echo "<script> alert('Your signup Process completed sucessfully'); window.location.href='signin.html'; </script>";
                    
                }
                else {
                    
                    echo "<script> alert('Someone already registered using this phone number'); window.location.href='signup.html'; </script>";
                   
                    
                }
            }
            else {
                
                echo "<script> alert('Someone already registered using this phone number'); window.location.href='signup.html'; </script>";
                
                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "<script> alert('All field are required'); window.location.href='signup.html'; </script>";
        die();
    }
}
else {
    echo '<script>alert("Submit button is not set")</script>';
}
?>

