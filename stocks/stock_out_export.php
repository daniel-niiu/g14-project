<?php  
    include_once '../db/dbconnection.php';  
    include("../php/SimpleXLSXGen.php"); 

    $query = "";
    $fields = "";  
    $fileName = "";
    $from_date = $_POST['from-date'];
    $to_date = $_POST['to-date'];

    // Column names   

    $fields = array('PRODUCT NAME', 'RECEIPT DATE', 'STOCK SUMMARY', 'RECEIPT NO', 'STOCK OUT', 'BALANCE LEFT', 'REMARKS');   
    if($from_date != "" && $to_date != "") 
        $sql = "SELECT * FROM stockout WHERE reciept_date BETWEEN '".$from_date."' AND '".$to_date."' ORDER BY reciept_date ASC";  
    else 
        $sql = "SELECT * FROM stockout ORDER BY reciept_date ASC";
    
    $fileName = "stock_out_data_" . date('Y-m-d') . ".xlsx";   
    $field_data = array('product_name', 'reciept_date', 'stock_summary', 'receipt_no', 'stock_out', 'balance_left', 'remarks');
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
// Load the database configuration file 
?>