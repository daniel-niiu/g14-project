<?php 
// Include pagination library file 
include_once '../php/Pagination.class.php'; 
 
// Include database configuration file 
require_once '../db/dbconnection.php';  
isLoggedIn();
// Set some useful configuration 
$baseURL = '../php/get-stock-data.php'; 
$limit = 10; 
 
// Count of all records 
$query = $conn->query("SELECT COUNT(*) as rowNum FROM stockin AS s, product AS p WHERE p.product_eng_name = s.product_name AND s.product_name = '".$_GET['productName']."'");  
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
    'baseURL' => $baseURL, 
    'totalRows' => $rowCount, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'searchFilter' 
); 
$pagination =  new Pagination($pagConfig); 
// Fetch records based on the limit     

$query = $conn->query("SELECT s.stock_in as stock, p.product_eng_name AS PName, s.receipt_no AS receipt, s.reciept_date AS date, s.balance_left AS balance FROM stockin AS s, product AS p WHERE p.product_eng_name = s.product_name AND s.product_name = '".$_GET['productName']."' ORDER BY reciept_date LIMIT 10");  
//stock out
$baseURL1 = '../php/get-stock-out-data.php';  
 
// Count of all records 
$query1 = $conn->query("SELECT COUNT(*) as rowNum FROM stockin AS s, product AS p WHERE p.product_eng_name = s.product_name AND s.product_name = '".$_GET['productName']."'");  
$result1  = $query1->fetch_assoc(); 
$rowCount1= $result1['rowNum']; 
 
// Initialize pagination class 
$pagConfig1 = array( 
    'baseURL' => $baseURL, 
    'totalRows' => $rowCount1, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'searchFilter' 
); 
$pagination1 =  new Pagination($pagConfig1); 
// Fetch records based on the limit     

$query1 = $conn->query("SELECT s.stock_out as stock, p.product_eng_name AS PName, s.receipt_no AS receipt, s.reciept_date AS date, s.balance_left AS balance FROM stockout AS s, product AS p WHERE p.product_eng_name = s.product_name AND s.product_name = '".$_GET['productName']."' ORDER BY reciept_date LIMIT 10");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
	<script>
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark');
		}
	</script>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="icon" type="image/x-icon" href="../images/logo.ico">
	<title>Tze Yin Membership Management Portal</title>
</head>

<body class="dark:bg-gray-900">
	<?php
		include('../templates/header.php');
	?>	
	
	<div class="container flex flex-wrap mx-auto">
		
	<?php
		include('../templates/product-aside.php');
	?>
	
	<div class="mx-auto">
		<nav class="flex mb-4" aria-label="Breadcrumb">
		  <ol class="inline-flex items-center space-x-1 md:space-x-3">
			<li class="inline-flex items-center">
			  <a href="../index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
				<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
				<?php echo $title['home']; ?>
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<a href="search-product.php?name=product&aside=search-product" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['search-product']; ?></a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-product']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
	
        <?php  
        $M_ID = $_GET['Id']; 
        $sql = "SELECT * FROM product WHERE product_id = '".$M_ID."'"; 	  
        $result = $conn->query($sql);  
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
            $row = mysqli_fetch_array($result); 
        ?>
		
		<div>
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-product']; ?></h2>
				<div class="button">
					<a href="edit-product.php?name=product&Id=<?php echo $row['product_id']; ?>">
						<button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
							<i class="fa-solid fa-pencil"></i>&nbsp; <?php echo $form['edit-record']; ?>
						</button>
					</a>
				</div>
			</div> 
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<form>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $product['product-id']; ?></label>
						<input type="text" id="id" name="id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['product_id']; ?>" disabled readonly>
					</div>
				 	<div class="relative z-0 w-full mb-6 group">
						<label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $product['product-status']; ?></label>
						<input type="text" id="status" name="status" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['product_status']; ?>"disabled readonly>
					 </div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="eng" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $product['eng-name']; ?></label>
						<input type="text" id="eng" name="eng" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['product_eng_name']; ?>" disabled readonly>
					</div>
				 	<div class="relative z-0 w-full mb-6 group">
						<label for="chi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $product['chi-name']; ?></label>
						<input type="text" id="chi" name="chi" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['product_chi_name']; ?>"disabled readonly>
					 </div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $product['unit-price']; ?></label>
						<div class="flex">
							 <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">RM</span>
							 <input type="text" id="price" name="price" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-none rounded-r-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['unit_price']; ?>" disabled readonly>
						</div>
					 </div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['recorded-by']; ?></label>
						<input type="text" id="user" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recordedBy']; ?>" disabled readonly>
					</div>
				</div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="record-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['recorded-on']; ?></label>
						<input type="text" id="record-date" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recordedOn']; ?>" disabled readonly>
					</div>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
					<textarea id="remarks" rows="3" cols="125" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" disabled readonly><?php echo $row['remarks']; ?></textarea>
				</div>
			</form>
			<?php
			}
			?>
			
			<div class="container flex flex-wrap justify-between items-center mx-auto pt-4">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-product-stock-in']; ?></h2>
			</div>
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class="px-6 py-3"><?php echo $form['receipt-num']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $form['receipt-date']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $title['stock-in']; ?></th> 
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
			</div>
			
			<nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
			    <?php echo $pagination->createLinks(); ?>   
			</nav>	


			<div class="container flex flex-wrap justify-between items-center mx-auto pt-4">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-product-stock-out']; ?></h2>
			</div>
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class="px-6 py-3"><?php echo $form['receipt-num']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $form['receipt-date']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $title['stock-out']; ?></th> 
							<th scope="col" class="px-6 py-3"><?php echo $stock['balance']; ?></th>
							<th scope="col" class="px-6 py-3">
								<span class="sr-only"><?php echo $form['btnedit']; ?></span>
							</th>
						</tr>
					</thead>
					<tbody> 
                    	<?php  	 
			            if($query1->num_rows > 0){
			                while($row = $query1->fetch_assoc()){
			            ?>
			                 <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
			                 	<th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
			                    	<a href="../stocks/view-stock-out.php?name=stock&productName=<?php echo $row["PName"]; ?>&receiptNum=<?php echo $row['receipt']; ?>&receiptDate=<?php echo $row["date"]; ?>" class="dark:hover:text-blue-500 md:hover:text-blue-700"><?php echo $row["receipt"]; ?></a>
			                    </th> 
			                    <td class="px-6 py-4"><?php echo $row["date"]; ?></td>
			                    <td class="px-6 py-4"><?php echo $row["stock"]; ?></td> 
			                    <td class="px-6 py-4"><?php echo $row["balance"]; ?></td>
			                    <td class="px-6 py-4 text-right">
			                    	<a href="../stocks/edit-stock-out.php?name=stock&productName=<?php echo $row["PName"]; ?>&receiptNum=<?php echo $row['receipt']; ?>&receiptDate=<?php echo $row["date"]; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo $form['btnedit']; ?></a>
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
			</div>
			
			<nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
			    <?php echo $pagination1->createLinks(); ?>   
			</nav>		
		</div>
	</div>
	</div>
	
	<!--Delete Stock in or out : Success Toast-->

	<?php 
	$success = $_GET['status']; 
	if($success == "success"){

	?>
	<div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-success-delete-record']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	<?php
	}
	else if($success == "fail"){
	?>
	<div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-fail-delete-record']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div> 
	<?php
	} 
	?>
	
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
	</footer>
	
	<script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
	
	<script>
		var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
		var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

		// Change the icons inside the button based on previous settings
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			themeToggleLightIcon.classList.remove('hidden');
		} else {
			themeToggleDarkIcon.classList.remove('hidden');
		}

		var themeToggleBtn = document.getElementById('theme-toggle');

		themeToggleBtn.addEventListener('click', function() {

			// toggle icons inside button
			themeToggleDarkIcon.classList.toggle('hidden');
			themeToggleLightIcon.classList.toggle('hidden');

			// if set via local storage previously
			if (localStorage.getItem('color-theme')) {
				if (localStorage.getItem('color-theme') === 'light') {
					document.documentElement.classList.add('dark');
					localStorage.setItem('color-theme', 'dark');
				} else {
					document.documentElement.classList.remove('dark');
					localStorage.setItem('color-theme', 'light');
				}

			// if NOT set via local storage previously
			} else {
				if (document.documentElement.classList.contains('dark')) {
					document.documentElement.classList.remove('dark');
					localStorage.setItem('color-theme', 'light');
				} else {
					document.documentElement.classList.add('dark');
					localStorage.setItem('color-theme', 'dark');
				}
			}

		});
	</script>	
</body>
</html>

