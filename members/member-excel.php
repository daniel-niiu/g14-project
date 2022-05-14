<?php

if(isset($_POST['btn_export'])){

    include_once '../db/dbconnection.php'; 
    $fields = array_map('strtoupper', $_POST['checkbox']); 
    $checkbox = str_replace(" ", "_", $_POST['checkbox']) ;
    $check=implode(", ", $checkbox);
    $explodedata = explode(", ",$check);
    //print_r($explodedata);
    //print_r($check);  
    // Filter the excel data 
    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    } 
     
    // Excel file name for download 
    $fileName = "members-data_" . date('Y-m-d') . ".xls"; 
     
    // Column names 
    //$fields = array('ID', 'NAME', 'IC', 'GENDER', 'AGE', 'CONTACT', 'OCCUPATION', 'MEMBER TYPE'); 
    //echo $check;
     
    // Display column names as first row 
    $excelData = implode("\t", array_values($fields)) . "\n"; 
     
    //echo "SELECT $check FROM member ORDER BY member_id ASC";
    // Fetch records from database  
    $query = $conn->query("SELECT $check FROM member ORDER BY member_id ASC");  
    if($query->num_rows > 0){ 
        // Output each row of the data 
        //while($row = $query->fetch_assoc()){  
        while($row = mysqli_fetch_array($query, MYSQLI_NUM)){
            //$lineData = array($row[0], $row['member_name'], $row['member_ic'], $row['member_gender'], $row['member_age'], $row['member_tel'], $row['member_job'], $row['member_type']); 
            $array = array();
            foreach ($row as $data) {
                array_push($array,$data); 
            }
            array_walk($array, 'filterData'); 
            $excelData .= implode("\t", array_values($array)) . "\n"; 
        } 
    }else{ 
        $excelData .= 'No records found...'. "\n"; 
    } 
     
    // Headers for download 
    header("Content-Type: application/vnd.ms-excel"); 
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
     
    // Render excel data 
    echo $excelData; 
     
    exit;
    
}
// Load the database configuration file 
?>