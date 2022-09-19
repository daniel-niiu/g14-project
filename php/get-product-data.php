<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once '../php/Pagination.class.php';  
     
    // Include database configuration file 
    require_once '../db/dbconnection.php';  
     
    // Set some useful configuration 
    $baseURL = 'get-product-data.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search 
    $whereSQL = '';  
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE (product_id LIKE '%".$_POST['keywords']."%' OR product_chi_name LIKE '%".$_POST['keywords']."%' OR product_eng_name LIKE '%")"; 
    } 

    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM product ".$whereSQL);  
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'searchFilter' 
    ); 
    $pagination =  new Pagination($pagConfig);  
    // Fetch records based on the offset and limit   
    $query = $conn->query("SELECT * FROM product $whereSQL LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Product id</th>
                    <th scope="col" class="px-6 py-3">Product name (en)</th>
                    <th scope="col" class="px-6 py-3">Product name (ch)</th>
					<th scope="col" class="px-6 py-3">Product status</th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
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
                            <a href="view-product.php?name=transaction&Id=<?php echo $row["product_id"]; ?>" class="dark:hover:text-blue-500 md:hover:text-blue-700"><?php echo $row["product_id"]; ?></a>
                        </th>
                        <td class="px-6 py-4"><?php echo $row["product_eng_name"]; ?></td>
                        <td class="px-6 py-4"><?php echo $row["product_chi_name"]; ?></td>
						<td class="px-6 py-4"><?php echo $row["product_status"]; ?></td>
                        <td class="px-6 py-4 text-right"><a href="edit-product.php?name=transaction&Id=<?php echo $row["product_id"]; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                     </tr>
            <?php
                    } 
                }
                else{ 
                    echo '<tr><td colspan="6">No records found...</td></tr>'; 
                } 
            ?>
            </tbody>   
        </table>  
    <!-- Display pagination links --> 
    </div> 
    <nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
        <?php echo $pagination->createLinks(); ?>   
    </nav>
<?php 
} 
?>