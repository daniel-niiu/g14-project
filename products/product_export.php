<?php  
    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php"); 

    $query = "";
    $fields = "";  
    $fileName = "";

    // Column names   

    $fields = array('PRODUCT ID', 'PRODUCT STATUS', 'PRODUCT ENG NAME', 'PRODUCT CHI NAME', 'UNIT PRICE', 'REMARKS');   
    $sql = "SELECT * FROM product ORDER BY product_id ASC";  

    $fileName = "product_data_" . date('Y-m-d') . ".xlsx";   
    $field_data = array('product_id', 'product_status', 'product_eng_name', 'product_chi_name', 'unit_price', 'remarks');
    $excelData = array($fields);  
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) { 
        foreach($res as $row){ 
            $rowdata = array();
            foreach($field_data as $data){
                array_push($rowdata , $row[$data]);
            } 
            $excelData = array_merge($excelData, array($rowdata)); 
        }   
        $xlsx = SimpleXLSXGen::fromArray($excelData);
        $xlsx->downloadAs($fileName); // This will download the file to your local system 
        exit; 
        header('Location: create-product.php?name=product&aside=create-product&export=success&lang='.$_SESSION['lang']);
    }else{ 
        header('Location: create-product.php?name=product&aside=create-product&export=fail&lang='.$_SESSION['lang']);
    }    
// Load the database configuration file 
?>