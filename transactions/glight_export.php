<?php 
if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php");
 
    $to_date = $_POST['gl_to_date'];
    $from_date = $_POST['gl_from_date'];

    $query = "";
    $fields = "";  
    $fileName = "";

    // Column names  
    $fields = array('GLIGHT ID', 'MEMBER ENG NAME', 'MEMBER CHI NAME', 'PRICE', 'CONTACT NUM' , 'RECEIPT NUM', 'RECEIPT DATE', 'RECEIPT AMOUNT', 'REMARKS'); 
    
    if($to_date != "" && $from_date != "")
        $sql = "SELECT glight_r.GLight_id, member_eng_name, member_chi_name, price, contact_num,receipt_num, receipt_date, receipt_amount, remarks FROM GLight_Receipt AS glight_r, GLight AS glight WHERE glight.GLight_id = glight_r.GLight_id AND glight_r.receipt_date BETWEEN '$from_date' AND '$to_date' ORDER BY glight_r.GLight_id ASC";  
    else
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
        $xlsx = SimpleXLSXGen::fromArray($excelData);
        $xlsx->downloadAs($fileName); // This will download the file to your local system 
        exit; 
        header('Location: create-glight.php?name=transaction&aside=create-glight&export=success');
    }else{ 
        header('Location: create-glight.php?name=transaction&aside=create-glight&export=fail');
    }   
}
// Load the database configuration file 
?>