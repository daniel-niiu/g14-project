<?php 
// Include pagination library file 
include_once '../php/Pagination.class.php'; 
 
// Include database configuration file 
require_once '../db/dbconnection.php';   
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="../script/search.js"></script> 
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
	<link rel="stylesheet" href="../styles/search.css">
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
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['search-product']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>

		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['search-product']; ?></h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/> 
				<div class="relative sm:rounded-lg" style="width:850px;">
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
							<th scope="col" class="px-6 py-3"><?php echo $product['product-id']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $product['eng-name']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $product['chi-name']; ?></th>
							<th scope="col" class="px-6 py-3"><?php echo $product['product-status']; ?></th> 
							<!--
                            <th scope="col" class=" py-3">
                                <span class="sr-only"><?php echo $form['btnedit']; ?></span>
                            </th>
                        	-->
                        </tr>
                    </thead>
                    <tbody> 
			            <?php 
						$query = $conn->query("SELECT * FROM product ORDER BY product_id");   
			            if($query->num_rows > 0){
			                while($row = $query->fetch_assoc()){
			            ?>
                        <tr class='border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700'>
							<th scope='row' class='px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap'><a href='view-product.php?name=product&productName=<?php echo $row['product_chi_name'];?>&Id=<?php echo $row["product_id"];?>' class='dark:hover:text-blue-500 md:hover:text-blue-700'><?php echo $row['product_id']; ?></a></th>
                            <td class='px-6 py-4'><?php echo $row['product_eng_name'];?></td>
                            <td class='px-6 py-4'><?php echo $row['product_chi_name'];?></td>
                            <td class='px-6 py-4'><?php echo $row['product_status']; ?></td>
                            <!--
			                    <td class="px-6 py-4 text-right"><a href="edit-glight.php?name=transaction&Id=<?php echo $row["GLight_id"]; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo $form['btnedit']; ?></a>
								</td>
                        	-->
                        </tr>
			            <?php 
			                } 
			            }else{ 
			                echo '<tr><td colspan="5">'.$form['no-record-warning'].'</td></tr>'; 
			            } 
			            ?>
                    </tbody>
                </table>  
			</div>    
		</div>  
		</div>  
	</div>
	</div>
	
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
	</footer>
	
	<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
	
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
	 <script type="text/javascript">
	 	$(document).ready(function(){
	 		$('table').DataTable();
	 		$("div .row:first-child").addClass("text-gray-700 rounded hover:bg-gray-100 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700");
	 		$("div .row:last-child").addClass("text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700");
	 	})
	 </script>
</body>
</html>

