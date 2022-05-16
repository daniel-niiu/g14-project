<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_MMS";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

return $conn;


function isMainPageLoggedIn()
{   
    
    if(isset($_SESSION["status"]) && $_SESSION["status"] === "T")
    {
        return true;
    } 
    else
    {
        $_SESSION["status"] = "F";
    }
}

function isLoggedIn()
{   
    
    if(isset($_SESSION["status"]) && $_SESSION["status"] === "T")
    {
        return true;
    }
    else
    {
        $_SESSION["status"] = "F";
        header("Location: ../index.php"); 
    }
}
?>