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
        $stock_data = "product_name, reciept_date, stock_summary, receipt_no, stock_in, balance_left , remarks , recordedBy, recordedOn";
        $insert_stock_data = ""; 

        foreach($data as $row)
        { 
            $q="";
            if($i!=0){  
                $row[1] = str_replace('/', '-', $row[1]);
                $date = date('Y-m-d',strtotime($row[1])); 
                $insert_stock_data = "'$row[0]', '$date', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."'";  

                $query="INSERT INTO stockin(".$stock_data.") values (".$insert_stock_data.");"; 
                
                mysqli_query($conn,$query); 
            } 
            $i++;
        } 
        header("Location: stock-in.php?name=stock&aside=stock-in&lang=".$_SESSION['lang']."&import_status=success");
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';
        //header("Location: create-glight.php?name=transaction&aside=create-glight");
    }
    else
    {
        $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
    }
}
else
{
    $message = '<div class="alert alert-danger">Please Select File</div>';
}

//echo $message;


?>
