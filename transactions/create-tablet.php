<?php
include "../db/dbconnection.php";    
isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark');
		}
	</script>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
	<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
	<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
	<script src="../script/script.js" type="text/javascript"></script> 
	<link rel="stylesheet" href="../styles/style.css">
	<link rel="icon" type="image/x-icon" href="../images/logo.ico">
	<title>Tze Yin Membership Management Portal</title>
</head>

<body class="dark:bg-gray-900">
	<?php
		include('../templates/header.php');
	?>	
	
	<div class="container flex flex-wrap mx-auto">
		
	<?php
		include('../templates/transaction-aside.php');
	?>
	
	<div class="mx-auto">
		<nav class="flex mb-4" aria-label="Breadcrumb">
		  <ol class="inline-flex items-center space-x-1 md:space-x-3">
			<li class="inline-flex items-center">
			  <a href="../index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
				<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
				Home
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Create Memorial Tablet</p>
			  </div>
			</li>
		  </ol>
		</nav>
	
		<div>
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Create Memorial Tablet</h2>

				<div class="flex justify-between">
					<button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="import-modal">
						<i class="fa-solid fa-file-import"></i>&nbsp; Import Tablet Record
					</button>

					<div id="import-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
						<div class="relative p-4 w-full max-w-md h-full md:h-auto">
							<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
								<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="import-modal">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
								</button>
								<div class="py-6 px-6 lg:px-8">
									<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Import Tablet Record</h3>
									<form class="space-y-6" method="post" action="tablet_transaction_import.php?type=tablet" id="import_excel_form" enctype="multipart/form-data">
										<div>
											<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload File</label>
											<input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" name="excel" type="file">
											<p class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-300">**Excel (.xlsx) File only.</p>
										</div>
										<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			<form method="post" action="../php/tablet.php?method=add" onsubmit="return tablet_validation()">
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tablet ID*</label>
						<input type="text" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="T000" required>
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_tid" style="display:none;">*Not allowed to empty and special character
						</p>
					</div>
				 	<div class="relative z-0 w-full mb-6 group">
						<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Installation Date</label>
						<div class="relative">
  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  							</div>
  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
						</div>
  							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_ins_date" style="display:none;">*Not allowed to empty</p>
					 </div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Zone</label>
						<input type="text" id="zone" name="zone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_zone" style="display:none;">*Not allowed to empty, alphabets and special character</p>
					 </div>
					 <div class="relative z-0 w-full mb-6 group">
						<label for="tier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tier</label>
						<input type="text" id="tier" name="tier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_tier" style="display:none;">*Not allowed to empty, alphabets and special character</p>
					</div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="row" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Row</label>
						<input type="text" id="row" name="row" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_row" style="display:none;">*Not allowed to empty, alphabets and special character</p>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
						<div class="flex">
						  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">RM</span>
						  <input type="text" id="price" name="price" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="40,500">
						</div>
						  <p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_price" style="display:none;">*Not allowed to empty, alphabets and special character</p>
				 </div>
				</div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Name (English)</label>
						<input type="text" id="english" name="english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_eng" style="display:none;">*Not allowed to empty, number and special character</p>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Name (Chinese)</label>
						<input type="text" id="chinese" name="chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="姓名">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_chi" style="display:none;">*Not allowed to empty, number and special character</p>
					</div>
				</div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="contact1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Primary Contact</label>
						<input type="text" id="contact1" name="contact1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0123456789">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_co1" style="display:none;">*Not allowed to empty and special character</p>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="contact2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Secondary Contact</label>
						<input type="text" id="contact2" name="contact2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0198765432">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_co2" style="display:none;">*Not allowed to empty and special character</p>
					</div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
						<input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="12, Kuching Road, Lane 34">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_add" style="display:none;">*Not allowed to empty and special character except comma</p>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Payment Type</label>
						<select id="t_payment" name="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						  <option value="lump-sum">Lump Sum Payment</option>
						  <option value="over-time">Over Time Payment</option>
						</select>
					</div>
				 </div>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="ancestor-english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ancestor Name (English)</label>
						<input type="text" id="ancestor-english" name="ancestor_english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jerry Doe">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_anc_eng" style="display:none;">*Not allowed to empty, number and special character</p>
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="ancestor-chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ancestor Name (Chinese)</label>
						<input type="text" id="ancestor-chinese" name="ancestor_chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="姓名">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_anc_chi" style="display:none;">*Not allowed to empty, number and special character</p>
					</div>
				 </div>
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remarks</label>
					<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a remark..."></textarea>
				</div>
				 <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;">Submit</button>
			</form>
		</div>
	</div>
	</div> 
	<?php 
	$success = $_GET['success']; 
	if($success == "success"){

	?>
	<div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Record created successfully.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<?php
	}
	else if($success == "fail"){
	?>
	<div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Record has been created before.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
	<?php
	} 
	?>	
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4">Disclaimer: This is a student work in progress for SWE40001/SWE40002 Software Engineering Project A/B of Swinburne University of Technology, Sarawak (2022).</p>
	</footer>
	
	<script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
	
	<script>
		var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
		var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

		// Change the icons inside the button based on previous settings
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			themeToggleLightIcon.classList.remove('hidden');
		} else {
			themeToggleDarkIcon.classList.remove('hidden');
		}

		var themeToggleBtn = document.getElementById('theme-toggle');

		themeToggleBtn.addEventListener('click', function() {

			// toggle icons inside button
			themeToggleDarkIcon.classList.toggle('hidden');
			themeToggleLightIcon.classList.toggle('hidden');

			// if set via local storage previously
			if (localStorage.getItem('color-theme')) {
				if (localStorage.getItem('color-theme') === 'light') {
					document.documentElement.classList.add('dark');
					localStorage.setItem('color-theme', 'dark');
				} else {
					document.documentElement.classList.remove('dark');
					localStorage.setItem('color-theme', 'light');
				}

			// if NOT set via local storage previously
			} else {
				if (document.documentElement.classList.contains('dark')) {
					document.documentElement.classList.remove('dark');
					localStorage.setItem('color-theme', 'light');
				} else {
					document.documentElement.classList.add('dark');
					localStorage.setItem('color-theme', 'dark');
				}
			}

		});
	</script>
</body>
</html>
