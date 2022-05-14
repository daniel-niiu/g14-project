<?php 
include "../db/dbconnection.php"; 
 
session_destroy(); 

if (str_contains($_SERVER['REQUEST_URI'], 'index.php')) { 
	header("Location: index.php");  
}
else
	header("Location: ../index.php");  

?>