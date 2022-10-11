
<?php
include "../db/dbconnection.php";
    $data = $_POST['value'];
    $sqlQuery = "SELECT * FROM product WHERE product_id LIKE '%".$data."%' OR product_eng_name LIKE '%".$data."%' OR product_chi_name LIKE '%".$data."%' ORDER BY product_id ASC";
    $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
    $html = "";
    while( $row = mysqli_fetch_array($resultset) ) {
        $html .= "<p class='clickme'>".$row['product_id']."-".$row['product_eng_name']."-".$row['product_chi_name']."</p>";
    }
    echo $html;    
  
?>