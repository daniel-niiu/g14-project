<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
	
    global $conn;
 
	$prodname = explode("-", $_POST["search"]); //array [0] - product ID, array [1] product english name, array [2] product chinese name
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockin = $_POST["stock-in"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

    $sql = "INSERT INTO STOCKIN(product_name, reciept_date, stock_summary, receipt_no, stock_in, balance_left, remarks, recordedBy, recordedOn) VALUES('$prodname[1]','$date','$summary','$receiptno','$stockin','$balance','$remarks', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')";  
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=fail");
    
	} 
	
    else {
		
        header("Location: ../stocks/stock-in.php?name=stock&aside=stock-in&success=success");
    
	}  


}

if($method === "edit")
{
	
    global $conn;
 
    $name = $_POST["name"];
    $date = $_POST["date"];
	$summary = $_POST["summary"];
    $receiptno = $_POST["receipt"];
	$stockin = $_POST["stock-in"];
	$balance = $_POST["balance"];
    $remarks = $_POST["remarks"];

   	$sql = "UPDATE STOCKIN SET stock_summary = '$summary', stock_in = '$stockin', balance_left = '$balance', remarks = '$remarks', recordedBy = '".$_SESSION['name']."', recordedOn = '".date("Y-m-d h:i:s")."'
		WHERE product_name = '$name' AND receipt_no = '$receiptno' AND reciept_date = '$date'";  
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/view-stock-in.php?name=stock&name=$name");
    
	} 
	
    else {
		
        header("Location: ../stocks/view-stock-in.php?name=stock&name=$name");
    
	}  
	

}

if($method === "delete")
{
	
    global $conn;
 
	$name = $_GET['name']; 
	$receipt_No = $_GET['receiptNum']; 
	$receipt_Date = $_GET['receiptDate']; 

	$sql = "
	        DELETE FROM STOCKIN WHERE product_name = '$name' AND receipt_no = '$receipt_No' AND reciept_date = '$receipt_Date'
	"; 
	
    if (!mysqli_query($conn,$sql)) {
		
        header("Location: ../stocks/view-stock-in.php?name=stock&name=$name");
    
	} 
	
    else {
		
        header("Location: ../stocks/view-stock-in.php?name=stock&name=$name");
    
	}  
	

}
?>