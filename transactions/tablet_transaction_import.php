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
        $i=0;
        if($_GET['type'] == "tablet")
        { 
            $tablet_data = "tablet_id, inst_date, tablet_zone, tablet_tier, tablet_row, price, ancestor_eng_name, ancestor_chi_name, contact_num1, contact_num2, address, member_eng_name, member_chi_name, payment_type, remarks"; 

            foreach($data as $row)
            {  
                if($i!=0){   
                    $query="SELECT tablet_id FROM tablet WHERE tablet_id = '".$row[0]."'"; 
                    $result = mysqli_query($conn,$query); 
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
                            $non_empty_array[] = $row['tablet_id'];
                        }
                    }
                } 
                $i++;
            }  
            if(!empty($non_empty_array))
            {
                $var = "";
                $a = 1;
                foreach($non_empty_array as $data)
                {
                    if($a % 4 == 0)
                        $var .= $data.",\n";
                    else
                        $var .= $data.",";
                }
                $var = rtrim($var, ",\n");
                $var = rtrim($var, ","); 
                $_SESSION['duplicated_data'] = $var;
                header("Location: create-tablet.php?name=transaction&aside=create-tablet&lang=".$_SESSION['lang']."&import=fail");
            }
            else
            {  
                foreach($data as $row)
                {  
                    if($i!=0){ 
                        $date = explode("/", $row[1]);
                        $row[1] = $date[1]."/".$date[0]."/".$date[2];
                        $row[1] = str_replace('/', '-', $row[1]);
                        $date = date('Y-m-d',strtotime($row[1]));  
                        $insert_tablet_data = "'$row[0]', '$date', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]', '$row[14]'";  

                        $query="INSERT INTO tablet(".$tablet_data.") values (".$insert_tablet_data.");"; 
                        mysqli_query($conn,$query);
                    } 
                    $i++;
                } 
                header("Location: create-tablet.php?name=transaction&aside=create-tablet&lang=".$_SESSION['lang']."&import=success");
            }
        }
        else if($_GET['type'] == "transaction")
        { 
            $transaction_data = "Tablet_id, receipt_num, receipt_date, receipt_amount, member_eng_name, member_chi_name, remarks";
            foreach($data as $row)
            {  
                if($i!=0){   
                    $date = explode("/", $row[2]);
                    $row[2] = $date[1]."/".$date[0]."/".$date[2];
                    $row[2] = str_replace('/', '-', $row[2]);
                    $date = date('Y-m-d',strtotime($row[2])); 
                    $query="SELECT Tablet_id,receipt_num, receipt_date FROM tablet_receipt WHERE Tablet_id = '".$row[0]."' AND receipt_num = '".$row[1]."' AND receipt_date = '".$date."'"; 
                    $result = mysqli_query($conn,$query); 
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
                            $non_empty_array[] = $row['Tablet_id']."-".$row['receipt_num']."-".$row['receipt_date'];
                        }
                    }
                } 
                $i++;
            }  
            if(!empty($non_empty_array))
            {
                $var = ""; 
                foreach($non_empty_array as $data)
                { 
                    $var .= $data.",<br>";
                }
                $var = rtrim($var, ",<br>"); 
                $_SESSION['duplicated_data'] = $var;
                header("Location: create-tablet.php?name=transaction&aside=create-tablet&lang=".$_SESSION['lang']."&import=fail");
            }
            else
            {
                foreach($data as $row)
                { 
                    $q="";
                    if($i!=0){ 

                        $date = explode("/", $row[2]);
                        $row[2] = $date[1]."/".$date[0]."/".$date[2];
                        $row[2] = str_replace('/', '-', $row[2]);
                        $date = date('Y-m-d',strtotime($row[2]));  
                        $insert_tablet_data = "'$row[0]', '$row[1]', '$date', '$row[3]', '$row[4]', '$row[5]', '$row[6]'";  

                        $query="INSERT INTO tablet_receipt(".$transaction_data.") values (".$insert_tablet_data.");"; 
                        mysqli_query($conn,$query);
                    } 
                    $i++;
                } 
                header("Location: create-tablet.php?name=transaction&aside=create-tablet&lang=".$_SESSION['lang']."&import=success"); 
            }
        } 
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
 


?>
