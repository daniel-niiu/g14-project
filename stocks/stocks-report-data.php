<?php

include "../db/dbconnection.php";
$sql = "SELECT  s.product_name AS 'Product', sum(stock_in) AS stock_in, sum(stock_out) AS stock_out  FROM stockin AS s, stockout AS so WHERE s.product_name = so.product_name Group by s.product_name";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($row, true);
}
?>
