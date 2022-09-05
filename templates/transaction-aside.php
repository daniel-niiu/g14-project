<?php
	$aside = $_GET['aside'];
?>
<aside class="w-72 mx-auto mb-4 pr-4" id="accordion-collapse" data-accordion="collapse">
	<div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
		<ul class="space-y-2">
			 <li>
				<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
					<i class="fa-solid fa-credit-card"></i>
					<span class="ml-4">Manage Transactions</span>
				</h3>
			 </li>
		</ul>
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
			<li>
				<h2 id="accordion-collapse-heading-1">
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-1" <?php if($aside == "create-tablet") echo 'aria-expanded="true"'; else if($aside == "search-tablet") echo 'aria-expanded="true"'; else if($aside == "tablet-transaction") echo 'aria-expanded="true"'; else echo 'aria-expanded="false"'?> aria-controls="accordion-collapse-body-1">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Memorial Tablet</span>
						<svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
				  </h2>

				  <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
					<ul>
						<li>
							<a href="create-tablet.php?name=transaction&aside=create-tablet" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-tablet") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-plus"></i>
								<span class="ml-3">Create Memorial Tablet</span>
							</a>
						</li>
						<li>
							<a href="search-tablet.php?name=transaction&aside=search-tablet" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-tablet") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-magnifying-glass"></i>
								<span class="ml-3">Search Memorial Tablet</span>
							</a>
						</li>
						<li>
							<a href="create-tablet-transaction.php?name=transaction&aside=tablet-transaction" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "tablet-transaction") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-file-circle-plus"></i>
								<span class="ml-3">Add Tablet Transaction</span>
							</a>
						</li>
						<li>
							<a class="ml-3 flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer" data-modal-toggle="tablet-modal">
								<i class="fa-solid fa-file-export"></i>
								<span class="ml-3">Export Record</span>
							</a>
						</li>
					</ul>
				  </div>
			</li>
		</ul>
			
        <div id="tablet-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="tablet-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">What would you like to export?</h3>
                        <form>
							<div class="mb-4">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Choose a type</label>
                                <input type="radio" name="export-type" id="tablet" value="Memorial Tablet">
                                <label for="tablet" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Memorial Tablet</label>

                                <input type="radio" name="export-type" id="receipts" class="ml-6" value="Tablet Transactions">
                                <label for="receipts" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tablet Transactions</label>
							</div>
							
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Choose a period</label>
                            <div class="flex mb-6">
								<span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
									<select id="period" class="text-gray-900 text-sm rounded-lg dark:text-white focus:ring-0 dark:focus:ring-0 bg-transparent border-0">
										<option value="Monthly" selected>Monthly</option>
										<option value="Yearly">Yearly</option>
									</select>
								</span>
								<select id="period-details" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="period1" selected>Period 1</option>
                                    <option value="period2">Period 2</option>
                                </select>
							</div>

                            <input type="submit" name="btn_export" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Export">
                        </form>
                    </div>
                </div>
            </div>
        </div> 
		
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
		  <h2 id="accordion-collapse-heading-2">
			<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-2" <?php if($aside == "create-blantern") echo 'aria-expanded="true"'; else if($aside == "search-blantern") echo 'aria-expanded="true"'; else echo 'aria-expanded="false"'?> aria-controls="accordion-collapse-body-2">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
				<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Blessing Lantern</span>
				<svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
		  </h2>
		
		  <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
			<ul>
				<li>
					<a href="create-blantern.php?name=transaction&aside=create-blantern" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-blantern") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-plus"></i>
						<span class="ml-3">Create Blessing Lantern</span>
					</a>
				</li>
				<li>
					<a href="search-blantern.php?name=transaction&aside=search-blantern" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-blantern") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass"></i>
						<span class="ml-3">Search Blessing Lantern</span>
					</a>
				</li>
				<li>
					<a class="ml-3 flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer" data-modal-toggle="lantern-modal">
						<i class="fa-solid fa-file-export"></i>
						<span class="ml-3">Export Record</span>
					</a>
				</li>
			</ul>
		  </div>
		</ul>
			
        <div id="lantern-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="lantern-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">What would you like to export?</h3>
                        <form>	
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Choose a period</label>
                            <div class="flex mb-6">
								<span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
									<select id="period" class="text-gray-900 text-sm rounded-lg dark:text-white focus:ring-0 dark:focus:ring-0 bg-transparent border-0">
										<option value="Monthly" selected>Monthly</option>
										<option value="Yearly">Yearly</option>
									</select>
								</span>
								<select id="period-details" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="period1" selected>Period 1</option>
                                    <option value="period2">Period 2</option>
                                </select>
							</div>

                            <input type="submit" name="btn_export" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Export">
                        </form>
                    </div>
                </div>
            </div>
        </div> 
		
		<ul class="pt-4 mt-4 space-y-2 border-t border-gray-300 dark:border-gray-600">
		  <h2 id="accordion-collapse-heading-3">
			<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-3" <?php if($aside == "create-glight") echo 'aria-expanded="true"'; else if($aside == "search-glight") echo 'aria-expanded="true"'; else echo 'aria-expanded="false"'?> aria-controls="accordion-collapse-body-3">
				<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
				<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Guang-Ming Light</span>
				<svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
		  </h2>
		
		  <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
			<ul>
				<li>
					<a href="create-glight.php?name=transaction&aside=create-glight" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "create-glight") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-plus"></i>
						<span class="ml-3">Create Guang-Ming Light</span>
					</a>
				</li>
				<li>
					<a href="search-glight.php?name=transaction&aside=search-glight" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "search-glight") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
						<i class="fa-solid fa-magnifying-glass"></i>
						<span class="ml-3">Search Guang-Ming Light</span>
					</a>
				</li>
				<li>
					<a class="ml-3 flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white dark:text-gray-400 group cursor-pointer" data-modal-toggle="light-modal">
						<i class="fa-solid fa-file-export"></i>
						<span class="ml-3">Export Record</span>
					</a>
				</li>
			</ul>
		  </div>
		</ul>
			
        <div id="light-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="light-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white">What would you like to export?</h3>
                        <form>	
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Choose a period</label>
                            <div class="flex mb-6">
								<span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
									<select id="period" class="text-gray-900 text-sm rounded-lg dark:text-white focus:ring-0 dark:focus:ring-0 bg-transparent border-0">
										<option value="Monthly" selected>Monthly</option>
										<option value="Yearly">Yearly</option>
									</select>
								</span>
								<select id="period-details" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="period1" selected>Period 1</option>
                                    <option value="period2">Period 2</option>
                                </select>
							</div>

                            <input type="submit" name="btn_export" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Export">
                        </form>
                    </div>
                </div>
            </div>
        </div> 
	</div>
</aside>