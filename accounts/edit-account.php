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
		include('../templates/account-aside.php');
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
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">Edit Account</p>
			  </div>
			</li>
		  </ol>
		</nav>

			<?php  
			$M_ID = $_GET['Id'];
	    	$sql = "SELECT * FROM admin WHERE admin_username = '".$M_ID."'"; 	 
	    	$result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
  			// output data of each row
  				while($row = mysqli_fetch_array($result)){   
			?>
		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Edit Account</h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/> 
			<form method="post" action="../php/account.php?method=update">
				<div class="grid xl:grid-cols-2 xl:gap-6"> 
					<div class="relative z-0 w-full mb-6 group">
                        <label for="name" class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Name*</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['admin_name']; ?>" disabled>
                    </div> 
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="email" class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address*</label>
                        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter the email address here" 
                        value="<?php echo $row['admin_username']; ?> " disabled>
                    </div> 
                 </div>
				
                <div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 mt-2 group">
						
							<label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account Status</label>
							<label for="checkbox" class="inline-flex relative items-center cursor-pointer mt-1">
							  <input type="checkbox"id="checkbox" name="checkbox" value="<?php echo $row['admin_status']; ?>"  class="sr-only peer" 
							  <?php 
							  if($row['admin_status'] == "T"){
							  	echo "checked";
							  }
							  else{ 
							  }
								?>>
							  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
							  <span id="status" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
							  	<?php 
							  		$data = "";
							  		if($row['admin_status'] == "T")
							  		{
							  			$data = "Active";
							  		}
							  		else
							  		{
							  			$data = "Inactive";
							  		}
							  		echo $data;
							  	?>
							  </span> 
						  		<input type="hidden" id="checkbox_value" name="checkbox_value" value="<?php echo $row['admin_status']; ?>">
							</label>
                	</div>
					<script>
					document.getElementById('checkbox').addEventListener('click', function(){
						if(this.checked){
							this.value = 'Active';
							document.getElementById('status').innerHTML = 'Active'; 
							document.getElementById('checkbox_value').value = "T";
						} 
						else{ 
							this.value = 'Inactive'; 
							document.getElementById('status').innerHTML = 'Inactive'; 
							document.getElementById('checkbox_value').value = "F";
						}
					});
					</script>
                    <div class="relative z-0 w-full mb-6 group">
                    	<?php 
							if($row['admin_username'] == "admin")
							{ 
							?>
	                        <label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account Type</label> 
							<input type="radio" name="account-type" id="admin" value="admin"
							<?php if($row['admin_type'] == "admin") echo "disabled checked"; ?>>
							<label for="admin" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrator</label>

							<input type="radio" name="account-type" id="oper" class="ml-6" value="oper"
							<?php echo "disabled"; ?>>
							<label for="oper" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Operator</label>
						<?php
							}
							else
							{ 
						?>
                            <label class="block mt-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account Type</label> 
                            <input type="radio" name="account-type" id="admin" value="admin" onclick="verifyCheck()"
                            <?php if($row['admin_type'] == "admin") echo "checked"; ?>>
                            <label for="admin" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrator</label>

                            <input type="radio" name="account-type" id="oper" class="ml-6" value="oper" onclick="verifyCheck()"
                            <?php if(str_contains($row['admin_type'],"oper")) echo "checked"; ?>>
                            <label for="oper" class="ml-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Operator</label>
						<?php
							}
						?>
                	</div>
				</div>
                    
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Department</label>
                        <?php 
                        if($row['admin_type'] == "admin")
                        { 
                        ?>

                        <input id="check_member" type="checkbox" name="checkbox[]" value="M" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php echo "disabled"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Membership</label>

                        <input id="check_trans" type="checkbox" name="checkbox[]" value="T" class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php echo "disabled"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transaction</label>

                        <input id="check_prod" type="checkbox" name="checkbox[]" value="P" class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" <?php echo "disabled"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product &amp; Stocks</label> 
                        <?php
                        }
                        else{
                        	$acc_type = str_replace("oper(", "", $row['admin_type']);
                        	$acc_type = rtrim($acc_type,")"); 
                        ?>

                        <input id="check_member" type="checkbox" name="checkbox[]" value="M" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
								<?php if(str_contains($acc_type,"M")) echo "checked"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Membership</label>

                        <input id="check_trans" type="checkbox" name="checkbox[]" value="T" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
								<?php if(str_contains($acc_type,"T")) echo "checked"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Transaction</label>

                        <input id="check_prod" type="checkbox" name="checkbox[]" value="P" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
								<?php if(str_contains($acc_type,"P")) echo "checked"; ?>>
                        <label for="name" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product &amp; Stocks</label> 
                        <?php	
                        }
                        ?>
               		</div>
				</div>
				
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remarks</label>
					<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a remark..."></textarea>
				</div>
				
                 <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;">Submit</button>

                 <input type="hidden" name="hid_email" value="<?php echo $row['admin_username']?>">
			</form>
		</div>

			<?php  
  				}
			}
			else{ 
    			echo "No record exists!!"; 
    		}
			?>
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
		function verifyCheck()
		{ 
			if (document.getElementById('admin').checked) {
				var rates = document.getElementsByName('checkbox[]'); 
				for(var i = 0; i < rates.length; i++){
				    rates[i].disabled = true;
				    rates[i].checked = false;
				} 
			} 
			if (document.getElementById('oper').checked) {
				var rates = document.getElementsByName('checkbox[]'); 
				for(var i = 0; i < rates.length; i++){
				    rates[i].disabled = false;
				} 
			} 
		}
	</script>
</body>
</html>
