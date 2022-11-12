<?php

include "../db/dbconnection.php";
 
$method = $_GET["method"];

if($method === "add")
{
    global $conn;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $mid_sql = "SELECT EXISTS (SELECT * FROM GLight WHERE GLight_id = '".$_POST['gl-id']."') AS row";
    $check_result = $conn->query($mid_sql);   
    $row = mysqli_fetch_array($check_result); 
    if ($row['row'] == 0) { 
        $sql = "INSERT INTO GLight (GLight_id, member_eng_name, member_chi_name, contact_num, price, remarks) VALUES ('".$_POST['gl-id']."','".$_POST['english']."','".$_POST['chinese']."','".$_POST['contact']."','".$_POST['price']."','".$_POST['remarks']."')";   
        
       
        $receiptdate = str_replace('/', '-', $_POST['date']);
        $receiptdate = date("Y-m-d", strtotime($receiptdate));
        $rsql = "INSERT INTO GLight_receipt (GLight_id, receipt_num, receipt_date , receipt_amount, recordedBy , recordedOn) VALUES ('".$_POST['gl-id']."','".$_POST['receipt']."','".$receiptdate."','".$_POST['amount']."', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')";  
        //$rresult = $conn->query($rsql);
        //header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight"); 
        if ($result = $conn->query($sql) && $rresult = $conn->query($rsql)) { 
            header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight&success=success&lang=".$_SESSION['lang']."");
        } 
    }
    else{ 
        header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight&success=fail&lang=".$_SESSION['lang']."");
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
    header("Location: ../transactions/search-glight.php?name=transaction&aside=search-glight&status=success&lang=".$_SESSION['lang']."");
    
   
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
        header("Location: ../transactions/edit-glight.php?name=transaction&Id=".$id."&method=update&status=success&lang=".$_SESSION['lang']."");
    } 
    else{ 
        header("Location: ../transactions/edit-glight.php?name=transaction&Id=".$id."&method=update&status=fail&lang=".$_SESSION['lang']."");
    }
     
}


if($method === "quick_export")
{ 
    include("../php/SimpleXLSXGen.php"); 
    
    $fields = array('GLIGHT ID', 'MEMBER ENG NAME', 'MEMBER CHI NAME', 'PRICE', 'CONTACT NUM' , 'RECEIPT NUM', 'RECEIPT DATE', 'RECEIPT AMOUNT', 'REMARKS'); 

    $fileName = "glight_data_" . date('Y-m-d') . ".xlsx"; 
    $excelData = array($fields);   
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    exit;  
}

?>