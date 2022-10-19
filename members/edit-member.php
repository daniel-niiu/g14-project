<?php
include "../db/dbconnection.php";    
isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
		<script>
			if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
				document.documentElement.classList.add('dark');
			} else {
				document.documentElement.classList.remove('dark');
			}
		</script>
		<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
		<script src="../script/script.js" type="text/javascript"></script> 
		<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
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
				<a href="search-member.php?name=member&aside=search-member" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['search-member']; ?></a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['edit-member']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>

		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['edit-member']; ?></h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<?php  
			$M_ID = $_GET['Id'];
	    	$sql = "SELECT * FROM member WHERE member_id = '".$M_ID."'"; 	 
	    	$result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
  			// output data of each row
  				while($row = mysqli_fetch_array($result)){   
			?>
			<form method="post" action="../php/member.php?method=update&Id=<?php echo $M_ID; ?>" onsubmit="return member_validation()">
				<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-id']; ?></label>
							<input type="text"  id="mid" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="M000" value="<?php echo $row['member_id']; ?>" disabled>
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="pmid" style="display:none;"><?php echo $form['id-warning']; ?></p>
						</div>
					 	<div class="relative z-0 w-full mb-6 group">
							<label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-status']; ?></label>
							<label for="checkbox" class="inline-flex relative items-center cursor-pointer mt-1">
							  <input type="checkbox"id="checkbox" name="checkbox" value="<?php echo $row['member_status']; ?>"  class="sr-only peer" 
							  <?php 
							  if($row['member_status'] == "Active"){
							  	echo "checked";
							  }
							  else{ 
							  }
								?>>
							  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
							  <span id="status" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $row['member_status']; ?></span> 
						  		<input type="hidden" id="checkbox_value" name="checkbox_value" value="<?php echo $row['member_status']; ?>">
							</label>
						</div> 
					 </div>
					<script>
					document.getElementById('checkbox').addEventListener('click', function(){
						if(this.checked){
							this.value = 'Active';
							document.getElementById('status').innerHTML = '<?php echo $member['status-active']; ?>'; 
							document.getElementById('checkbox_value').value = "Active";
						} 
						else{ 
							this.value = 'Inactive'; 
							document.getElementById('status').innerHTML = '<?php echo $member['status-inactive']; ?>'; 
							document.getElementById('checkbox_value').value = "Inactive";
						}
					});
					</script>
					<div class="grid xl:grid-cols-2 xl:gap-6">
					 	<div class="relative z-0 w-full mb-6 group">
							<label for="english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['eng-name']; ?></label>
							<input type="text" id="english" name="english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_eng_name']; ?>" placeholder="<?php echo $member['eng-name']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_eng" style="display:none;"><?php echo $form['word-warning']; ?></p>
						 </div>
					 	<div class="relative z-0 w-full mb-6 group">
							<label for="chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['chi-name']; ?></label>
							<input type="text" id="chinese" name="chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_chi_name']; ?>" placeholder="<?php echo $member['chi-name']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_m_chi" style="display:none;"><?php echo $form['word-warning']; ?></p>
						 </div>
					</div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['nric']; ?></label>
							<input type="text" id="nric" name="ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['nric']; ?>" value="<?php echo $row['member_ic']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_ic" style="display:none;"><?php echo $form['empty-warning']; ?></p>
						 </div>
						 <div class="relative z-0 w-full mb-6 group">
							<label for="citizen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['citizenship']; ?></label>
							<input type="text" id="citizen" name="citizen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['citizenship']; ?>" value="<?php echo $row['member_citizenship']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_citizen" style="display:none;"><?php echo $form['word-warning']; ?></p>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['age']; ?></label>
							<input type="text" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $member['age']; ?>" value="<?php  
							  $today = date("Y-m-d");
							  $diff = date_diff(date_create($row['member_dob']), date_create($today));
							  echo $diff->format('%y');
							?>"
							disabled readonly>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['gender']; ?></label>
							<select id="m_gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							  <option value="Male" <?php
							if($row['member_gender'] == "Male") 
								echo "selected";
						?>><?php echo $member['gender-male']; ?></option>
							  <option value="Female" <?php
							if($row['member_gender'] == "Female") 
								echo "selected";
						?>><?php echo $member['gender-female']; ?></option>
							</select>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['dob']; ?></label>
							<div class="relative">
	  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
	    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
	  							</div>
	  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="m_dob" name="dob" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy"  value="<?php 
	  							$date = $row['member_dob'];
							    $date = date('d-m-Y', strtotime($date)); 
							    $date = str_replace('-', '/', $date); 
			    				echo $date;  
			    				?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_dob" style="display:none;"><?php echo $form['empty-warning']; ?></p>
							</div>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['contact']; ?></label>
							<input type="text" id="co_contact" name="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_tel']; ?>" placeholder="<?php echo $member['contact']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_co" style="display:none;"><?php echo $form['empty-warning']; ?></p>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['occupation']; ?></label>
							<input type="text" id="m_job" name="job" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_job']; ?>" placeholder="<?php echo $member['occupation']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_job" style="display:none;"><?php echo $form['word-warning']; ?></p>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['address']; ?></label>
							<input type="text" id="m_address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_address']; ?>" placeholder="<?php echo $member['address']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_add" style="display:none;"><?php echo $form['empty-warning']; ?></p>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="member" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-type']; ?></label>
							<select id="m_member" name="member" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							  <option value="Normal" <?php
							if($row['member_type'] == "Normal") 
								echo "selected";
						?>><?php echo $member['type-normal']; ?></option>
							  <option value="Permanent" <?php
							if($row['member_type'] == "Permanent") 
								echo "selected";
						?>><?php echo $member['type-permanent']; ?></option>
							  <option value="Non-member" <?php
							if($row['member_type'] == "Non-member") 
								echo "selected";
						?>><?php echo $member['type-non-member']; ?></option>
							</select>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="accept-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['admission']; ?></label>
							<div class="relative">
	  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
	    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
	  							</div>
	  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="m_accept-date" name="accept-date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php 
		  							$date = $row['accept_date'];
								    $date = date('d-m-Y', strtotime($date)); 
								    $date = str_replace('-', '/', $date); 
				    				echo $date;  
			    				?>" placeholder="dd/mm/yyyy">
								<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_acc-date" style="display:none;"><?php echo $form['empty-warning']; ?></p>
							</div>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="recommender-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-id']; ?></label>
							<input type="text" id="m_recommender-id" name="recommender-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['recommender_id']; ?>" placeholder="<?php echo $member['recommender-id']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_rid" style="display:none;"><?php echo $form['id-warning']; ?></p>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="recommender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-name']; ?></label>
							<input type="text" id="m_recommender" name="recommender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['recommender_name']; ?>" placeholder="<?php echo $member['recommender-name']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_rname" style="display:none;"><?php echo $form['word-warning']; ?></p>
						</div>
					 </div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
						<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $form['remarks']; ?>"><?php echo $row['remarks']; ?></textarea>
					</div>
					 <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;"><?php echo $form['submit']; ?></button>
			</form>
			<?php  
  				}
			}
			else{ 
    			echo $form['no-record-warning']; 
    		}
			?>
		</div>
	</div>
	</div>

	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
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
