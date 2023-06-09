<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['reg_number']) && isset($_POST['phone']) && isset($_POST['hospital']) && isset($_POST['password']) ) {
        
        $name = $_POST['name'];
        $reg_number = $_POST['reg_number'];
        $phone = $_POST['phone'];
        $hospital = $_POST['hospital'];
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
            $User_data = "SELECT reg_number FROM doctors WHERE reg_number = ? LIMIT 1";
            $Insert = "INSERT INTO doctors (name,reg_number,phone,hospital,password) values(?,?,?,?, ?)";
            $stmt = $conn->prepare($User_data);
            $stmt->bind_param("s",$reg_number);
            $stmt->execute();
            $stmt->bind_result($resultreg_number);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssss",$name,$reg_number,$phone,$hospital, $password);
                mysqli_report(MYSQLI_REPORT_OFF);
                if ($stmt->execute()) {
                    echo "<script> alert('Your signup Process completed sucessfully'); window.location.href='doctorsignin.html'; </script>";
                    
                }
                else {
                    
                    echo "<script> alert('Someone already registered using this registration number or phone number'); window.location.href='doctorsignup.html'; </script>";
                   
                    
                }
            }
            else {
                
                echo "<script> alert('Someone already registered using this registration number or phone number'); window.location.href='doctorsignup.html'; </script>";
                
                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "<script> alert('All field are required'); window.location.href='doctorsignup.html'; </script>";
        die();
    }
}
else {
    echo "<script> alert('Submit button is not set'); window.location.href='doctorsignup.html'; </script>";
}
?>

