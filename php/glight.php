<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $sql = "INSERT INTO GLight (GLight_id, member_id, contact_num, price, remarks, createdOnDateTime) VALUES ('".$_POST['gl-id']."','".$_POST['member']."','".$_POST['contact']."','".$_POST['price']."','".$_POST['remarks']."', '".date("Y-m-d h:i:s")."')";   
    $result = $conn->query($sql);
   
    header("Location: ../transactions/create-glight.php?name=transaction&aside=create-glight");

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $sql = "DELETE FROM GLight WHERE GLight_id='".$_GET['Id']."'"; 

    $result = $conn->query($sql);
    header("Location: ../transactions/search-glight.php?name=transaction&aside=search-glight");
    
   
}


if($method === "update")
{
    global $conn;
  
    $id = $_GET["Id"];  

    $sql = "UPDATE GLight SET contact_num = '".$_POST['contact']."', remarks= '".$_POST['remarks']."', price= '".$_POST['price']."', member_id= '".$_POST['member']."' WHERE GLight_id = '".$_GET['Id']."'";    
    $result = $conn->query($sql); 
    header("Location: ../transactions/edit-glight.php?name=transaction&Id=".$id."&method=update"); 

}



?>