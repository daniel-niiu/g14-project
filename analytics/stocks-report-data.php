<?php

include "../db/dbconnection.php";
$timeDataFilter = '';
if(isset($_POST['start-date']) && isset($_POST['end-date']) && !empty($_POST['start-date']) && !empty($_POST['end-date'])){
    //echo '<pre>'.print_r($_POST,true).'</pre>';
    $sd = explode('/',$_POST['start-date']);
    $ed = explode('/',$_POST['end-date']);
    $startDate = $sd[2].'-'.$sd[1].'-'.$sd[0];
    $endDate = $ed[2].'-'.$ed[1].'-'.$ed[0];
    $timeDataFilter = ' WHERE (UNIX_TIMESTAMP(s.recordedOn) >= UNIX_TIMESTAMP("'.$startDate.' 00:00:00") AND UNIX_TIMESTAMP(s.recordedOn) <= UNIX_TIMESTAMP("'.$endDate.' 23:59:59")) AND (UNIX_TIMESTAMP(so.recordedOn) >= UNIX_TIMESTAMP("'.$startDate.' 00:00:00") AND UNIX_TIMESTAMP(so.recordedOn) <= UNIX_TIMESTAMP("'.$endDate.' 23:59:59")) ';

}
if(isset($_POST['title']) && !empty($_POST['title'])){
    if(!empty($timeDataFilter)){
        $timeDataFilter .=' AND (s.product_name ="'.$_POST['title'].'")';
    }
    else{
        $timeDataFilter .=' WHERE (s.product_name ="'.$_POST['title'].'")';
    }

}
$sql = "SELECT s.product_name AS 'Product', sum(stock_in) AS stock_in , sum(stock_out) AS stock_out FROM stockin AS s LEFT Join stockout AS so on s.product_name = so.product_name  $timeDataFilter Group by s.product_name";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($row, true);
}
?>
