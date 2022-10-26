<?php 
error_reporting(0);
	$fileparts = explode('/',$_SERVER['REQUEST_URI']); 
	$filename = array_pop($fileparts);    
if (str_contains($filename, 'index.php')) { 
	include "php/config.php"; 
} 
else 
	include "../php/config.php"; 
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
			<span class="self-center text-xl font-semibold dark:text-white inline-flex items-center p-2 ml-1 text-sm rounded-lg md:hidden"><?php echo $page['portal'];?></span></a>
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
          				<span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?php echo $page['profile-user'];?></span>
        			</div>
					<ul class="py-1" aria-labelledby="dropdown">
						<li>
							<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer" onClick="onClick()"><i class="fa-sharp fa-solid fa-earth-asia"></i>&nbsp; <?php echo $page['profile-language'];?></a>
						</li>
					</ul>
					<ul class="py-1" aria-labelledby="dropdown">
						<?php 
							if($_SESSION['type'] == "admin" && $_SESSION['username'] == "admin")
							{ 
						?>
						<li>
							<a 
                             <?php 
                             $name_href = "";
                             if($_GET['name'] == 'account'){
                              	$name_href = "href='create-account.php?name=account&aside=create-account";
							 }
                             else if($_GET['name'] == ''){
                             	$name_href= "href='accounts/create-account.php?name=account&aside=create-account";
							 }
                             else if($_GET['name'] == 'member'){
                                 $name_href = "href='../accounts/create-account.php?name=account&aside=create-account";
                             }
                             else if($_GET['name'] == 'transaction'){
                                 $name_href = "href='../accounts/create-account.php?name=account&aside=create-account";
                             }
                             else if($_GET['name'] == 'product'){
                                 $name_href = "href='../accounts/create-account.php?name=account&aside=create-account";
                             }
                             else if($_GET['name'] == 'stock'){
                                 $name_href = "href='../accounts/create-account.php?name=account&aside=create-account";
                             }
                             else{ 
                                  $name_href = "href='../accounts/create-account.php?name=account&aside=create-account";
                             } 
                            if($_SESSION['lang'] == 'en'){
                              	echo $name_href .= "&lang=en'";
                            }
                            else {
                            	echo $name_href .= "&lang=ch'";
                            }
                             ?> class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer"><?php echo $page['profile-acc-settings'];?></a>
						</li> 
						<?php 
							}
						?>
						<li>
							<a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer" data-modal-toggle="authentication-modal5"><?php echo $page['profile-password'];?></a>
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
							?> class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><?php echo $page['profile-signout'];?></a>
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
								<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><?php echo $page['profile-password'];?></h3>

					                <?php 
									$url =  $_SERVER['REQUEST_URI'];
									$file_name = basename(parse_url($url, PHP_URL_PATH)); 
					                if(str_contains($file_name,"index.php")){
										echo "<form class=\"space-y-6\" action=\"php/account.php?method=updatePassword\" method=\"post\">";
					                }
					                else
					                {
										echo "<form class=\"space-y-6\" action=\"../php/account.php?method=updatePassword\" method=\"post\">";
					                }
					                
					            	?> 
										<div>
											<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $account['email-address'];?></label>
											<input type="text" id="email" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $_SESSION['username']; ?>" disabled readonly>
											<p class="text-xs font-normal text-red-500 dark:text-red-300 ml-1"><?php echo $account['email-title'];?></p>
										</div>
										<div>
											<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $account['account-type'];?></label>
											
											<input type="radio" name="account-type" id="administrator" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="Administrator" checked disabled readonly>
											<label class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-not-allowed">
												<?php 
													if(str_contains($_SESSION['type'],"admin"))
													{
														echo $account['type-admin'];
													}
													else
													{ 
														$data = ""; 
														if(str_contains($_SESSION['type'], "M"))
															$data .= $page['membership']."-";
														if(str_contains($_SESSION['type'], "T"))
															$data .= $page['transaction']."-";
														if(str_contains($_SESSION['type'], "P"))
															$data .= $account['product-stock']."-";
														echo $account['type-oper']."(";
														echo rtrim($data,"-");
														echo ")";
													}
												?>
											</label> 
											
											<p class="text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1"><?php echo $account['type-title'];?></p>
										</div>
										<?php 
											if($_SESSION['username'] != "admin")
											{
										?>
										<div>
											<label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $account['old-password'];?></label>
											<input type="password" name="current-password" id="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="<?php echo $account['current-password-placeholder'];?>" required>
										</div>
										<div>
											<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $account['new-password'];?></label>
											<input type="password" name="password" id="edit_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="<?php echo $account['new-password-placeholder'];?>" required>
										</div>
										<div>
											<label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $account['confirm-password'];?></label>
											<input type="password" name="confirm-password" id="confirm_password" onkeyup="comfirmPassword()" r class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="<?php echo $account['confirm-password-placeholder'];?>" required>
										</div> 
	                                    <div id="correct_pass" class="hidden flex text-green-500 dark:text-green-400">
	                                        <i class="fa-solid fa-check"></i>
	                                        <p class="ml-2 text-xs">The password is match.</p>
	                                    </div>	
	                                    <div id="wrong_pass" class="hidden flex text-red-500 dark:text-red-400">
	                                        <i class="fa-solid fa-xmark"></i>
	                                        <p class="ml-2 text-xs">The password is incorrect. Please try again.</p>
	                                    </div>	
										<button type="submit" id="btn_forgotpw_submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo $form['submit'];?></button>
										<?php 
											}
										?>
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
					<?php 

						if(str_contains($_SESSION['type'], "M") || $_SESSION['type'] == "admin") 
						{
					?>
					<li>
						<a 
						   <?php 
                           $name = "";
						   $class = "";
						   if($_GET['name'] == 'member')
						   {
								$name = "href='create-member.php?name=member&aside=create-member";
								$class = "class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 

						   } 
						   else if($_GET['name'] == ""){
								$name =  "href='members/create-member.php?name=member&aside=create-member";
							   	$class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'transaction' || $_GET['name'] == 'product' || $_GET['name'] == 'stock' || $_GET['name'] == 'account'){ 
							   	$name =  "href='../members/create-member.php?name=member&aside=create-member";
							   	$class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								$name = "href='../create-member.php?name=member&aside=create-member";
							   	$class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 

                            if($_GET['lang'] == 'en'){
                              	$name .= "&lang=en'";
                            }
                            else {
                            	$name .= "&lang=ch'";
                            };
                            echo $name;
                            echo $class;
						   ?>><?php echo $page['membership']; ?></a>
					</li>
					<?php 
						}
					if(str_contains($_SESSION['type'], "T") || $_SESSION['type'] == "admin") 
					{
					?>
					<li>
						<a 
						   <?php 
						   $name = "";
						   $class = "";
						   if($_GET['name'] == 'transaction'){ 
								$name = "href='create-tablet.php?name=transaction&aside=create-tablet";
								$class = "class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
						   } 
						   else if($_GET['name'] == ""){
								$name = "href='transactions/create-tablet.php?name=transaction&aside=create-tablet";
							   	$class = 'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member' || $_GET['name'] == 'product' || $_GET['name'] == 'stock' || $_GET['name'] == 'account'){
							   $name = "href='../transactions/create-tablet.php?name=transaction&aside=create-tablet";
							   $class = 'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								$name = "href='../create-tablet.php?name=transaction&aside=create-tablet";
							   	$class = 'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 

                            if($_SESSION['lang'] == 'en'){
                              	$name .= "&lang=en'";
                            }
                            else {
                            	$name .= "&lang=ch'";
                            }
                            echo $name;
                            echo $class;
						   ?>><?php echo $page['transaction']; ?></a>
					</li>

					<?php 
					}
						if(str_contains($_SESSION['type'], "P") || $_SESSION['type'] == "admin") 
						{
					?>
					<li>
						<a 
						   <?php 
                           $name = "";
						   $class = "";
						   if($_GET['name'] == 'product') 
						   	{
								$name = "href='create-product.php?name=product&aside=create-product";
								$class = "class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
							}
						   else if($_GET['name'] == "")
						   {
								$name = "href='products/create-product.php?name=product&aside=create-product";
								$class = 'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member' || $_GET['name'] == 'transaction' || $_GET['name'] == 'stock' || $_GET['name'] == 'account'){
							   $name = "href='../products/create-product.php?name=product&aside=create-product";
							   $class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								$name = "href='../create-product.php?name=product&aside=create-product";
							   	$class = 'class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 

                            if($_SESSION['lang'] == 'en'){
                              	$name .= "&lang=en'";
                            }
                            else {
                            	$name .= "&lang=ch'";
                            }
                            echo $name;
                            echo $class;
						   ?>><?php echo $page['product']; ?></a>
					</li> 
					<li>
						<a 
						   <?php 
                           $name = "";
						   $class = "";
						   if($_GET['name'] == 'stock') 
						   {
								$name = "href='stock-in.php?name=stock&aside=stock-in";
								$class = "class='block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white' aria-current='page'"; 
							}
						   else if($_GET['name'] == ""){
								$name = "href='stocks/stock-in.php?name=stock&aside=stock-in";
							   	$class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							}
						   else if($_GET['name'] == 'member' || $_GET['name'] == 'transaction' || $_GET['name'] == 'product' || $_GET['name'] == 'account'){
							   $name = "href='../stocks/stock-in.php?name=stock&aside=stock-in";
							   $class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
						   }
						   else{ 
								$name = "href='../stock-in.php?name=stock&aside=stock-in";
							   	$class ='class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
							} 

                            if($_GET['lang'] == 'en'){
                              	$name .= "&lang=en'";
                            }
                            else {
                            	$name .= "&lang=ch'";
                            };
                            echo $name;
                            echo $class;
						   ?>><?php echo $page['stock']; ?></a>
					</li>
					<?php 
						}
					?>
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
        <h3 class="font-semibold text-gray-900 dark:text-white"><?php echo $page['quick-export'];?></h3>
    </div>
    <div class="py-2 px-4">
        <p><?php echo $page['quick-export-popout'];?></p>
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?php echo $page['quick-export-title'];?></h3>
                
                <?php 
				$url =  $_SERVER['REQUEST_URI'];
				$file_name = basename(parse_url($url, PHP_URL_PATH)); 
                if(str_contains($file_name,"index.php")){
                	echo "<a href=\"php/quick_export.php\">";
                }
                else
                {
                	echo "<a href=\"../php/quick_export.php\">";
                }
                
            	?>
				<button data-modal-toggle="quick-export-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"><?php echo $form['confirm']; ?></button>
				</a>
				<button data-modal-toggle="quick-export-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-6 py-2.5 text-center mr-2"><?php echo $form['cancel']; ?></button>
            </div>
        </div>
    </div>
</div>

<script>  
function onClick() {
    var str_url = window.location.href; 
	
	if(str_url.includes("?lang=en") == true){
		changeLanguageCHI();
	}
	else if(str_url.includes("&lang=en") == true){
		changeLanguageCHI();
	}
	else if(str_url.includes("?lang=ch") == true){
		changeLanguageENG();
	}
	else if(str_url.includes("&lang=ch") == true){
		changeLanguageENG();
	}
    else{ 
        location.href = window.location.href+"?lang=en";
    }
}
	
function changeLanguageENG() {  
    var str_url = window.location.href; 
    if(str_url.includes("index.php") == true)
    {  
        if(str_url.includes("?lang=en") == true)
        {
            location.href = window.location.href;
        }
        else if(str_url.includes("?lang=ch") == true)
        { 
            var temp = '';
            temp = str_url.replace("?lang=ch","?lang=en")
            location.href = temp;
        }
        else{ 
            location.href = window.location.href+"?lang=en";
        }
    } 
    else
    { 
        if(str_url.includes("&lang=en") == true)
        {
            location.href = window.location.href;
        }
        else if(str_url.includes("&lang=ch") == true)
        { 
            var temp = '';
            temp = str_url.replace("&lang=ch","&lang=en")
            location.href = temp;
        }
        else{

            location.href = window.location.href+"&lang=en";
        }
    }
}
	
function changeLanguageCHI() {   
    var str_url = window.location.href;
    if(str_url.includes("index.php") == true)
    {  
        if(str_url.includes("?lang=ch") == true)
        {
            location.href = window.location.href;
        }
        else if(str_url.includes("?lang=en") == true)
        { 
            var temp = '';
            temp = str_url.replace("?lang=en","?lang=ch");
            location.href = temp;
        }
        else{ 
            location.href = window.location.href+"?lang=ch";
        }
    } 
    else
    { 
        if(str_url.includes("&lang=ch") == true)
        {
            location.href = window.location.href;
        }
        else if(str_url.includes("&lang=en") == true)
        { 
            var temp = '';
            temp = str_url.replace("&lang=en","&lang=ch")
            location.href = temp;
        }
        else{

            location.href = window.location.href+"&lang=ch";
        }
    }
}
function comfirmPassword(){
	var pw1 = document.getElementById("edit_password").value;
	var pw2 = document.getElementById("confirm_password").value;
	var cpw = document.getElementById("correct_pass");
	var wpw = document.getElementById("wrong_pass"); 
	var btn = document.getElementById("btn_forgotpw_submit");
	if(pw1 !== pw2)
	{
		cpw.classList.add("hidden");
  		wpw.classList.remove("hidden");
  		btn.disabled = true;
	}
	else
	{
		cpw.classList.remove("hidden");
  		wpw.classList.add("hidden");
  		btn.disabled = false;
	}
}
</script>