<?php

include "../db/dbconnection.php";

/*
$_SESSION["status"] = '';
echo "<script>alert('".$_SESSION["status"]."');</script>";
*/
if(isset($_POST['btn_submit'])){
	$sql = "SELECT * FROM admin WHERE admin_username = '".$_POST['username']."' AND admin_password = '".md5($_POST['password'])."'";  
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		$_SESSION["name"] = $row['admin_name'];
		$_SESSION["username"] = $row['admin_username'];
		$_SESSION["password"] = $row['admin_password'];
		$_SESSION["status"] = $row['admin_status'];
		$_SESSION["type"] = $row['admin_type'];

	  } 
	  header('Location: ../index.php?lang=ch');
	}
	else{   
		$_SESSION["status"] = 'F';
		header('Location: ../index.php');
	}
}
?>