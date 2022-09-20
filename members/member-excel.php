<?php

include("../php/SimpleXLSXGen.php");

if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php'; 
    $fields = array_map('strtoupper', $_POST['checkbox']); 
    $checkbox = str_replace(" ", "_", $_POST['checkbox']) ;
    $check=implode(", ", $checkbox);
    $explodedata = explode(", ",$check);
    //print_r($explodedata);
    //print_r($check);    
    $excelData = array($fields);  

    $sql = "SELECT $check FROM member ORDER BY member_id ASC";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) { 
        foreach($res as $row){ 
            $rowdata = array();
            foreach($explodedata as $data){
                array_push($rowdata , $row[$data]);
            } 
            $excelData = array_merge($excelData, array($rowdata)); 
        }  
    }else{ 
        $excelData .= 'No records found...'. "\n"; 
    } 
    
    $fileName = "members-data_" . date('Y-m-d') . ".xlsx"; 
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system


    echo "<pre>";
    print_r($excelData); 
    exit;
     
}
// Load the database configuration file 
?>