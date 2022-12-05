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
        date_default_timezone_set("Asia/Kuala_Lumpur");
            $member_data = "member_id, member_eng_name, member_chi_name, member_ic, member_citizenship, member_gender, member_dob, member_tel, member_job, member_address, member_type, accept_date, recommender_id, recommender_name, remarks, recordedBy, recordedOn"; 
            foreach($data as $row)
            {  
                if($i!=0){   
                    $query="SELECT member_id FROM member WHERE member_id = '".$row[0]."'"; 
                    $result = mysqli_query($conn,$query); 
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
                            $non_empty_array[] = $row['member_id'];
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
                    $a++;
                }
                $var = rtrim($var, ",\n");
                $var = rtrim($var, ",");
                $_SESSION['duplicated_data'] = $var;
                header("Location: create-member.php?name=member&aside=create-member&lang=".$_SESSION['lang']."&import=fail");
            }
            else
            {
                $i=0;  
                foreach($data as $row)
                {  
                    if($i!=0){ 

                        $date = explode("/", $row[6]);
                        $row[6] = $date[1]."/".$date[0]."/".$date[2];
                        $row[6] = str_replace('/', '-', $row[6]);
                        $date = date('Y-m-d',strtotime($row[6]));  


                        $date1 = explode("/", $row[11]);
                        $row[11] = $date[1]."/".$date[0]."/".$date[2];
                        $row[11] = str_replace('/', '-', $row[11]);
                        $date1 = date('Y-m-d',strtotime($row[11]));  

                        $insert_member_data = "'$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$date', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$date1', '$row[12]', '$row[13]', '$row[14]', '".$_SESSION['name']."','".date("Y-m-d H:i:s")."'";  

                        $query="INSERT INTO member(".$member_data.") values (".$insert_member_data.");"; 
                        mysqli_query($conn,$query);
                    } 
                    $i++;
                }
                header("Location: create-member.php?name=member&aside=create-member&lang=".$_SESSION['lang']."&import=sucess");  
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

//echo $message;


?>
