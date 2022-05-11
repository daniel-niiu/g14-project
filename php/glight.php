<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    //'".date("Y-m-d h:i:s")."'
    $sql = "INSERT INTO GLight (GLight_id, member_eng_name, member_chi_name, contact_num, price, remarks) VALUES ('".$_POST['gl-id']."','".$_POST['english']."','".$_POST['chinese']."','".$_POST['contact']."','".$_POST['price']."','".$_POST['remarks']."' )";   
    
   
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date("Y-m-d", strtotime($receiptdate));
    $rsql = "INSERT INTO GLight_receipt (GLight_id, receipt_num, receipt_date , receipt_amount, username) VALUES ('".$_POST['gl-id']."','".$_POST['receipt']."','".$receiptdate."','".$_POST['amount']."', 'admin')";  
    //$rresult = $conn->query($rsql);
    //header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight"); 
    if ($result = $conn->query($sql) && $rresult = $conn->query($rsql)) { 
        header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight&success=success");
    } 
    else{ 
        header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight&success=fail");
    }
    
}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $ssql = "DELETE FROM GLight_Receipt  WHERE GLight_id='".$_GET['Id']."'"; 

    $sql = "DELETE FROM GLight WHERE GLight_id='".$_GET['Id']."'"; 

    $result = $conn->query($ssql);
    $rresult = $conn->query($sql);
    header("Location: ../transactions/search-glight.php?name=transaction&aside=search-glight");
    
   
}


if($method === "update")
{
    global $conn;
  
    $id = $_GET["Id"];  
 
    $sql = "UPDATE GLight SET contact_num = '".$_POST['contact']."', remarks= '".$_POST['remarks']."', price= '".$_POST['price']."', member_eng_name= '".$_POST['english']."', member_chi_name='".$_POST['chinese']."' WHERE GLight_id = '".$_GET['Id']."'";     
    

    $date = str_replace('/', '-', $_POST['date']);
    $date = date("Y-m-d", strtotime($date));
 
    $rsql = "UPDATE GLight_receipt SET receipt_num = '".$_POST['receipt']."', receipt_date= '".$date."', receipt_amount= '".$_POST['amount']."' WHERE GLight_id = '".$id."'";  
   

    if ($result = $conn->query($sql) &&  $rresult = $conn->query($rsql)) { 
        header("Location: ../transactions/edit-glight.php?name=transaction&Id=".$id."&method=update&success=success");
    } 
    else{ 
        header("Location: ../transactions/edit-glight.php?name=transaction&Id=".$id."&method=update&success=fail");
    }
     
}



?>