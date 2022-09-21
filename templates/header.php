<?php
error_reporting(0);
?>
<header>
	<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
		<div class="container flex flex-wrap justify-between items-center mx-auto">
			<?php
				if($_GET['name']!=""){
					echo "<a href=\"../index.php\" class=\"flex items-center\"><img class=\"mr-3 h-24 sm:h-24\" src=\"../images/logo.png\" alt=\"Home\">";
				}
				else{
			?>
			<a href="index.php" class="flex items-center">
			<img src="images/logo.png" class="mr-3 h-24 sm:h-24" alt="Home">
			<?php
			}
			?>
			<span class="self-center text-xl font-semibold dark:text-white inline-flex items-center p-2 ml-1 text-sm rounded-lg md:hidden">Tze Yin Membership<br/>Management Portal</span></a>
			<div class="flex items-center md:order-2">
				
				<button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5 mr-3">
    				<svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
    				<svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
				</button>
				
				<button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
					<?php
						if($_GET['name']!=""){
							echo "<img class=\"w-8 h-8 rounded-full\" src=\"../images/logo.png\" alt=\"user photo\">";
						}
						else{
					?>
						<img class="w-8 h-8 rounded-full" src="images/logo.png" alt="user photo">
					<?php	
					}
					?>
				</button>
				
				<div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(1054.4px, 983.6px, 0px);">
					<div class="py-3 px-4">
          				<span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">Welcome, User</span>
        			</div>
					<!--ul class="py-1" aria-labelledby="dropdown">
						<li>
							<button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5 mr-3"><p id="eng-lang">Language: English</p><p id="chi-lang">語言顯示：中文</p></button>
						</li>
					</ul-->
					<ul class="py-1" aria-labelledby="dropdown">
						<li>
							<a 
                             <?php 
                             if($_GET['name'] == 'account'){
                              	echo "href='create-account.php?name=account&aside=create-account'";
							 }
                             else if($_GET['name'] == ''){
                             	echo "href='accounts/create-account.php?name=account&aside=create-account'";
							 }
                             else if($_GET['name'] == 'member'){
                                 echo "href='../accounts/create-account.php?name=account&aside=create-account'";
                             }
                             else if($_GET['name'] == 'transaction'){
                                 echo "href='../accounts/create-account.php?name=account&aside=create-account'";
                             }
                             else if($_GET['name'] == 'product'){
                                 echo "href='../accounts/create-account.php?name=account&aside=create-account'";
                             }
                             else if($_GET['name'] == 'stock'){
                                 echo "href='../accounts/create-account.php?name=account&aside=create-account'";
                             }
                             else{ 
                                  echo "href='../accounts/create-account.php?name=account&aside=create-account'";
                              } 
                             ?> class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">Account Settings</a>
						</li>
						<li>
							<a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer" data-modal-toggle="authentication-modal5">Edit Password</a>
						</li>
					</ul>
					<ul class="py-1" aria-labelledby="dropdown">
						<li>
							<a 
							<?php  
								if (str_contains($_SERVER['REQUEST_URI'], 'index.php')) { 
									echo 'href="templates/logout.php"' ;
								}
								else{
									echo 'href="../templates/logout.php"';
								}
							?> class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign Out</a>
						</li>
					</ul>
				</div>
			
				<div id="authentication-modal5" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
					<div class="relative w-full h-full max-w-lg p-4 md:h-auto">
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
							<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal5">
								<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
							</button>
							<div class="px-6 py-6 lg:px-8">
								<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit User Password</h3>
									<form class="space-y-6" action="#">
										<div>
											<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
											<input type="text" id="email" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="Admin" disabled readonly>
											<p class="text-xs font-normal text-red-500 dark:text-red-300 ml-1">*You are not allowed to modify the email address.</p>
										</div>
										<div>
											<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account Type</label>
											
											<input type="radio" name="account-type" id="administrator" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="Administrator" checked disabled readonly>
											<label for="administrator" class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrator</label>
											
											<input type="radio" name="account-type" id="operator" class="ml-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="Operator" disabled readonly>
											<label for="operator" class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Operator</label>
											
											<p class="text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1">*You are not allowed to modify the account type.</p>
										</div>
										<!--div>
											<label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Current Password</label>
											<input type="password" name="current-password" id="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter your current password here" required>
										</div-->
										<div>
											<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New Password</label>
											<input type="password" name="password" id="edit-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter your new password here" required>
										</div>
										<div>
											<label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm Password</label>
											<input type="password" name="confirm-password" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Confirm your new password here" required>
										</div>
										
										<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
										
									</form>
							</div>
						</div>
					</div>
				</div> 
				
				<button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
					<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
				</button>
			</div>
			
			<div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
				<ul class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 lg:bg-white md:dark:bg-gray-900 dark:border-gray-700">
					<li>
						<a 
						   <?php 
						   if($_GET['name'] == 'member') 
							echo "href='create-member.php?name=member&aside=create-member' class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
						   else if($_GET['name'] == ""){
								echo "href='members/create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'transaction'){
							   echo "href='../members/create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'product'){
							   echo "href='../members/create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'stock'){
							   echo "href='../members/create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'account'){
							   echo "href='../members/create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								echo "href='../create-member.php?name=member&aside=create-member'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 
						   ?>>Membership</a>
					</li>
					<li>
						<a 
						   <?php 
						   if($_GET['name'] == 'transaction') 
							echo "href='create-tablet.php?name=transaction&aside=create-tablet' class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
						   else if($_GET['name'] == ""){
								echo "href='transactions/create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member'){
							   echo "href='../transactions/create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'product'){
							   echo "href='../transactions/create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'stock'){
							   echo "href='../transactions/create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'account'){
							   echo "href='../transactions/create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								echo "href='../create-tablet.php?name=transaction&aside=create-tablet'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 
						   ?>>Transaction</a>
					</li>
					<li>
						<a 
						   <?php 
						   if($_GET['name'] == 'product') 
							echo "href='create-product.php?name=product&aside=create-product' class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
						   else if($_GET['name'] == ""){
								echo "href='products/create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member'){
							   echo "href='../products/create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'transaction'){
							   echo "href='../products/create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'stock'){
							   echo "href='../products/create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'account'){
							   echo "href='../products/create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								echo "href='../create-product.php?name=product&aside=create-product'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 
						   ?>>Product</a>
					</li>
					<li>
						<a 
						   <?php 
						   if($_GET['name'] == 'stock') 
							echo "href='stock-in.php?name=stock&aside=stock-in' class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
						   else if($_GET['name'] == ""){
								echo "href='stocks/stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member'){
							   echo "href='../stocks/stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'transaction'){
							   echo "href='../stocks/stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'product'){
							   echo "href='../stocks/stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else if($_GET['name'] == 'account'){
							   echo "href='../stocks/stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								echo "href='../stock-in.php?name=stock&aside=stock-in'";
							   	echo'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 
						   ?>>Stock</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<button type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-full text-sm p-3 text-center mr-2 mb-2 fixed bottom-5 right-5" data-popover-target="popover-left" data-popover-placement="left" data-modal-toggle="quick-export-modal">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
</button>

<div id="popover-left" role="tooltip" class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
    <div class="py-2 px-4 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
        <h3 class="font-semibold text-gray-900 dark:text-white">Quick Export</h3>
    </div>
    <div class="py-2 px-4">
        <p>Export a detailed record of "Over Time Payment" for Tablet Transaction.</p>
    </div>
    <div data-popper-arrow></div>
</div>

<div id="quick-export-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md p-4 md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="quick-export-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="p-6 text-center">				
				<svg class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.707 7.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L13 8.586V5h3a2 2 0 012 2v5a2 2 0 01-2 2H8a2 2 0 01-2-2V7a2 2 0 012-2h3v3.586L9.707 7.293zM11 3a1 1 0 112 0v2h-2V3z"></path><path d="M4 9a2 2 0 00-2 2v5a2 2 0 002 2h8a2 2 0 002-2H4V9z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to quick export?</h3>
                <a href="#">
				<button data-modal-toggle="quick-export-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes, I'm sure</button>
				</a>
				<button data-modal-toggle="quick-export-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-6 py-2.5 text-center mr-2">No, cancel</button>
            </div>
        </div>
    </div>
</div>