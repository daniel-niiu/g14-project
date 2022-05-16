<?php
	$aside = $_GET['aside'];
?>
<aside class="w-72 mx-auto mb-4 pr-4" id="accordion-collapse" data-accordion="collapse">
	<div class="overflow-y-auto py-4 px-4 bg-gray-100 rounded dark:bg-gray-800">
		<ul class="space-y-2">
			 <li>
				<h3 class="flex items-center p-2 text-base font-semibold text-gray-900 rounded-lg dark:text-white">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
					<span class="ml-3">Manage Transaction</span>
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
					</ul>
				  </div>
			</li>
		</ul>
		
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
			</ul>
		  </div>
		</ul>
		
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
			</ul>
		  </div>
		</ul>
	</div>
</aside>