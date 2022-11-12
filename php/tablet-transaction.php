<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn; 

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $id = $_POST["id"];
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date('Y-m-d', strtotime($receiptdate));   
    $receipt = $_POST["receipt"];
    $amount = $_POST["amount"];
    $english = $_POST["english"];
    $chinese = $_POST["chinese"]; 
    $remarks = $_POST["remarks"]; 

    $mid_sql = "SELECT EXISTS (SELECT * FROM TABLET_Receipt WHERE Tablet_id = '$id' AND receipt_date  = '$receiptdate' AND receipt_num = '$receipt') AS row";
    $result = $conn->query($mid_sql);  
    $row = mysqli_fetch_array($result); 
    if($row['row'] == 0){

        $sql = "  
            INSERT INTO TABLET_Receipt(Tablet_id, receipt_num, receipt_date, receipt_amount, member_eng_name , member_chi_name, remarks, recordedBy , recordedOn)
            VALUES
            ('$id','$receipt','$receiptdate','$amount','$english','$chinese','$remarks', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')";  
        if (mysqli_query($conn,$sql)) {
            header("Location: ../transactions/create-tablet-transaction.php?name=transaction&Id=$id&aside=tablet-transaction&success=success&lang=".$_SESSION['lang']."");
        } 
    }
    else{
        header("Location: ../transactions/create-tablet-transaction.php?name=transaction&Id=$id&aside=tablet-transaction&success=fail&lang=".$_SESSION['lang']."");
    }  

}

if($method === "delete")
{
    global $conn;

    $M_id= $_GET["Id"];
    $rNum = $_GET['receiptNum'];
    $rDate = $_GET['receiptDate'];
   
   $sql = "
        DELETE FROM TABLET_Receipt WHERE Tablet_id = '$M_id' AND receipt_num = '$rNum' AND receipt_date = '$rDate'
    "; 
    if (mysqli_query($conn,$sql)) {
        header("Location: ../transactions/view-tablet.php?name=transaction&Id=$M_id&status=success&lang=".$_SESSION['lang']."");
    }
    else
        header("Location: ../transactions/view-tablet.php?name=transaction&Id=$M_id&status=fail&lang=".$_SESSION['lang']."");
}


if($method === "update")
{
    global $conn;


    $M_id= $_GET["Id"];
    $rNum = $_GET['receiptNum'];
    $rDate = $_GET['receiptDate'];

    $id = $_POST["id"];
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date('Y-m-d', strtotime($receiptdate));   
    $receipt = $_POST["receipt"];
    $amount = $_POST["amount"];
    $english = $_POST["english"];
    $chinese = $_POST["chinese"]; 
    $remarks = $_POST["remarks"]; 
  
    $sql = "
        UPDATE TABLET_Receipt
        SET receipt_num = '$receipt', receipt_date = '$receiptdate', receipt_amount = '$amount', member_eng_name = '$english', member_chi_name = '$chinese', remarks = '$remarks'
       WHERE Tablet_id = '$M_id' AND receipt_num = '$rNum' AND receipt_date = '$rDate'
    
    "; 
    if (mysqli_query($conn,$sql)) {
        header("Location: ../transactions/edit-tablet-transaction.php?name=transaction&Id=$M_id&receiptNum=$rNum&receiptDate=$rDate&status=success&lang=".$_SESSION['lang']."");
    } 
    else{
        header("Location: ../transactions/edit-tablet-transaction.php?name=transaction&Id=$M_id&receiptNum=$rNum&receiptDate=$rDate&status=fail&lang=".$_SESSION['lang']."");
    }  
}
 
if($method === "quick_export")
{ 
    include("../php/SimpleXLSXGen.php"); 
    
    $fields = array('TABLET ID', 'RECEIPT NO', 'RECEIPT DATE', 'RECEIPT AMOUNT', 'MEMBER ENGLISH NAME', 'MEMBER CHINESE NAME', 'REMARKS');

    $fileName = "tablet_transaction_data_" . date('Y-m-d') . ".xlsx"; 
    $excelData = array($fields);   
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    exit;  
}


?>