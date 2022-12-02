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
        $Glight_data = "GLight_id, member_eng_name, member_chi_name, price, contact_num, remarks";
        $Glight_receipt_data = "GLight_id, receipt_num, receipt_date, receipt_amount, recordedBy, recordedOn";

        $insert_glight_data = "";
        $insert_receipt_data = "";
        foreach($data as $row)
        {  
            if($i!=0){   
                $query="SELECT GLight_id FROM glight WHERE GLight_id = '".$row[0]."'"; 
                $result = mysqli_query($conn,$query); 
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        $non_empty_array[] = $row['GLight_id'];
                    }
                }
            } 
            $i++;
        }  
        if(!empty($non_empty_array))
        {
            $var = "";
            $a = 1;
            foreach($non_empty_array as $data)
            {
                if($a % 4 == 0)
                    $var .= $data.",<br>";
                else
                    $var .= $data.",";
                $a++;
            }
            $var = rtrim($var, ",<br>");
            $var = rtrim($var, ",");
            $_SESSION['duplicated_data'] = $var;
            header("Location: create-glight.php?name=transaction&aside=create-glight&lang=".$_SESSION['lang']."&import=fail");
        }
        else
        {
            foreach($data as $row)
            { 
                $q="";
                if($i!=0){ 
                    $insert_glight_data = "'$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[8]'"; 
                    $row[6] = str_replace('/', '-', $row[6]);
                    $date = date('Y-m-d',strtotime($row[6])); 
                    $insert_receipt_data = "'$row[0]', '$row[5]', '$date', '$row[7]', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."'";  

                    $query="INSERT INTO glight(".$Glight_data.") values (".$insert_glight_data.");";
                    $qquery="INSERT INTO glight_receipt(".$Glight_receipt_data.") values (".$insert_receipt_data.");";    
                    
                    mysqli_query($conn,$query);
                    mysqli_query($conn,$qquery);
                } 
                $i++;
            } 
            header("Location: create-glight.php?name=transaction&aside=create-glight&lang=".$_SESSION['lang']."&import=success");
        } 
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
