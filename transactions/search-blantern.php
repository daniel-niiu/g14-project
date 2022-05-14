<?php 
// Include pagination library file 
include_once '../php/Pagination.class.php'; 
 
// Include database configuration file 
require_once '../db/dbconnection.php';  
isLoggedIn();
// Set some useful configuration 
$baseURL = '../php/get-blantern-data.php'; 
$limit = 10; 
 
// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM BLantern"); 

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
$query = $conn->query("SELECT * FROM BLantern ORDER BY BLantern_id LIMIT $limit");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark');
		}
	</script>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
	<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
	<script src="../script/jquery.min.js"></script> 
	<script> 
	function searchFilter(page_num) {
	    page_num = page_num?page_num:0;
	    var keywords = $('#simple-search').val();    
	    $.ajax({
	        type: 'POST',
	        url: '../php/get-blantern-data.php',
	        data:'page='+page_num+'&keywords='+keywords,
	        beforeSend: function () {
	            //$('.loading-overlay').show();
	        },
	        success: function (html) {
	            $('#dataContainer').html(html);
	            //$('.loading-overlay').fadeOut("slow");
	        }
	    });
	} 
	</script>
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
		include('../templates/transaction-aside.php');
	?>
	
	<div class="mx-auto">
		<nav class="flex mb-4" aria-label="Breadcrumb">
		  <ol class="inline-flex items-center space-x-1 md:space-x-3">
			<li class="inline-flex items-center">
			  <a href="../index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
				<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
				Home
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Search Blessing Lantern</p>
			  </div>
			</li>
		  </ol>
		</nav>
	
		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Search Blessing Lantern</h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			<form>
				<div class="relative z-0 w-full mb-6 group"> 
					<label for="simple-search" class="sr-only">Search</label>
						<div class="relative w-full">
							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
								<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
							</div>
							<input type="text" size="120" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" onkeyup="searchFilter();" required>
						</div>
				</div>
			</form>
				
			<div id="dataContainer">			
				<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
					<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class="px-6 py-3">Lantern id</th>
								<th scope="col" class="px-6 py-3">Mem. name (en)</th>
								<th scope="col" class="px-6 py-3">Mem. name (cn)</th>
								<th scope="col" class="px-6 py-3">Bl. receipt</th>
								<th scope="col" class="px-6 py-3">Vo. receipt</th>
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
								<td class="px-6 py-4">
									<?php echo $row['member_eng_name']; ?>
								</td>
								<td class="px-6 py-4">
									<?php echo $row['member_chi_name']; ?>
								</td>
								<td class="px-6 py-4">
									<?php echo $row['breceipt_num']; ?>
								</td>
								<td class="px-6 py-4">
									<?php echo $row['vreceipt_num']; ?>
								</td>
								<td class="px-6 py-4 text-right">
									<a href="edit-blantern.php?name=transaction&Id=<?php echo $row['BLantern_id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
				</div>
				<nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
				    <?php echo $pagination->createLinks(); ?>   
				</nav>  
			</div>  
		</div>
	</div>
	</div>
	
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4">Disclaimer: This is a student work in progress for SWE40001/SWE40002 Software Engineering Project A/B of Swinburne University of Technology, Sarawak (2022).</p>
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