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
        ('$id','$status','$english','$chinese','$price','$remarks', '".$_SESSION['username']."', '".date("Y-m-d h:i:s")."')
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

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
   $sql = "
        DELETE FROM product WHERE product_id = '$id'
    ";
    $result = $conn->query($sql);
    header("Location: ../products/search-product.php?name=product&aside=search-product");
    
   
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
        SET product_status = '$status', product_eng_name = '$english', product_chi_name = '$chinese', unit_price = '$price', remarks = '$remarks', recordedBy = '".$_SESSION['username']."', recordedOn = '".date("Y-m-d h:i:s")."'
       WHERE product_id = '$id'
    
    ";
    $result = $conn->query($sql);
   
   header("Location: ../products/edit-product.php?name=product&Id=$id");

}



?>