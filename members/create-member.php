<?php
include "../db/dbconnection.php";    
isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
	<script>
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark');
		}
	</script> 
	<script src="https://unpkg.com/flowbite@1.5.4/dist/datepicker.js"></script>
	<script src="../script/script.js" type="text/javascript"></script> 
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
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
		include('../templates/member-aside.php');
	?>
	
	<div class="mx-auto">
		<nav class="flex mb-4" aria-label="Breadcrumb">
		  <ol class="inline-flex items-center space-x-1 md:space-x-3">
			<li class="inline-flex items-center">
			  <a href="../index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
				<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
				<?php echo $title['home']; ?>
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['create-member']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
		
		<div>
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['create-member']; ?></h2>
  
				<div class="flex justify-between">
					<button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="import-modal">
						<i class="fa-solid fa-file-import"></i>&nbsp; <?php echo $import['import-record']; ?>
					</button>

					<div id="import-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
						<div class="relative p-4 w-full max-w-md h-full md:h-auto">
							<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
								<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="import-modal">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
								</button>
								<div class="py-6 px-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><?php echo $import['import-record']; ?></h3>
									<form method="post" id="import_excel_form" action="member-import.php" enctype="multipart/form-data">
										<div class="mb-4">
											<div class="grid gap-6 md:grid-cols-2">
												<div>
													<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input"><?php echo $import['upload-file']; ?></label>
												</div>
												<div>
													<a href ="../php/member.php?method=quick_export" class="text-sm font-medium text-blue-700 dark:text-gray-300 hover:text-blue-800 dark:hover:text-white hover:underline cursor-pointer" style="float:right;"><?php echo $import['download-template']; ?></a>
												</div>
											</div>
											<input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" name="excel" type="file">
											<p class="mt-1 ml-1 text-xs text-gray-500 dark:text-gray-300"><?php echo $import['upload-warning']; ?></p>
										</div>
										<button type="submit" id="submit_file" name="submit_file" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo $form['submit']; ?></button>
									</form>
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			<form method="post" action="../php/member.php?method=add" onsubmit="return member_validation()">
    			<div class="grid gap-6 mb-6 md:grid-cols-2">
					<div>
						<label for="mid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-id']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="mid" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['member-id']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="pmid" style="display:none;"><?php echo $form['id-warning']; ?></p>
					</div>
				 	<div>
						<label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-status']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<label for="checkbox" class="inline-flex relative items-center cursor-pointer mt-1">
						  <input type="checkbox" id="checkbox" name="checkbox" class="sr-only peer"  value="Active" checked>
						  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
						  <span id="status" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['status-active']; ?></span>
						  <input type="hidden" id="checkbox_value" name="checkbox_value" value="Active">
						</label>
					</div>
				
					<script>
					document.getElementById('checkbox').addEventListener('click', function(){
						if(this.checked){
							this.value = 'Active';
							document.getElementById('status').innerHTML = '<?php echo $member['status-active']; ?>'; 
							document.getElementById('checkbox_value').value = "Active";
						} 
						else{ 
							this.value = 'InActive'; 
							document.getElementById('status').innerHTML = '<?php echo $member['status-inactive']; ?>'; 
							document.getElementById('checkbox_value').value = "Inactive";
						}
					});
					</script>
					
					<div>
						<label for="english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['eng-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="english" name="english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['eng-name']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_eng" style="display:none;"><?php echo $form['word-warning']; ?></p>
					 </div>
					<div>
						<label for="chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['chi-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="chinese" name="chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['chi-name']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_chi" style="display:none;"><?php echo $form['word-warning']; ?></p>
					 </div>
					<div>
						<label for="ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['nric']; ?><span class="text-blue-500 dark:text-blue-300">*</span></label>
						<input type="text" id="nric" name="ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['nric']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_ic" style="display:none;"><?php echo $form['word-warning']; ?></p>
					 </div>
					 <div>
						<label for="citizen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['citizenship']; ?><span class="text-blue-500 dark:text-blue-300">*</span></label>
						<input type="text" id="citizen" name="citizen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['citizenship']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_citizen" style="display:none;"><?php echo $form['word-warning']; ?></p> 
					</div>
					<div>
						<label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['gender']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<select id="m_gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						  <option value="Male" selected><?php echo $member['gender-male']; ?></option>
						  <option value="Female"><?php echo $member['gender-female']; ?></option>
						</select>
					</div>
					<div>
						<label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['dob']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<div class="relative">
  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    							<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  							</div>
  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-autohide type="text" id="m_dob" name="dob" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
						</div>
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_dob" style="display:none;"><?php echo $form['empty-warning']; ?></p>
					</div>
					<div>
						<label for="co_contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['contact']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="co_contact" name="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['contact']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_co" style="display:none;"><?php echo $form['word-warning']; ?></p>
					</div>
					<div>
						<label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['occupation']; ?></label>
						<input type="text" id="m_job" name="job" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['occupation']; ?>">
					</div>
					<div>
						<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['address']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="m_address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['address']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_add" style="display:none;"><?php echo $form['id-warning']; ?></p>
					</div>
					<div>
						<label for="member" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-type']; ?></label>
						<select id="m_member" name="member" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						  <option value="Normal" selected><?php echo $member['type-normal']; ?></option>
						  <option value="Permanent"><?php echo $member['type-permanent']; ?></option>
						  <option value="Non-member"><?php echo $member['type-non-member']; ?></option>
						</select>
					</div>
					<div>
						<label for="accept-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['admission']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<div class="relative">
  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    							<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  							</div>
  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-autohide type="text" id="m_accept-date" name="accept-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
						</div>
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_acc-date" style="display:none;"><?php echo $form['empty-warning']; ?></p>
					</div>
					<div>
						<label for="recommender-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-id']; ?></label>
						<input type="text" id="m_recommender-id" name="recommender-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['recommender-id']; ?>">
					</div>
					<div>
						<label for="recommender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-name']; ?></label>
						<input type="text" id="m_recommender" name="recommender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['recommender-name']; ?>">
					</div>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
					<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $form['remarks']; ?>"></textarea>
				</div>
				 <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;"><?php echo $form['submit']; ?></button>
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
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-success-create-record']; ?></div>
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
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-fail-create-record']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div> 
	<?php
	} 
	?>
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
	</footer>
	
	<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
	
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> 
	</script> 
</body>
</html>
