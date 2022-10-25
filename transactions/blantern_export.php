<?php 
if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php"); 

    $to_date = $_POST['bl_to_date'];
    $from_date = $_POST['bl_from_date'];

    $query = "";
    $fields = ""; 
    // Excel file name for download 
    $fileName = "";

    // Column names  
    $fields = array('BLANTERN ID', 'MEMBER ENG NAME', 'MEMBER CHI NAME', 'CONTACT NO', 'BLESSING PRICE', 'VOTIVE PRICE', 'BRECEIPT NUM', 'VRECEIPT NUM', 'RECEIPT DATE', 'PRICE', 'REMARKS');    
    if($to_date != "" && $from_date != "")
        $sql = "SELECT * FROM blantern WHERE receipt_date BETWEEN '$from_date' AND '$to_date' ORDER BY BLantern_id ASC";  
    else
        $sql = "SELECT * FROM blantern ORDER BY BLantern_id ASC";  

    $fileName = "blantern_data_" . date('Y-m-d') . ".xlsx";  
    echo $sql;
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
        $xlsx = SimpleXLSXGen::fromArray($excelData);
        $xlsx->downloadAs($fileName); // This will download the file to your local system 
        exit; 
        header('Location: create-blantern.php?name=transaction&aside=create-blantern&export=success');
    }else{ 
        header('Location: create-blantern.php?name=transaction&aside=create-blantern&export=fail');
    }   
}
// Load the database configuration file 
?>