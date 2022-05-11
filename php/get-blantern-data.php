<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once '../php/Pagination.class.php';  
     
    // Include database configuration file 
    require_once '../db/dbconnection.php';  
     
    // Set some useful configuration 
    $baseURL = 'get-blantern-data.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search 
    $whereSQL = '';  
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE (BLantern_id LIKE '%".$_POST['keywords']."%' OR member_eng_name LIKE '%".$_POST['keywords']."%' OR member_chi_name LIKE '%".$_POST['keywords']."%' OR breceipt_num LIKE '%".$_POST['keywords']."%' OR vreceipt_num LIKE '%".$_POST['keywords']."%')"; 
    } 

    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM BLantern ".$whereSQL);  
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
    $query = $conn->query("SELECT * FROM BLantern $whereSQL LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Light id</th>
                    <th scope="col" class="px-6 py-3">Anc. name (en)</th>
                    <th scope="col" class="px-6 py-3">Anc. name (ch)</th>
                    <th scope="col" class="px-6 py-3">Mem. name (en)</th>
                    <th scope="col" class="px-6 py-3">Mem. name (ch)</th>
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
                            <a href="view-blantern.php?name=transaction&Id=<?php echo $row['BLantern_id']; ?>" class="dark:hover:text-blue-500 md:hover:text-blue-700"><?php echo $row['BLantern_id']; ?></a>
                        </th>
                        <td class="px-6 py-4"><?php echo $row['member_eng_name']; ?></td>
                        <td class="px-6 py-4"><?php echo $row['member_chi_name']; ?></td>
                        <td class="px-6 py-4"><?php echo $row['breceipt_num']; ?></td>
                        <td class="px-6 py-4"><?php echo $row['vreceipt_num']; ?></td>
                        <td class="px-6 py-4 text-right"><a href="edit-blantern.php?name=transaction&Id=<?php echo $row['BLantern_id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></td>
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