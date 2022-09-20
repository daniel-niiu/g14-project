<?php 
if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php");

    $period = $_POST['period'];
    $period_details = $_POST['period-details'];

    $query = "";
    $fields = "";  
    $fileName = "";

    // Column names  
    $fields = array('GLIGHT ID', 'MEMBER ENG NAME', 'MEMBER CHI NAME', 'PRICE', 'CONTACT NUM' , 'RECEIPT NUM', 'RECEIPT DATE', 'RECEIPT AMOUNT', 'REMARKS'); 
    $sql = "SELECT glight_r.GLight_id, member_eng_name, member_chi_name, price, contact_num,receipt_num, receipt_date, receipt_amount, remarks FROM GLight_Receipt AS glight_r, GLight AS glight WHERE glight.GLight_id = glight_r.GLight_id ORDER BY glight_r.GLight_id ASC";  
    $fileName = "glight_data_" . date('Y-m-d') . ".xlsx";    
    $field_data = array('GLight_id', 'member_eng_name', 'member_chi_name', 'price', 'contact_num', 'receipt_num', 'receipt_date', 'receipt_amount', 'remarks');

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