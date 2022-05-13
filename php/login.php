<?php

include "../db/dbconnection.php";

if(isset($_POST['btn_submit'])){
	$sql = "SELECT * FROM admin WHERE admin_username = '".$_POST['username']."' AND admin_password = '".$_POST['password']."'";  
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		$_SESSION["username"] = $row['admin_username'];
		$_SESSION["password"] = $row['admin_password'];
		$_SESSION["status"] = $row['admin_status'];

	  } 
	  header('Location: ../index.php');
	}
}
?>