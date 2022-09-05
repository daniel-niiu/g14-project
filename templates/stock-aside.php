<?php
	$aside = $_GET['aside'];
?>
<aside class="w-64 mx-auto mb-4 pr-4" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
		<ul class="space-y-2">
			 <li>
				<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
					<i class="fa-solid fa-clipboard-list"></i>
					<span class="ml-4">Manage Stocks</span>
				</h3>
			 </li>
		</ul>
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
			<li>
				<a href="stock-in.php?name=stock&aside=stock-in" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "stock-in") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
					<i class="fa-solid fa-plus-minus"></i>
					<span class="ml-4">Stock In/Out</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
