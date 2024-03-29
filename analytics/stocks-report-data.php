<?php

include "../db/dbconnection.php";
$timeDataFilter = '';
if(isset($_POST['start-date']) && isset($_POST['end-date']) && !empty($_POST['start-date']) && !empty($_POST['end-date'])){
    //echo '<pre>'.print_r($_POST,true).'</pre>';
    $sd = explode('/',$_POST['start-date']);
    $ed = explode('/',$_POST['end-date']);
    $startDate = $sd[2].'-'.$sd[0].'-'.$sd[1];
    $endDate = $ed[2].'-'.$ed[0].'-'.$ed[1];
    $timeDataFilter = ' WHERE (UNIX_TIMESTAMP(s.recordedOn) >= UNIX_TIMESTAMP("'.$startDate.' 00:00:00") AND UNIX_TIMESTAMP(s.recordedOn) <= UNIX_TIMESTAMP("'.$endDate.' 23:59:59")) AND (UNIX_TIMESTAMP(so.recordedOn) >= UNIX_TIMESTAMP("'.$startDate.' 00:00:00") AND UNIX_TIMESTAMP(so.recordedOn) <= UNIX_TIMESTAMP("'.$endDate.' 23:59:59")) ';

}
if(isset($_POST['title']) && !empty($_POST['title'])){
    if(!empty($timeDataFilter)){
        $timeDataFilter .=' AND (p.product_chi_name ="'.$_POST['title'].'")';
    }
    else{
        $timeDataFilter .=' WHERE (p.product_chi_name ="'.$_POST['title'].'")';
    }

}
$sql = "SELECT p.product_chi_name AS 'Product', sum(s.stock_in) AS stock_in ,count(s.product_name) as spcount, sum(so.stock_out) AS stock_out, count(so.product_name) as sopcount FROM stockin AS s LEFT Join stockout AS so on s.product_name = so.product_name  JOIN product as p ON p.product_id = s.product_name $timeDataFilter"; 
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach ($rows as $r) {
        $row[]=[
            'Product'=>$r['Product'],
            'stock_in'=>($r['stock_in']/sqrt($r['spcount'])),
            'stock_out'=>($r['stock_out']/sqrt($r['sopcount'])),
        ];
    }
    echo json_encode($row, true);
}
?>
