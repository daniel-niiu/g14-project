<?php
	$aside = $_GET['aside'];
	session_start();
?>
<aside class="w-64 mx-auto mb-4 pr-4" id="accordion-collapse" data-accordion="collapse">
    <div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
		<ul class="space-y-2">
			 <li>
				<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
					  <path fill-rule="evenodd" d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z" clip-rule="evenodd" />
					</svg>
					<span class="ml-4"><?php echo $stock['manage-stock'];?></span>
				</h3>
			 </li>
		</ul>
		
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
			<li>
				<h2 id="accordion-collapse-heading-1">
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-1" <?php if($aside == "stock-in") echo 'aria-expanded="true"'; else echo 'aria-expanded="false"'?> aria-controls="accordion-collapse-body-1">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
						  <path d="M12 1.5a.75.75 0 01.75.75V7.5h-1.5V2.25A.75.75 0 0112 1.5zM11.25 7.5v5.69l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V7.5h3.75a3 3 0 013 3v9a3 3 0 01-3 3h-9a3 3 0 01-3-3v-9a3 3 0 013-3h3.75z" />
						</svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item=""><?php echo $title['stock-in']; ?></span>
						<svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				  </h2>

				  <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
					<ul>
						<li>
                            <a href="stock-in.php?name=stock&aside=stock-in&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 pl-5 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "stock-in") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                <i class="fa-solid fa-plus"></i>
                                <span class="ml-4"><?php echo $stock['record-in'];?></span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center p-2 pl-5 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer"  data-modal-toggle="export-in-modal">
                                <i class="fa-solid fa-file-export"></i>
                                <span class="ml-3"><?php echo $export['export-record']; ?></span>
                            </a>
                        </li>
                    </ul>
				</div>
			</li> 
		</ul>

        <div id="export-in-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="export-in-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white"><?php echo $export['export-record-title']; ?></h3>
                        <form action="../stocks/stock_in_export.php" method="post">	 
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-400"><?php echo $export['choose-period-receipt']; ?></label>
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
			
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
              <h2 id="accordion-collapse-heading-2">
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-2" <?php if($aside == "stock-out") echo 'aria-expanded="true"'; else echo 'aria-expanded="false"'?> aria-controls="accordion-collapse-body-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
					  <path d="M11.47 1.72a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 01-1.06-1.06l3-3zM11.25 7.5V15a.75.75 0 001.5 0V7.5h3.75a3 3 0 013 3v9a3 3 0 01-3 3h-9a3 3 0 01-3-3v-9a3 3 0 013-3h3.75z" />
					</svg>
                    <span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item=""><?php echo $title['stock-out']; ?></span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              </h2>

              <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <ul>
                    <li>
                        <a href="stock-out.php?name=stock&aside=stock-out&lang=<?php echo $_SESSION['lang']; ?>" class="flex items-center p-2 pl-5 text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "stock-out") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-minus"></i>
                            <span class="ml-4"><?php echo $stock['record-out'];?></span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center p-2 pl-5 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer"  data-modal-toggle="export-out-modal">
                            <i class="fa-solid fa-file-export"></i>
                            <span class="ml-3"><?php echo $export['export-record']; ?></span>
                        </a>
                    </li>
                </ul>
        	</div>
		</ul>

        <div id="export-out-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="export-out-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white"><?php echo $export['export-record-title']; ?></h3>
                        <form action="../stocks/stock_out_export.php" method="post">	 
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-400"><?php echo $export['choose-period-receipt']; ?></label>
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
	</div>
</aside>
