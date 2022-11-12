<?php

//import.php
include_once '../db/dbconnection.php';
include '../../phpspreadsheet/vendor/autoload.php';
 

date_default_timezone_set("Asia/Kuala_Lumpur");

if($_FILES["excel"]["name"] != '')
{
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES["excel"]["name"]);
    $file_extension = end($file_array);
    if(in_array($file_extension, $allowed_extension))
    {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();
        //print_r($data); 
        $header = "";
        $i=0;
        $product_data = "product_id, product_status, product_eng_name, product_chi_name, unit_price, remarks, recordedBy, recordedOn"; 

        $insert_product_data = ""; 

        foreach($data as $row)
        {  
            if($i!=0){ 
                $insert_product_data = "'$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."'"; 
                echo $query="INSERT INTO product(".$product_data.") values (".$insert_product_data.");"; 
                
                mysqli_query($conn,$query); 
            } 
            $i++;
        } 
        header("Location: create-product.php?name=product&aside=create-product&lang=".$_SESSION['lang']."&import_status=success");
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';
    }
    else
    {
        header("Location: create-product.php?name=product&aside=create-product&lang=".$_SESSION['lang']."&import_status=fail");
    }
}
else
{
    header("Location: create-product.php?name=product&aside=create-product&lang=".$_SESSION['lang']."&import_status=fail");
}

//echo $message;


?>
