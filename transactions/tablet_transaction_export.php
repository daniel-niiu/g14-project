<?php 
if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php");

    $export_type = $_POST['export-type']; 

    $to_date = $_POST['tablet_to_date'];
    $from_date = $_POST['tablet_from_date'];

    $query = "";
    $fields = "";
    $field_data = "";
    //print_r($explodedata);
    //print_r($check);  
    // Filter the excel data  
    // Excel file name for download 
    $fileName = "";
    $sql = "";
    // Column names 
    if($export_type == "Memorial Tablet"){ 
        $fields = array('TABLET ID', 'INSTALMENT DATE', 'ZONE', 'TIER', 'ROW', 'PRICE', 'ANCESTOR ENGLISH NAME', 'ANCESTOR CHINESE NAME', 'CONTACT NO 1', 'CONTACT NO 2','ADDRESS', 'MEMBER ENGLISH NAME', 'MEMBER CHINESE NAME',  'PAYMENT TYPE', 'REMARKS'); 
        if($to_date != "" && $from_date != "")
            $sql = "SELECT * FROM tablet WHERE recordedOn BETWEEN '$from_date' AND '$to_date' ORDER BY tablet_id ASC";  
        else
            $sql = "SELECT * FROM tablet ORDER BY tablet_id ASC";  
        $field_data = array('tablet_id','inst_date','tablet_zone','tablet_tier','tablet_row','price','ancestor_eng_name','ancestor_chi_name','contact_num1','contact_num2','address','member_eng_name','member_chi_name','payment_type','remarks');
        $fileName = "tablet_data_" . date('Y-m-d') . ".xlsx"; 
    }
    else{ 
        $fields = array('TABLET ID', 'RECEIPT NO', 'RECEIPT DATE', 'RECEIPT AMOUNT', 'MEMBER ENGLISH NAME', 'MEMBER CHINESE NAME', 'REMARKS'); 
        if($to_date != "" && $from_date != "")
            $sql = "SELECT * FROM tablet_receipt WHERE receipt_date BETWEEN '$from_date' AND '$to_date' ORDER BY Tablet_id ASC";  
        else
            $sql = "SELECT * FROM tablet_receipt ORDER BY Tablet_id ASC";  
        $field_data = array('Tablet_id','receipt_num','receipt_date','receipt_amount','member_eng_name','member_chi_name','remarks');
        $fileName = "tablet_transaction_data_" . date('Y-m-d') . ".xlsx"; 
    } 
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
        header('Location: create-tablet.php?name=transaction&aside=create-tablet&lang=ch&export=success');
    }else{ 
        header('Location: create-tablet.php?name=transaction&aside=create-tablet&lang=ch&export=fail');
    }  
    /*
    echo "<pre>"; 
    print_r($excelData); 
    */
    
}
// Load the database configuration file 
?>