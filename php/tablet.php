<?php

include "../db/dbconnection.php"; 
$method = $_GET["method"];

if($method === "add")
{
    global $conn;
 
    $mid_sql = "SELECT EXISTS (SELECT * FROM TABLET WHERE tablet_id = '".$_POST['id']."') AS row";
    $result = $conn->query($mid_sql);  
    $row = mysqli_fetch_array($result); 
    if ($row['row'] == 0) { 
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $id = $_POST["id"];
        $installdate = str_replace('/', '-', $_POST['date']);
        $installdate = date('Y-m-d', strtotime($installdate));   
        $zone = $_POST["zone"];
        $tier = $_POST["tier"];
        $row = $_POST["row"];
        $price = $_POST["price"];
        $ancestor_english = $_POST["ancestor_english"];
        $ancestor_chinese = $_POST["ancestor_chinese"];
        $contact1 = $_POST["contact1"];
        $contact2 = $_POST["contact2"];
        $address = $_POST["address"];
        $payment = $_POST["payment"];
        $english = $_POST["english"];
        $chinese = $_POST["chinese"]; 
        $remarks = $_POST["remarks"];


        $sql = "  
            INSERT INTO TABLET(tablet_id, inst_date, tablet_zone, tablet_tier, tablet_row , price, ancestor_eng_name, ancestor_chi_name, contact_num1, contact_num2, address, payment_type, member_eng_name, member_chi_name, remarks, recordedBy , recordedOn)
            VALUES
            ('$id','$installdate','$zone','$tier','$row','$price','$ancestor_english','$ancestor_chinese','$contact1','$contact2','$address','$payment','$english','$chinese','$remarks', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')
        ";  
       
        if (mysqli_query($conn,$sql)) {
            header("Location: ../transactions/create-tablet.php?name=transaction&aside=create-tabletl&success=success&lang=".$_SESSION['lang']."");
        } 
    }
    else{
        header("Location: ../transactions/create-tablet.php?name=transaction&aside=create-tabletl&success=fail&lang=".$_SESSION['lang']."");
    }  

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
    $mid_sql = "SELECT EXISTS (SELECT * FROM TABLET_Receipt WHERE Tablet_id = '$id') AS row";
    $result = $conn->query($mid_sql);  
    $row = mysqli_fetch_array($result); 
    if($row['row'] == 0){

       $sql = "
            DELETE FROM tablet WHERE tablet_id = '$id'
        "; 
        if (mysqli_query($conn,$sql)) {
            header("Location: ../transactions/search-tablet.php?name=transaction&status=success&lang=".$_SESSION['lang']."");
        } 
    }
    else
        header("Location: ../transactions/search-tablet.php?name=transaction&status=fail&lang=".$_SESSION['lang']."");
    
   
}


if($method === "update")
{
    global $conn;


    $id = $_GET["Id"];
    $installdate = str_replace('/', '-', $_POST['date']);
    $installdate = date('Y-m-d', strtotime($installdate));   
    $zone = $_POST["zone"];
    $tier = $_POST["tier"];
    $row = $_POST["row"];
    $price = $_POST["price"];
    $ancestor_english = $_POST["ancestor_english"];
    $ancestor_chinese = $_POST["ancestor_chinese"];
    $contact1 = $_POST["contact1"];
    $contact2 = $_POST["contact2"];
    $address = $_POST["address"];
    $payment = $_POST["payment"];
    $english = $_POST["english"];
    $chinese = $_POST["chinese"]; 
    $remarks = $_POST["remarks"];
 
    $sql = "
        UPDATE tablet
        SET inst_date = '$installdate', tablet_zone = '$zone', tablet_tier = '$tier', tablet_row = '$row', price = '$price', ancestor_eng_name = '$ancestor_english', ancestor_chi_name = '$ancestor_chinese', contact_num1 = '$contact1', contact_num2 = '$contact2', address = '$address', payment_type = '$payment', member_eng_name = '$english', member_chi_name = '$chinese', remarks = '$remarks'
       WHERE tablet_id = '$id'
    
    ";
    if (mysqli_query($conn,$sql)) {
        header("Location: ../transactions/edit-tablet.php?name=transaction&Id=$id&status=success&lang=".$_SESSION['lang']."");
    } 
    else
        header("Location: ../transactions/edit-tablet.php?name=transaction&Id=$id&status=fail&lang=".$_SESSION['lang'].""); 

} 

if($method === "quick_export")
{ 
    include("../php/SimpleXLSXGen.php"); 
    
    $fields = array('TABLET ID', 'INSTALMENT DATE', 'ZONE', 'TIER', 'ROW', 'PRICE', 'ANCESTOR ENGLISH NAME', 'ANCESTOR CHINESE NAME', 'CONTACT NO 1', 'CONTACT NO 2','ADDRESS', 'MEMBER ENGLISH NAME', 'MEMBER CHINESE NAME',  'PAYMENT TYPE', 'REMARKS'); 
    $fileName = "tablet_data_" . date('Y-m-d') . ".xlsx"; 
    $excelData = array($fields);   
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    exit;  
}


?>