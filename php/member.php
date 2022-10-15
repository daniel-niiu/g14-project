<?php

include "../db/dbconnection.php";

$method = $_GET["method"];

if($method === "add")
{
    global $conn;  
    $mid_sql = "SELECT EXISTS (SELECT * FROM member WHERE member_id = '".$_POST['id']."')";
    $result = $conn->query($mid_sql);  
    if (mysqli_num_rows($result) != 1) { 
        $dobdate = str_replace('/', '-', $_POST['dob']);
        $dobdate = date('Y-m-d', strtotime($dobdate)); 
        $acceptdate = str_replace('/', '-', $_POST['accept-date']);
        $acceptdate = date("Y-m-d", strtotime($acceptdate));
        $sql = "INSERT INTO member (member_id, member_status, member_chi_name, member_eng_name, member_ic, member_citizenship, member_gender, member_dob, member_tel, member_job, member_address,member_type, recommender_id, recommender_name, accept_date, remarks, admin_username) VALUES ('".$_POST['id']."','".$_POST['checkbox_value']."','".$_POST['chinese']."','".$_POST['english']."','".$_POST['ic']."','".$_POST['citizen']."','".$_POST['gender']."','".$dobdate."','".$_POST['contact']."','".$_POST['job']."','".$_POST['address']."','".$_POST['member']."','".$_POST['recommender-id']."','".$_POST['recommender']."','".$acceptdate."','".$_POST['remarks']."', '".$_SESSION['name']."')";
        //echo $sql;
        
        if (mysqli_query($conn,$sql)) {
            header("Location: ../members/create-member.php?name=member&aside=create-member&success=success");
        } 
    }
    else{
        header("Location: ../members/create-member.php?name=member&aside=create-member&success=fail");
    }
    

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $sql = "DELETE FROM member WHERE member_id='".$_GET['Id']."'"; 

    $result = $conn->query($sql);
    header("Location: ../members/search-member.php?name=member&aside=search-member");
    
   
}


if($method === "update")
{
    global $conn;
 
    //$date = new DateTime(date("d-m-Y", strtotime($_POST['dob'));
    $abc = $_POST['dob'];
    $id = $_GET["Id"];
    $dobdate = str_replace('/', '-', $_POST['dob']);
    $dobdate = date('Y-m-d', strtotime($dobdate)); 
    $acceptdate = str_replace('/', '-', $_POST['accept-date']);
    $acceptdate = date("Y-m-d", strtotime($acceptdate));
    $sql = "UPDATE member SET member_eng_name = '".$_POST['english']."', member_chi_name = '".$_POST['chinese']."', member_ic = '".$_POST['ic']."', member_citizenship= '".$_POST['citizen']."', member_gender= '".$_POST['gender']."', member_dob = '".$dobdate."', member_tel = '".$_POST['contact']."', member_job = '".$_POST['job']."', member_address = '".$_POST['address']."',member_type = '".$_POST['member']."', recommender_id = '".$_POST['recommender-id']."', recommender_name = '".$_POST['recommender']."', accept_date = '".$acceptdate."', remarks = '".$_POST['remarks']."', member_status = '".$_POST['checkbox_value']."', admin_username = '".$_SESSION['name']."' WHERE member_id = '".$_GET['Id']."'";  
    //echo $sql;
    $result = $conn->query($sql);
    
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../members/edit-member.php?name=member&Id=".$id."&method=update");
    } 
    else{
        header("Location: ../members/edit-member.php?name=member&Id=".$id."&method=update");
    }

   //header("Location: ../edit-tablet-transaction.php?id=$oldid&msg=updated");

}



?>