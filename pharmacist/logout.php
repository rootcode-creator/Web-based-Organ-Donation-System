<?php 
	
	session_start();
	session_destroy();
	echo"<script> alert('Thank you for using this app'); window.location.href='pharmacistsignin.html'; </script>";

 ?>