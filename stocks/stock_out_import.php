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
        $stock_data = "product_name, reciept_date, stock_summary, receipt_no, stock_out, balance_left , remarks , recordedBy, recordedOn";
        $insert_stock_data = ""; 

        foreach($data as $row)
        {  
            if($i!=0){    
                $date = str_replace('/', '-', $row[1]); 
                $date = explode("-", $date);
                $date = $date[2].'-'.$date[0].'-'.$date[1]; 
                $query="SELECT product_name,reciept_date,receipt_no FROM stockout WHERE product_name = '".$row[0]."' AND reciept_date = '".$date."' AND receipt_no = '".$row[3]."'"; 
                $result = mysqli_query($conn,$query); 
                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        $non_empty_array[] = $row['product_name'].",".$row['reciept_date'].",".$row['receipt_no'];
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
                $var .= $data."<br>"; 
            }
            $var = rtrim($var, "<br>"); 
            $_SESSION['duplicated_data'] = $var;
            header("Location: stock-out.php?name=stock&aside=stock-out&lang=".$_SESSION['lang']."&import_status=fail");
        }
        else
        {
            foreach($data as $row)
            { 
                $q="";
                if($i!=0){  
                    $date = str_replace('/', '-', $row[1]); 
                    $date = explode("-", $date);
                    $date = $date[2].'-'.$date[0].'-'.$date[1]; 
                    $insert_stock_data = "'$row[0]', '$date', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '".$_SESSION['name']."', '".date("Y-m-d H:i:s")."'";  

                    $query="INSERT INTO stockout(".$stock_data.") values (".$insert_stock_data.");";  
                    mysqli_query($conn,$query); 
                } 
                $i++;
                } 
            header("Location: stock-out.php?name=stock&aside=stock-out&lang=".$_SESSION['lang']."&import_status=success"); 
        }
        //header("Location: create-glight.php?name=transaction&aside=create-glight");
    }
    else
    {
        $_SESSION['duplicated_data'] = "";
        header("Location: stock-out.php?name=stock&aside=stock-out&lang=".$_SESSION['lang']."&import_status=fail"); 
    }
}
else
{
        $_SESSION['duplicated_data'] = "";
        header("Location: stock-out.php?name=stock&aside=stock-out&lang=".$_SESSION['lang']."&import_status=fail");
}

//echo $message;


?>
