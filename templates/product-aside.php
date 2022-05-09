<?php
	$aside = $_GET['aside'];
?>
<aside class="w-64 mx-auto mb-4 pr-4" aria-label="Sidebar">
		<div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
			<ul class="space-y-2">
			 	<li>
					<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
						<i class="fa-solid fa-user"></i>
						<span class="ml-4">Products Portfolio</span>
					</h3>
			 	</li>
			</ul>
			<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
				<li>
					<a href="Create_product.php?name=productr&aside=Create_product" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-plus"></i>
						<span class="ml-4">Create Product</span>
					</a>
				</li>
				<li>
					<a href="Edit-product.php?name=member&aside=create-member" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-plus"></i>
						<span class="ml-4">Edit Product</span>
					</a>
				</li>
				<li>
					<a href="View_product.php?name=member&aside=create-member" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass"></i>
						<span class="ml-4">View Products</span>
					</a>
				</li>
				<li>
					<a href="Search_product.php?name=member&aside=search-member" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-member") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass"></i>
						<span class="ml-4">Search Products</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
