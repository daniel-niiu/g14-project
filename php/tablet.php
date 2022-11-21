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
    
    $fields = array('莲座编号/TABLET ID(e.g T123)', '安座日期/INSTALMENT DATE(e.g 20/05/1990)', '区号/ZONE(e.g 1)', '层次/TIER(e.g 1)', '编号/ROW(e.g 1)', '总额/PRICE(e.g 11)', '逝者英文姓名/ANCESTOR ENGLISH NAME(e.g John Doe)', '逝者华文姓名/ANCESTOR CHINESE NAME(e.g 约翰)', '主要联络号码/CONTACT NO 1(e.g 0108889999)', '次要联络号码/CONTACT NO 2(e.g 0108889999)','地址/ADDRESS(e.g 46, Jalan Sia)','英文姓名/MEMBER ENGLISH NAME(e.g John Doe)', '华文姓名/MEMBER CHINESE NAME(e.g 约翰)',  '付费类型/PAYMENT TYPE(e.g over-time/lump-sum)', '备注/REMARKS'); 
    $fileName = "tablet_template_" . date('Y-m-d') . ".xlsx"; 
    $excelData = array($fields);   
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    exit;  
}


?>