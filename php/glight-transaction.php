<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;  
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date("Y-m-d", strtotime($receiptdate));
    $sql = "INSERT INTO GLight_receipt (GLight_id, receipt_num, receipt_date , receipt_amount, remarks, member_id, username) VALUES ('".$_POST['id']."','".$_POST['receipt']."','".$receiptdate."','".$_POST['amount']."', '".$_POST['remarks']."' ,'".$_POST['member']."', 'admin')"; 
    $result = $conn->query($sql);
   
    header("Location: ../transactions/create-glight-transaction.php?name=transaction&aside=glight-transaction");

}

if($method === "delete")
{
    global $conn; 
   
    $id = $_GET["Id"];
    $sql = "DELETE FROM GLight_receipt WHERE GLight_id='".$_GET['Id']."' AND receipt_num='".$_GET['rNum']."' AND receipt_date='".$_GET['rDate']."'"; 

    $result = $conn->query($sql);
    header("Location: ../transactions/view-glight.php?name=transaction&Id=".$id.""); 
    
   
}


if($method === "update")
{
    global $conn;
  
    $id = $_GET["Id"];  
    $receipt_num = $_GET['rNum']; 
    $receipt_date = $_GET['rDate'];
 
    $date = str_replace('/', '-', $_POST['date']);
    $date = date("Y-m-d", strtotime($date));

    $sql = "UPDATE GLight_receipt SET GLight_id = '".$_POST['id']."', receipt_num = '".$_POST['receipt']."', receipt_date= '".$date."', receipt_amount= '".$_POST['amount']."', remarks= '".$_POST['remarks']."', member_id = '".$_POST['member']."' WHERE GLight_id = '".$id."' AND receipt_num = '".$receipt_num."' AND receipt_date = '".$receipt_date."'"; 
    $result = $conn->query($sql); 
    header("Location: ../transactions/view-glight.php?name=transaction&Id=".$id.""); 

}



?>