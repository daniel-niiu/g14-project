<?php

include "../db/dbconnection.php";

$method = $_GET["method"]; 
if($method === "add")
{
    global $conn;

    $date = str_replace('/', '-', $_POST['date']);
    $date = date('Y-m-d', strtotime($date));  
    $sql = "INSERT INTO Reminder (reminder_date, title,remarks) VALUES ('".$date."','".$_POST['title']."','".$_POST['content']."')";
    echo $sql;
    //$result = $conn->query($sql);
       
    if (!mysqli_query($conn,$sql)) {
        header("Location: ../index.php?title=reminderadd&success=fail");
    } 
    else{
        header("Location: ../index.php?title=reminderadd&success=success");
    }

}

if($method === "delete")
{
    global $conn;

    $id = $_GET["Id"];
   
    $sql = "DELETE FROM Reminder WHERE reminder_id ='".$_GET['Id']."'"; 

    $result = $conn->query($sql);
    if (mysqli_query($conn,$sql)) {
        header("Location: ../index.php?title=reminderdelete&success=success");
    } 
    else{

        header("Location: ../index.php?title=reminderdelete&success=success");
    }
    
   
}


if($method === "update")
{
    global $conn;
  
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['reminderid'];
    $date = str_replace('/', '-', $_POST['date']);
    $date = date('Y-m-d', strtotime($date));      

    $sql = "UPDATE Reminder SET 
            title = '$title', 
            reminder_date = '".$date."', 
            remarks = '$content'
            WHERE reminder_id = '$id'";  
    $result = $conn->query($sql);
    
    
    if (mysqli_query($conn,$sql)) {
        header("Location: ../index.php?title=reminderedit&success=success");
    } 
    else{
        header("Location: ../index.php?title=reminderedit&success=fail");
    }
    
   //header("Location: ../edit-tablet-transaction.php?id=$oldid&msg=updated");

}



?>