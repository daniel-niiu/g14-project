<?php
error_reporting(0);
if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php");
    $period = $_POST['period'];
    $period_details = $_POST['period-details'];

    $query = "";
    $fields = ""; 
    // Excel file name for download 
    $fileName = "";

    // Column names  
    $fields = array('BLANTERN ID', 'MEMBER ENG NAME', 'MEMBER CHI NAME', 'CONTACT NO', 'BLESSING PRICE', 'VOTIVE PRICE', 'BRECEIPT NUM', 'VRECEIPT NUM', 'RECEIPT DATE', 'PRICE', 'REMARKS');    
    $sql = "SELECT * FROM blantern ORDER BY BLantern_id ASC";  
    $fileName = "blantern_data_" . date('Y-m-d') . ".xlsx";  

    $field_data = array('BLantern_id', 'member_eng_name', 'member_chi_name', 'contact_num', 'blessing_price', 'votive_price', 'breceipt_num', 'vreceipt_num', 'receipt_date', 'price', 'remarks');
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
    }else{ 
        $excelData .= 'No records found...'. "\n"; 
    }   
     
    $xlsx = SimpleXLSXGen::fromArray($excelData);
    $xlsx->downloadAs($fileName); // This will download the file to your local system 
    
    echo "<pre>"; 
    exit;
    print_r($excelData);
}
// Load the database configuration file 
?>