<?php 
include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    date_default_timezone_set("Asia/Kuala_Lumpur");
    global $conn;
    $mid_sql = "SELECT EXISTS (SELECT * FROM BLantern WHERE BLantern_id = '".$_POST['id']."') AS row";
    $result = $conn->query($mid_sql);   
    $row = mysqli_fetch_array($result); 
    if ($row['row'] == 0) { 
        $receiptdate = str_replace('/', '-', $_POST['date']);
        $receiptdate = date("Y-m-d", strtotime($receiptdate));
        $sql = "INSERT INTO BLantern(BLantern_id, member_eng_name, member_chi_name, contact_num, blessing_price, votive_price, breceipt_num, vreceipt_num,     receipt_date, price, remarks, recordedBy , recordedOn) VALUES ('".$_POST['id']."','".$_POST['english']."','".$_POST['chinese']."','".$_POST['contact']."','".$_POST['blessing_price']."','".$_POST['votive_price']."','".$_POST['blessing_receipt']."','".$_POST['votive_receipt']."','".$receiptdate."','".$_POST['amount']."','".$_POST['remarks']."', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')";  
        if (mysqli_query($conn,$sql)) {
            header("Location: ../transactions/create-blantern.php?name=transaction&aside=create-blantern&success=success&lang=".$_SESSION['lang']."");
        } 
    }
    else{
        header("Location: ../transactions/create-blantern.php?name=transaction&aside=create-blantern&success=fail&lang=".$_SESSION['lang']."");
    }
    

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $mid_sql = "SELECT EXISTS (SELECT * FROM BLantern WHERE BLantern_id = '$id') AS row";
    $result = $conn->query($mid_sql);  
    $row = mysqli_fetch_array($result); 
    if($row['row'] == 0){ 
        header("Location: ../transactions/search-blantern.php?name=transaction&aside=search-blantern&status=fail&lang=".$_SESSION['lang']."");
    }
    else 
    {

        $sql = "DELETE FROM BLantern WHERE BLantern_id ='".$_GET['Id']."'"; 

        $result = $conn->query($sql);
        header("Location: ../transactions/search-blantern.php?name=transaction&aside=search-blantern&status=success&lang=".$_SESSION['lang']."");
    }
}


if($method === "update")
{
    global $conn;
 
    //$date = new DateTime(date("d-m-Y", strtotime($_POST['dob')); 
    $id = $_GET["Id"];
    $receiptdate = str_replace('/', '-', $_POST['date']);
    $receiptdate = date("Y-m-d", strtotime($receiptdate));  

    $sql = "UPDATE BLantern SET  member_eng_name = '".$_POST['english']."', member_chi_name = '".$_POST['chinese']."', contact_num = '".$_POST['contact']."', blessing_price= '".$_POST['blessing_price']."', votive_price= '".$_POST['votive_price']."', breceipt_num = '".$_POST['blessing_receipt']."', vreceipt_num = '".$_POST['votive_receipt']."', receipt_date = '".$receiptdate."', price = '".$_POST['amount']."', remarks = '".$_POST['remarks']."' WHERE BLantern_id = '".$id."'";   
    $result = $conn->query($sql);
    header("Location: ../transactions/edit-blantern.php?name=transaction&Id=".$id."&method=update&status=success&lang=".$_SESSION['lang']."");

}



?>