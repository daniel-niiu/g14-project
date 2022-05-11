<?php 
include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;
    //print_r($_POST['checkbox']); 
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date("Y-m-d", strtotime($receiptdate));
    $sql = "INSERT INTO BLantern(BLantern_id, member_eng_name, member_chi_name, contact_num, blessing_price, votive_price, breceipt_num, vreceipt_num,     receipt_date, price, remarks) VALUES ('".$_POST['id']."','".$_POST['english']."','".$_POST['chinese']."','".$_POST['contact']."','".$_POST['blessing_price']."','".$_POST['votive_price']."','".$_POST['blessing_receipt']."','".$_POST['votive_receipt']."','".$receiptdate."','".$_POST['amount']."','".$_POST['remarks']."')";  
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../transactions/create-blantern.php?name=transaction&aside=create-blantern&success=fail");
    } 
    else{
        header("Location: ../transactions/create-blantern.php?name=transaction&aside=create-blantern&success=success");
    }
    

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $sql = "DELETE FROM BLantern WHERE BLantern_id ='".$_GET['Id']."'"; 

    $result = $conn->query($sql);
    header("Location: ../transactions/search-blantern.php?name=transaction&aside=search-blantern");
    
   
}


if($method === "update")
{
    global $conn;
 
    //$date = new DateTime(date("d-m-Y", strtotime($_POST['dob')); 
    $id = $_GET["Id"];
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date("Y-m-d", strtotime($receiptdate));  

    $sql = "UPDATE BLantern SET BLantern_id = '".$_POST['id']."', member_eng_name = '".$_POST['english']."', member_chi_name = '".$_POST['chinese']."', contact_num = '".$_POST['contact']."', blessing_price= '".$_POST['blessing_price']."', votive_price= '".$_POST['votive_price']."', breceipt_num = '".$_POST['blessing_receipt']."', vreceipt_num = '".$_POST['votive_receipt']."', receipt_date = '".$receiptdate."', price = '".$_POST['amount']."', remarks = '".$_POST['remarks']."' WHERE BLantern_id = '".$_GET['Id']."'";   
    $result = $conn->query($sql);
    header("Location: ../transactions/edit-blantern.php?name=member&Id=".$_POST['id']."&method=update");

}



?>