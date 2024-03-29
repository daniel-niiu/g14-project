<?php  
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once '../php/Pagination.class.php';  
     
    // Include database configuration file 
    require_once '../db/dbconnection.php';  
     
    include "../php/config.php";  
    
    // Set some useful configuration 
    $baseURL = '../php/get-stock-data.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search  

    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM stockin AS s, product AS p WHERE p.product_id = s.product_name AND s.product_name = '".$_SESSION['prod_id']."'");  
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer'
    ); 
    $pagination =  new Pagination($pagConfig);  

    // Fetch records based on the offset and limit   
    $query = $conn->query("SELECT s.stock_in as stock, p.product_id AS PName, s.receipt_no AS receipt, s.reciept_date AS date, s.balance_left AS balance FROM stockin AS s, product AS p WHERE p.product_id = s.product_name AND s.product_name = '".$_SESSION['prod_id']."' ORDER BY reciept_date LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3"><?php echo $form['receipt-num']; ?></th>
                            <th scope="col" class="px-6 py-3"><?php echo $form['receipt-date']; ?></th>
                            <th scope="col" class="px-6 py-3"><?php echo $stock['quantity-in']; ?></th> 
                            <th scope="col" class="px-6 py-3"><?php echo $stock['balance']; ?></th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only"><?php echo $form['btnedit']; ?></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php    
                        if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                        ?>
                             <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <a href="../stocks/view-stock-in.php?name=stock&productName=<?php echo $row["PName"]; ?>&receiptNum=<?php echo $row['receipt']; ?>&receiptDate=<?php echo $row["date"]; ?>" class="dark:hover:text-blue-500 md:hover:text-blue-700"><?php echo $row["receipt"]; ?></a>
                                </th> 
                                <td class="px-6 py-4"><?php echo $row["date"]; ?></td>
                                <td class="px-6 py-4"><?php echo $row["stock"]; ?></td> 
                                <td class="px-6 py-4"><?php echo $row["balance"]; ?></td>
                                <td class="px-6 py-4 text-right">
                                    <a href="../stocks/edit-stock-in.php?name=stock&productName=<?php echo $row["PName"]; ?>&receiptNum=<?php echo $row['receipt']; ?>&receiptDate=<?php echo $row["date"]; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo $form['btnedit']; ?></a>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else{ 
                            echo '<tr><td colspan="6">'.$form['no-record-warning'].'</td></tr>'; 
                        } 
                        ?> 
                    </tbody>  
                </table>  
    <!-- Display pagination links --> 
    <nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
        <?php echo $pagination->createLinks(); ?>   
    </nav>
    </div>  
<?php 
} 
?>