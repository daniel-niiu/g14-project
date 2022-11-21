<?php

include "../db/dbconnection.php";
$sql = "SELECT 
       SUM(member_status='active') active,
       SUM(member_status='inactive') inactive
       from member
       ";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($row, true);
}
?>
