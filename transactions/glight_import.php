<?php

//import.php
include_once '../db/dbconnection.php';
include '../../phpspreadsheet/vendor/autoload.php';
 

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
        $Glight_data = "GLight_id, member_eng_name, member_chi_name, price, contact_num, remarks";
        $Glight_receipt_data = "GLight_id, receipt_num, receipt_date, receipt_amount";

        $insert_glight_data = "";
        $insert_receipt_data = "";

        foreach($data as $row)
        { 
            $q="";
            if($i!=0){ 
                $insert_glight_data = "'$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]'"; 
                $row[6] = str_replace('/', '-', $row[6]);
                $date = date('Y-m-d',strtotime($row[6]));
                echo $row[6] , " ", $date;
                $insert_receipt_data = "'$row[0]', '$row[7]', '$date', '$row[8]'";  

                $query="INSERT INTO glight(".$Glight_data.") values (".$insert_glight_data.");";
                $qquery="INSERT INTO glight_receipt(".$Glight_receipt_data.") values (".$insert_receipt_data.");";    
                
                //mysqli_query($conn,$query);
                //mysqli_query($conn,$qquery);
            } 
            $i++;
        } 
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
