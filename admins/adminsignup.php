<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) &&isset($_POST['username']) && isset($_POST['password'])) {
        
			$name = $_POST['name'];
            $username = hash('sha256',$_POST['username']);
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
            $User_data = "SELECT username FROM admins WHERE username = ? LIMIT 1";
            $Insert = "INSERT INTO admins (name, username,password) values(?, ?, ?)";
            $stmt = $conn->prepare($User_data);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->bind_result($resultusername);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sss",$name, $username, $password);
                mysqli_report(MYSQLI_REPORT_OFF);
                if ($stmt->execute()) {
                    echo "<script> alert('Your signup Process completed sucessfully'); window.location.href='adminsignin.html'; </script>";

                }
                else {

                    echo "<script> alert('Someone already registered using this username'); window.location.href='adminsignup.html'; </script>";

                    
                }
            }
            else {
                
                echo "<script> alert('Someone already registered using this username'); window.location.href='adminsignup.html'; </script>";

                
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {

        echo "<script> alert('All field are required'); window.location.href='adminsignup.html'; </script>";
        die();
    }
}
else {
    echo "<script> alert('Submit button is not set'); window.location.href='adminsignup.html'; </script>";

}
?>