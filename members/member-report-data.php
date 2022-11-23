<?php

include "../db/dbconnection.php";
$sql = "SELECT r.*, 
       COUNT(s.current_status), 
       SUM(current_status='active') active,
       SUM(current_status='inactive') inactive
       from member
       ";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($row, true);
}
?>
