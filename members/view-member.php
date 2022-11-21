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
				<a href="search-member.php?name=member&aside=search-member" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['search-member']; ?></a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-member']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
	
		<?php  
			$M_ID = $_GET['Id']; 
		    $sql = "SELECT * FROM member WHERE member_id = '".$M_ID."'"; 	  
		    $result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
		  	// output data of each row
		  		$row = mysqli_fetch_array($result); 
		?>
		
		<div>
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-member']; ?></h2>
				<div class="flex justify-between">
					<a href="edit-member.php?name=member&Id=<?php echo $row['member_id']; ?>">
						<button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
							<i class="fa-solid fa-pencil"></i>&nbsp; <?php echo $form['edit-record']; ?>
						</button>
					</a>

					<button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="delete-popup-modal">
						<i class="fa-solid fa-trash-can"></i>&nbsp; <?php echo $form['delete-record']; ?>
					</button> 

					<div id="delete-popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
						<div class="relative w-full h-full max-w-md p-4 md:h-auto">
							<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
								<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-popup-modal">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
								</button>
								<div class="p-6 text-center">
									<svg class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
									<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?php echo $form['delete-record-title']; ?></h3>
									<a href="../php/member.php?Id=<?php echo $row['member_id'];?>&method=delete"><button data-modal-toggle="delete-popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
										<?php echo $form['confirm']; ?>
									</button></a>
									<button data-modal-toggle="delete-popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo $form['cancel']; ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
		
		<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<form>
    			<div class="grid gap-6 mb-6 md:grid-cols-2">
					<div>
						<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-id']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="id" name="id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_id']; ?>" disabled readonly>
					</div>
				 	<div>
						<label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-status']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="status" name="status" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_status']; ?>"disabled readonly>
					 </div>
					<div>
						<label for="eng" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['eng-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="eng" name="eng" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_eng_name']; ?>" disabled readonly>
					</div>
				 	<div>
						<label for="chi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['chi-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="chi" name="chi" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_chi_name']; ?>"disabled readonly>
					 </div>
					<div>
						<label for="ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['nric']; ?><span class="text-blue-500 dark:text-blue-300">*</span></label>
						<input type="text" id="ic" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php 
						echo $row['member_ic']; ?>" disabled readonly>
					 </div>
					 <div>
						<label for="citizen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['citizenship']; ?><span class="text-blue-500 dark:text-blue-300">*</span></label>
						<input type="text" id="citizen" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_citizenship']; ?>" disabled readonly>
					</div>
					<div>
						<label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['age']; ?></label>
						<input type="text" id="age" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php  
    					date_default_timezone_set("Asia/Kuala_Lumpur");
					  	$today = date("Y-m-d");
					  	$diff = date_diff(date_create($row['member_dob']), date_create($today));
					  	echo $diff->format('%y');
					?>" disabled readonly>
					</div>
					<div>
						<label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['gender']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="gender" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_gender']; ?>"disabled readonly>
					</div>
					<div>
						<label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['dob']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="date" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo date("d-m-Y", strtotime($row['member_dob'])); ?>"disabled readonly>
					</div>
					<div>
						<label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['contact']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="contact" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_tel']; ?>"disabled readonly>
					</div>
					<div>
						<label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['occupation']; ?></label>
						<input type="text" id="job" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_job']; ?>"disabled readonly>
					</div>
					<div>
						<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['address']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="address" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_address']; ?>"disabled readonly>
					</div>
					<div>
						<label for="member" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['member-type']; ?></label>
						<input type="text" id="member" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['member_type']; ?>"disabled readonly>
					</div>
					<div>
						<label for="accept-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['admission']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="accept-date" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo date("d-m-Y", strtotime($row['accept_date'])); ?>"disabled readonly>
					</div>
					<div>
						<label for="recommender-id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-id']; ?></label>
						<input type="text" id="recommender-id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recommender_id']; ?>"disabled readonly>
					</div>
					<div>
						<label for="recommender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['recommender-name']; ?></label>
						<input type="text" id="recommender" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recommender_name']; ?>"disabled readonly>
					</div>
					<div>
						<label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['recorded-by']; ?></label>
						<input type="text" id="user" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recordedBy']; ?>" disabled readonly>
					</div>
					<div>
						<label for="record-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['recorded-on']; ?></label>
						<input type="text" id="record-date" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" value="<?php echo $row['recordedOn']; ?>" disabled readonly>
					</div>
				</div>
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
					<textarea id="remarks" rows="3" cols="125" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400" disabled readonly><?php echo $row['remarks']; ?></textarea>
				</div>
			</form>
			<?php
			}
			?>
			
		</div>
	</div>
	</div>
	
	<!--Edit Member: Success Toast-->
	<div id="toast-success" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-success-edit-record']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
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
</body>
</html>
