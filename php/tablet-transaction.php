<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;


    $id = $_POST["id"];
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date('Y-m-d', strtotime($receiptdate));   
    $receipt = $_POST["receipt"];
    $amount = $_POST["amount"];
    $english = $_POST["english"];
    $chinese = $_POST["chinese"]; 
    $remarks = $_POST["remarks"]; 

    $sql = "  
        INSERT INTO TABLET_Receipt(Tablet_id, receipt_num, receipt_date, receipt_amount, member_eng_name , member_chi_name, remarks)
        VALUES
        ('$id','$receipt','$receiptdate','$amount','$english','$chinese','$remarks')"; 
    //$result = $conn->query($sql);
    
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../transactions/create-tablet-transaction.php?name=transaction&aside=tablet-transaction&success=fail");
    } 
    else{
        header("Location: ../transactions/create-tablet-transaction.php?name=transaction&aside=tablet-transaction&success=success");
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
    $result = $conn->query($sql);
        header("Location: ../transactions/view-tablet.php?name=transaction&Id=$M_id");
    
   
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
    /*
    echo $sql; 
    $result = $conn->query($sql);
   
   header("Location: ../transactions/edit-tablet.php?name=transaction&Id=$id");

   */
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../transactions/view-tablet.php?name=transaction&Id=$M_id");
    } 
    else{
        header("Location: ../transactions/view-tablet.php?name=transaction&Id=$M_id");
    }  
}



?>