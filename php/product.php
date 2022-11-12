<?php

include "../db/dbconnection.php";

$method = $_GET["method"];


date_default_timezone_set("Asia/Kuala_Lumpur");
if($method === "add")
{
    global $conn;


    $id = $_POST["id"];
    $status = $_POST["checkbox_value"];
	$english = $_POST["english"];
    $chinese = $_POST["chinese"];
	$price = $_POST["price"]; 
    $remarks = $_POST["remarks"];

    $sql = "  
        INSERT INTO PRODUCT(product_id, product_status, product_eng_name, product_chi_name, unit_price, remarks, recordedBy, recordedOn)
        VALUES
        ('$id','$status','$english','$chinese','$price','$remarks', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."')
    ";
    //echo $sql; 
    //$result = $conn->query($sql);
   
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../products/create-product.php?name=product&aside=create-product&success=fail");
    } 
    else{
        header("Location: ../products/create-product.php?name=product&aside=create-product&success=success");
    }  

} 

if($method === "update")
{
    global $conn;

	$id = $_GET["Id"];
    $status = $_POST['checkbox_value'];
	$english = $_POST["english"];
    $chinese = $_POST["chinese"];
	$price = $_POST["price"]; 
    $remarks = $_POST["remarks"];
 
    $sql = "
        UPDATE product
        SET product_status = '$status', product_eng_name = '$english', product_chi_name = '$chinese', unit_price = '$price', remarks = '$remarks', recordedBy = '".$_SESSION['name']."', recordedOn = '".date("Y-m-d h:i:s")."'
       WHERE product_id = '$id'
    
    "; 
   
    if (mysqli_query($conn,$sql)) {
        header("Location: ../products/edit-product.php?name=product&Id=$id&status=success&lang=".$_SESSION['lang']."");
    } 
    else{
        header("Location: ../products/edit-product.php?name=product&Id=$id&status=success&lang=".$_SESSION['lang']."");
    } 

}


if($method === "quick_export")
{ 
    include("../php/SimpleXLSXGen.php"); 
    
    $fields = array('PRODUCT ID', 'PRODUCT STATUS', 'PRODUCT ENG NAME', 'PRODUCT CHI NAME', 'UNIT PRICE', 'REMARKS');   
    $fileName = "product_data_" . date('Y-m-d') . ".xlsx"; 
    $excelData = array($fields);   
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    exit;  
}



?>