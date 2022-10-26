<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
	date_default_timezone_set("Asia/Kuala_Lumpur"); 
    global $conn;

	$prodname = explode("-", $_POST["search"]); //array [0] - product ID, array [1] product english name, array [2] product chinese name 
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO STOCKOUT(product_name, reciept_date, stock_summary, receipt_no, stock_out, balance_left, remarks, recordedBy, recordedOn) VALUES('$prodname[1]','$date','$summary','$receiptno','$stockout','$balance','$remarks', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')";  
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
 
    $name = $_POST["pName"]; 
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockout = $_POST["stock-out"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

   	$sql = "UPDATE STOCKOUT SET stock_summary = '$summary', stock_out = '$stockout', balance_left = '$balance', remarks = '$remarks'
		WHERE product_name = '$name' AND receipt_no = '$receiptno' AND reciept_date = '$date'";  
	
    if (mysqli_query($conn,$sql)) { 
        header("Location: ../stocks/view-stock-out.php?name=stock&productName=$name&receiptNum=$receiptno&receiptDate=$date&status=success");
    
	} 
	
    else {
		
        header("Location: ../stocks/view-stock-out.php?name=stock&productName=$name&receiptNum=$receiptno&receiptDate=$date&status=fail");
    
	}  
	

}

if($method === "delete")
{
	
    global $conn; 
 	$id = $_GET['Id'];
	$name = $_GET['productName']; 
	$receipt_No = $_GET['receiptNum']; 
	$receipt_Date = $_GET['receiptDate']; 

	$sql = "
	        DELETE FROM STOCKOUT WHERE product_name = '$name' AND receipt_no = '$receipt_No' AND reciept_date = '$receipt_Date'
	"; 
	
    if (mysqli_query($conn,$sql)) { 
        header("Location: ../products/view-product.php?name=product&productName=$name&Id=$id&delete_status=success");  
	} 
	
    else { 
        header("Location: ../products/view-product.php?name=product&productName=$name&Id=$id&delete_status=fail");  
	}  
	

}
?>