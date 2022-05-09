<?php
	$aside = $_GET['aside'];
?>
<aside class="w-72 mx-auto mb-4 pr-4" aria-label="Sidebar">
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
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-tablet" data-collapse-toggle="dropdown-tablet">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Memorial Tablet</span>
						<svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
					<ul id="dropdown-tablet" class="hidden py-2 space-y-2">
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
					</ul>
				</li>
			</ul>
			<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
				<li>
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-lantern" data-collapse-toggle="dropdown-lantern">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Blessing Lantern</span>
						<svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
					<ul id="dropdown-lantern" class="hidden py-2 space-y-2">
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
				</li>
			</ul>
			<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
				<li>
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-light" data-collapse-toggle="dropdown-light">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Guang-Ming Light</span>
						<svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
					<ul id="dropdown-light" class="hidden py-2 space-y-2">
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
				</li>
			</ul>
			<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
				<li>
					<button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-shortcut" data-collapse-toggle="dropdown-shortcut">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
						<span class="flex-1 ml-4 text-left font-semibold whitespace-nowrap" sidebar-toggle-item="">Transaction Hotkey</span>
						<svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
					</button>
					<ul id="dropdown-shortcut" class="hidden py-2 space-y-2">
						<li>
							<a href="create-tablet-transaction.php?name=transaction&aside=tablet-transaction" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "tablet-transaction") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-plus"></i>
								<span class="ml-3">Add Tablet Transaction</span>
							</a>
						</li>
						<li>
							<a href="create-blantern-transaction.php?name=transaction&aside=blantern-transaction" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "blantern-transaction") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-plus"></i>
								<span class="ml-3">Add Blessing Lantern Transaction</span>
							</a>
						</li>
						<li>
							<a href="create-glight-transaction.php?name=transaction&aside=glight-transaction" class="flex items-center p-2 pl-5 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 <?php if($aside == "glight-transaction") echo "md:text-blue-700 dark:text-white"; else echo "dark:hover:text-white dark:text-gray-400"?> hover:bg-gray-200 dark:hover:bg-gray-700 group">
								<i class="fa-solid fa-plus"></i>
								<span class="ml-3">Add Guang-Ming Light Transaction</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</aside>