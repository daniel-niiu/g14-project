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
        foreach($data as $row)
        { 
            $q="";
            foreach ($row as $key => $cell) { 

                if($i!=0){ 
                    if ($cell == $row[8]){  
                        //9/17/2022
                        $date = explode("/", $cell);
                        $row[8] = $date[1]."/".$date[0]."/".$date[2];
                        $row[8] = str_replace('/', '-', $row[8]);
                        $date = date('Y-m-d',strtotime($row[8])); 
                        $q .="'".$date."',"; 
                    }
                    else
                    
                        $q.="'".$cell. "',";
                }
                else{ 
                    $header = "BLantern_id, member_eng_name, member_chi_name, contact_num, blessing_price, votive_price, breceipt_num, vreceipt_num, receipt_date, price, remarks";
                }
            } 
            if($i != 0){
                //date
                $qquery="INSERT INTO blantern(".$header.") values (".rtrim($q,",").");";  
                mysqli_query($conn,$qquery);
            } 
            $i++;
        } 
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';
        header("Location: create-blantern.php?name=member&aside=create-member");
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
