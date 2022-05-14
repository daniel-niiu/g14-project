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
		<script src="https://unpkg.com/flowbite@1.4.4/dist/datepicker.js"></script>
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
				Home
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<a href="search-member.php?name=member&aside=search-member" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Search Member</a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Edit Member</p>
			  </div>
			</li>
		  </ol>
		</nav>

		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Edit Member</h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<?php  
			$M_ID = $_GET['Id'];
	    	$sql = "SELECT * FROM member WHERE member_id = '".$M_ID."'"; 	 
	    	$result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
  			// output data of each row
  				while($row = mysqli_fetch_array($result)){   
			?>
			<form method="post" action="../php/member.php?method=update&Id=<?php echo $M_ID; ?>">
				<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member ID*</label>
							<input type="text"  id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="M000" value="<?php echo $row['member_id']; ?>" disabled readonly>
						</div>
					 	<div class="relative z-0 w-full mb-6 group">
							<label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Status</label>
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
							document.getElementById('status').innerHTML = 'Active'; 
							document.getElementById('checkbox_value').value = "Active";
						} 
						else{ 
							this.value = 'InActive'; 
							document.getElementById('status').innerHTML = 'InActive'; 
							document.getElementById('checkbox_value').value = "InActive";
						}
					});
					</script>
					<div class="grid xl:grid-cols-2 xl:gap-6">
					 	<div class="relative z-0 w-full mb-6 group">
							<label for="english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Name (English)</label>
							<input type="text" id="english" name="english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_eng_name']; ?>" placeholder="John Doe">
						 </div>
					 	<div class="relative z-0 w-full mb-6 group">
							<label for="chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Name (Chinese)</label>
							<input type="text" id="chinese" name="chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_chi_name']; ?>" placeholder="姓名">
						 </div>
					</div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">NRIC</label>
							<input type="text" id="ic" name="ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="001234-56-7890" value="<?php echo $row['member_ic']; ?>">
						 </div>
						 <div class="relative z-0 w-full mb-6 group">
							<label for="citizen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Citizenship</label>
							<input type="text" id="citizen" name="citizen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Malaysian" value="<?php echo $row['member_citizenship']; ?>">
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Age</label>
							<input type="text" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="30" value="<?php  
							  $today = date("Y-m-d");
							  $diff = date_diff(date_create($row['member_dob']), date_create($today));
							  echo $diff->format('%y');
							?>"
							disabled readonly>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gender</label>
							<select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							  <option value="male" <?php
							if($row['member_gender'] == "Male") 
								echo "selected";
						?>>Male</option>
							  <option value="female" <?php
							if($row['member_gender'] == "Female") 
								echo "selected";
						?>>Female</option>
							</select>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date of Birth</label>
							<div class="relative">
	  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
	    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
	  							</div>
	  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="dob" name="dob" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy"  value="<?php 
	  							$date = $row['member_dob'];
							    $date = date('d-m-Y', strtotime($date)); 
							    $date = str_replace('-', '/', $date); 
			    				echo $date;  
			    				?>">
							</div>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contact Number</label>
							<input type="text" id="contact" name="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_tel']; ?>" placeholder="0123456789">
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Occupation</label>
							<input type="text" id="job" name="job" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_job']; ?>" placeholder="Worker">
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Address</label>
							<input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_address']; ?>" placeholder="12, Kuching Road, Lane 34">
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="member" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Member Type</label>
							<select id="member" name="member" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							  <option value="normal" <?php
							if($row['member_type'] == "Normal") 
								echo "selected";
						?>>Normal</option>
							  <option value="permanent" <?php
							if($row['member_type'] == "Permanent") 
								echo "selected";
						?>>Permanent</option>
							  <option value="non-member" <?php
							if($row['member_type'] == "Non-member") 
								echo "selected";
						?>>Non-member</option>
							</select>
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="accept-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date of Admission</label>
							<div class="relative">
	  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
	    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
	  							</div>
	  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="accept-date" name="accept-date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php 
		  							$date = $row['accept_date'];
								    $date = date('d-m-Y', strtotime($date)); 
								    $date = str_replace('-', '/', $date); 
				    				echo $date;  
			    				?>" placeholder="dd/mm/yyyy">
							</div>
						</div>
					 </div>
					<div class="grid xl:grid-cols-2 xl:gap-6">
						<div class="relative z-0 w-full mb-6 group">
							<label for="recommender-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Recommender's ID</label>
							<input type="text" id="recommender-id" name="recommender-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['recommender_id']; ?>" placeholder="M001">
						</div>
						<div class="relative z-0 w-full mb-6 group">
							<label for="recommender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Recommender's Name</label>
							<input type="text" id="recommender" name="recommender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['recommender_name']; ?>" placeholder="Jane Doe">
						</div>
					 </div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remarks</label>
						<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a remark..."><?php echo $row['remarks']; ?></textarea>
					</div>
					 <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;">Submit</button>
			</form>
			<?php  
  				}
			}
			else{ 
    			echo "No record exists!!"; 
    		}
			?>
		</div>
	</div>
	</div>

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
