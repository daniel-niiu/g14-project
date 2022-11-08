
<?php
include "../db/dbconnection.php";
if($_POST['type'] == "search")
{
    $data = $_POST['value'];
    if($data != "")
    {
        $sqlQuery = "SELECT * FROM product WHERE product_status = 'Available' AND product_id LIKE '%".$data."%' OR product_eng_name LIKE '%".$data."%' OR product_chi_name LIKE '%".$data."%'  ORDER BY product_id ASC";
        $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        $html = "";
        while( $row = mysqli_fetch_array($resultset) ) {
            $html .= "<li class='clickme block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white'>".$row['product_id']."-".$row['product_eng_name']."-".$row['product_chi_name']."</li>";
        }
    }
    else 
        $html = "";
    echo $html;  
}  
if($_POST['type'] == "calculate")
{ 
    $quantity = $_POST['quantity'];
    if($quantity != "" && $_POST["value"] != "")
    {
        $prodname = explode("-", $_POST["value"]); //array [0] - product ID, array [1] product english name, array [2] product chinese name
        $sqlQuery = "SELECT unit_price FROM product WHERE product_id = '$prodname[0]'";
        $resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        if (mysqli_num_rows($resultset) > 0) {
            while( $row = mysqli_fetch_array($resultset) ) { 
                $html = $row['unit_price'] * $quantity; 
            }
        }
    }
    else
        $html = "";
    echo $html;
}
?>