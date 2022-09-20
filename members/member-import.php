<?php

//import.php
include_once '../db/dbconnection.php';
include '../../phpspreadsheet/vendor/autoload.php';
 

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
        foreach($data as $row)
        { 
            $q="";
            foreach ($row as $key => $cell) {
                //print_r($cell);echo "<br>";
                /*
                if($i==0){
                    $cell = str_replace(" ", "_", $cell);
                    $header.=":".strtolower($cell).",";
                }
                else{
                    $q.="'".$cell. "',";
                }
                */

                if($i!=0){
                    if (strtotime($cell) !== false){
                        $cell = str_replace('/', '-', $cell);
                        $q .="'".date('Y-m-d',strtotime($cell))."',";
                    }
                    else
                        $q.="'".$cell. "',";
                }
                else{
                    $cell = str_replace(" ", "_", $cell);
                    $header.="".strtolower($cell).",";
                }
            }
            /*
            $insert_data = array(
                ':first_name'  => $row[0],
                ':last_name'  => $row[1],
                ':created_at'  => $row[2],
                ':updated_at'  => $row[3]
            );
            */
            if($i != 0){
                $qquery="INSERT INTO member(".rtrim($header,",").") values (".rtrim($q,",").");";  
                mysqli_query($conn,$qquery);
            }
            //$query = "INSERT INTO sample_datas (first_name, last_name, created_at, updated_at) VALUES (:first_name, :last_name, :created_at, :updated_at)";
            
            //$statement = $connect->prepare($query);
            //$statement->execute($insert_data);
            $i++;
        } 
        $message = '<div class="alert alert-success">Data Imported Successfully</div>';
        header("Location: create-member.php?name=member&aside=create-member");
    }
    else
    {
        $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
    }
}
else
{
    $message = '<div class="alert alert-danger">Please Select File</div>';
}

//echo $message;


?>
