<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
	
    global $conn;

    $prodname = $_POST["name"];
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockin = $_POST["stock-in"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO STOCK(product_name, stock_date, stock_summary, receipt_no, stock_in, stock_out, balance_left, remarks) VALUES('$prodname','$date','$summary','$receiptno','$stockin','$stockout','$balance','$remarks')";
	
    echo $sql; 
	
   
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=fail");
    
	} 
	
    else {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=success");
    
	}  

}


?>