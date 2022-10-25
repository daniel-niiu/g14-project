<?php 

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php");
    $sql = "SELECT * FROM tablet WHERE payment_type = 'over-time' ORDER BY tablet_id ASC";  
    
    $fields = array('TABLET ID', 'INSTALMENT DATE', 'ZONE', 'TIER', 'ROW', 'PRICE', 'ANCESTOR ENGLISH NAME', 'ANCESTOR CHINESE NAME', 'CONTACT NO 1', 'CONTACT NO 2','ADDRESS', 'MEMBER ENGLISH NAME', 'MEMBER CHINESE NAME',  'PAYMENT TYPE', 'REMARKS'); 
    $field_data = array('tablet_id','inst_date','tablet_zone','tablet_tier','tablet_row','price','ancestor_eng_name','ancestor_chi_name','contact_num1','contact_num2','address','member_eng_name','member_chi_name','payment_type','remarks');
    $fileName = "tablet_data_" . date('Y-m-d') . ".xlsx"; 
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
        header('Location: ../index.php?export=success');
    }else{ 
        header('Location: ../index.php?export=fail');
    }  
?>