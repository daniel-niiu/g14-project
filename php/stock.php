<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
	
    global $conn;

    $prodname = $_POST["search"];  
	$prodID = explode("-", $prodname);
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockin = $_POST["stock-in"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO STOCK(product_id, stock_date, stock_summary, receipt_no, stock_in, stock_out, balance_left, remarks, recordedBy, recordedOn) VALUES('$prodID[0]','$date','$summary','$receiptno','$stockin','$stockout','$balance','$remarks', '".$_SESSION['name']."', '".date("Y-m-d h:i:s")."')";  
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=fail");
    
	} 
	
    else {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=success");
    
	}  

}

if($method === "update")
{
	
    global $conn;
 
	$name = $_POST["name"];  
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockin = $_POST["stock-in"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

   	$sql = "UPDATE STOCK SET stock_summary = '$summary', stock_in = '$stockin', balance_left = '$balance', remarks = '$remarks', recordedBy = '".$_SESSION['name']."', recordedOn = '".date("Y-m-d h:i:s")."'
		WHERE product_name = '$name' AND receipt_no = '$receiptno' AND stock_date = '$date'";  
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../products/view-stock.php?name=stockin&name=$name");
    
	} 
	
    else {
		
        header("Location: ../products/view-stock.php?name=stockin&name=$name");
    
	}  
	

}

if($method === "delete")
{
	
    global $conn;
 
	$ID = $_GET['ID']; 
	$receipt_No = $_GET['receiptNum']; 
	$receipt_Date = $_GET['receiptDate']; 

	$sql = "
	        DELETE FROM STOCK WHERE product_id = '$ID' AND receipt_no = '$receipt_No' AND stock_date = '$receipt_Date'
	"; 
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../products/view-product.php?name=product&Id=$ID");
    
	} 
	
    else {
		
        header("Location: ../products/view-product.php?name=product&Id=$ID");
    
	}  
	

}
?>