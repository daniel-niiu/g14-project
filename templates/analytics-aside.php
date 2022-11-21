<?php
	$aside = $_GET['aside'];
	session_start();
?>
<aside class="w-64 mx-auto mb-4 pr-4" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
		<ul class="space-y-2">
			 <li>
				<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
					<i class="fa-solid fa-chart-simple"></i>
					<span class="ml-4"><?php echo $analytics['manage-analytics'];?></span>
				</h3>
			 </li>
		</ul>
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
			<li>
				<a href="membership.php?name=analytics&aside=membership&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "membership") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-user ml-1"></i>
					<span class="ml-4"><?php echo $analytics['membership'];?></span>
				</a>
			</li>
			<li>
				<a href="transaction.php?name=analytics&aside=transaction&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "transaction") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
					<i class="fa-solid fa-credit-card"></i>
					<span class="ml-4"><?php echo $analytics['transaction'];?></span>
				</a>
			</li>
			<li>
				<a href="product.php?name=analytics&aside=product&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "product") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
					  <path fill-rule="evenodd" d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z" clip-rule="evenodd" />
					</svg>
					<span class="ml-4"><?php echo $analytics['product'];?></span>
				</a>
			</li>
		</ul>
	</div>
</aside>
