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
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
	<script src="https://unpkg.com/flowbite@1.5.2/dist/datepicker.js"></script>
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
		include('../templates/stock-aside.php');
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
				<a href="view-stock.php" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-stock']; ?></a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['edit-stock']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
		
		<?php   
			$name = $_GET['productName'];
			$receipt_No = $_GET['receiptNum']; 
			$receipt_Date = $_GET['receiptDate']; 
		      $sql = "SELECT p.remarks AS p_remarks, s.remarks AS s_remarks, s.product_name AS PName, receipt_no AS receipt, reciept_date AS date, stock_summary AS summary, stock_in AS stock_in, balance_left AS balance FROM stockin AS s, product AS p WHERE s.product_name = p.product_eng_name AND s.product_name = '".$name."' AND receipt_no = '".$receipt_No."' AND reciept_date = '".$receipt_Date."'";  	  
		    $result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
		  	// output data of each row
		  		$row = mysqli_fetch_array($result);  
		?>
		<div>
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['edit-stock']; ?></h2>
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			<form method="post" action="../php/stock.php?method=update>
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $stock['product-name']; ?></label>
						<input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['PName']; ?>" disabled required>
						<input type="hidden" name="pName" value="<?php echo $name; ?>">
					</div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['receipt-date']; ?></label>
						<div class="relative">
  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  							</div>
  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-buttons type="text" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy" value="<?php echo date("d-m-Y", strtotime($row['date'])); ?>" disabled>
							<input type="hidden" name="date" value="<?php echo $row['reciept_date']; ?>">
						</div>
					</div>
				</div>
				
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="summary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $stock['summary']; ?></label>
						<input type="text" id="summary" name="summary" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $stock['summary']; ?>" value="<?php echo $row['summary']; ?>">
					 </div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="receipt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['receipt-num']; ?></label>
						<input type="text" id="receipt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['receipt']; ?>" disabled>

						<input type="hidden" name="receipt" value="<?php echo $row['receipt_no']; ?>">
						
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="pmid" style="display:none;"><?php echo $form['id-warning']; ?></p>
					 </div>
				</div>
				
				<div class="grid xl:grid-cols-2 xl:gap-6">
					<div class="relative z-0 w-full mb-6 group">
						<label for="stock-in" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['stock-in']; ?></label>
						<input type="text" id="stock-in" name="stock-in" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['stock_in']; ?>">
						<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="pmid" style="display:none;"><?php echo $form['number-warning']; ?></p>
					 </div>
					<div class="relative z-0 w-full mb-6 group">
						<label for="balance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $stock['balance']; ?></label>
						<div class="flex">
							 <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">RM</span>
							 <input type="text" id="balance" name="balance" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['balance']; ?>">
							<p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="pmid" style="display:none;"><?php echo $form['number-warning']; ?></p>
						</div>
					 </div>
				</div>
				
				<div class="relative z-0 w-full mb-6 group">
					<label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $form['remarks']; ?></label>
					<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $form['remarks']; ?>"><?php echo $row['s_remarks']; ?></textarea>
				</div>
				
				 <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;"><?php echo $form['submit']; ?></button>
			</form>
			<?php
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
