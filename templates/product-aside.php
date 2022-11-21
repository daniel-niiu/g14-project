<?php
	$aside = $_GET['aside'];
    session_start();
?>
<aside class="w-64 mx-auto mb-4 pr-4" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
                    <i class="fa-solid fa-box-archive"></i>
                    <span class="ml-4"><?php echo $product['manage-product']; ?></span>
                </h3>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
            <li>
                <a href="create-product.php?name=product&aside=create-product&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-product") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-plus"></i>
                    <span class="ml-4"><?php echo $title['create-product']; ?></span>
                </a>
            </li>
            <li>
                <a href="search-product.php?name=product&aside=search-product&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-product") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span class="ml-4"><?php echo $title['search-product']; ?></span>
                </a>
            </li>
            <li>
                <a href="../products/product_export.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer">
                    <i class="fa-solid fa-file-export"></i>
                    <span class="ml-3"><?php echo $export['export-record']; ?></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div id="export-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md p-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="export-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="p-6 text-center">				
				<svg class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.707 7.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L13 8.586V5h3a2 2 0 012 2v5a2 2 0 01-2 2H8a2 2 0 01-2-2V7a2 2 0 012-2h3v3.586L9.707 7.293zM11 3a1 1 0 112 0v2h-2V3z"></path><path d="M4 9a2 2 0 00-2 2v5a2 2 0 002 2h8a2 2 0 002-2H4V9z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?php echo $export['export-product-title'];?></h3>
				
                <a href="../products/product_export.php">
					<button data-modal-toggle="export-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"><?php echo $form['confirm']; ?></button>
				</a>
				
				<button data-modal-toggle="export-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-6 py-2.5 text-center mr-2"><?php echo $form['cancel']; ?></button>
            </div>
        </div>
    </div>
</div>
