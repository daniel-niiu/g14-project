<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
	
    global $conn;

    $prodname = $_POST["search"];  
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO STOCKOUT(product_name, reciept_date, stock_summary, receipt_no, stock_out, balance_left, remarks, recordedBy, recordedOn) VALUES('$prodname','$date','$summary','$receiptno','$stockout','$balance','$remarks', '".$_SESSION['name']."', '".date("Y-m-d h:i:s")."')";  
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/stock-out.php?name=stock&aside=stock-out&success=fail");
    
	} 
	
    else {
		
        header("Location: ../stocks/stock-out.php?name=stock&aside=stock-out&success=success");
    
	}  

}

if($method === "edit")
{
	
    global $conn;
 
    $name = $_POST["name"];
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

   	$sql = "UPDATE STOCKOUT SET stock_summary = '$summary', stock_out = '$stockout', balance_left = '$balance', remarks = '$remarks', recordedBy = '".$_SESSION['name']."', recordedOn = '".date("Y-m-d h:i:s")."'
		WHERE product_name = '$name' AND receipt_no = '$receiptno' AND reciept_date = '$date'";  
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/view-stock-out.php?name=stock&name=$name");
    
	} 
	
    else {
		
        header("Location: ../stocks/view-stock-out.php?name=stock&name=$name");
    
	}  
	

}

if($method === "delete")
{
	
    global $conn;
 
	$name = $_GET['name']; 
	$receipt_No = $_GET['receiptNum']; 
	$receipt_Date = $_GET['receiptDate']; 

	$sql = "
	        DELETE FROM STOCKOUT WHERE product_name = '$name' AND receipt_no = '$receipt_No' AND reciept_date = '$receipt_Date'
	"; 
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/view-stock-out.php?name=stock&name=$name");
    
	} 
	
    else {
		
        header("Location: ../stocks/view-stock-out.php?name=stock&name=$name");
    
	}  
	

}
?>