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
                <a class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer" data-modal-toggle="export-modal">
                    <i class="fa-solid fa-file-export"></i>
                    <span class="ml-3"><?php echo $export['export-record']; ?></span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div id="export-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md p-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="export-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white"><?php echo $export['export-record-title']; ?></h3>
                <form action="../products/product_export.php" method="post">	 
					<label class="block text-sm font-medium text-gray-900 dark:text-gray-400"><?php echo $export['choose-period']; ?></label>
                    <div class="inline-flex justify-center items-center w-full">
                        <hr class="my-8 w-64 h-px bg-gray-200 border dark:bg-gray-500 dark:border-gray-500">
                        <span class="absolute left-1/2 px-3 font-medium text-sm text-gray-900 bg-white -translate-x-1/2 dark:text-white dark:bg-gray-700"><?php echo $export['period-from']; ?></span>
                    </div>
                    <input type="date" id="from-date" name="from-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                    <div class="inline-flex justify-center items-center w-full">
                        <hr class="my-8 w-64 h-px bg-gray-200 border dark:bg-gray-500 dark:border-gray-500">
                        <span class="absolute left-1/2 px-3 font-medium text-sm text-gray-900 bg-white -translate-x-1/2 dark:text-white dark:bg-gray-700"><?php echo $export['period-to']; ?></span>
                    </div>
                    <input type="date" id="to-date" name="to-date" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
					
                    <input type="submit" name="btn_export" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="<?php echo $export['export']; ?>">
                </form>
            </div>
        </div>
    </div>
</div> 