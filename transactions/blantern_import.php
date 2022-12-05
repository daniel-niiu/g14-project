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
        $header = "BLantern_id, member_eng_name, member_chi_name, contact_num, blessing_price, votive_price, breceipt_num, vreceipt_num, receipt_date, price, remarks, recordedBy, recordedOn";
        $i=0;
        foreach($data as $row)
        {  
            if($i!=0){   
                $query="SELECT BLantern_id FROM blantern WHERE BLantern_id = '".$row[0]."'"; 
                $result = mysqli_query($conn,$query); 
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        $non_empty_array[] = $row['BLantern_id'];
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
            header("Location: create-blantern.php?name=transaction&aside=create-blantern&lang=".$_SESSION['lang']."&import=fail");
        }
        else
        { 
            $i=0;
            foreach($data as $row)
            { 
                $q=""; 
                if($i!=0){    
                    $sd = explode('/',$row[8]);
                    $date = $sd[2].'-'.$sd[0].'-'.$sd[1]; 
                    $insert_blantern_data = "'$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]','$row[7]', '$date', '$row[9]', '$row[10]', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."'";  
                    //date
                    $qquery="INSERT INTO blantern(".$header.") values (".$insert_blantern_data.");";  
                    mysqli_query($conn,$qquery);
                }  
                $i++;
            } 
            $message = '<div class="alert alert-success">Data Imported Successfully</div>';
            header("Location: create-blantern.php?name=transaction&aside=create-blantern&lang=".$_SESSION['lang']."&import=success");
        }
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
