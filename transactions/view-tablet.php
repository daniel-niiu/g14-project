<?php 
// Include pagination library file 
include_once '../php/Pagination.class.php'; 
 
// Include database configuration file 
require_once '../db/dbconnection.php';  
isLoggedIn();
// Set some useful configuration 
$baseURL = '../php/get-tablet-transaction-data.php'; 
$limit = 10; 
 
// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM Tablet AS t, Tablet_Receipt AS tr WHERE t.tablet_id = tr.Tablet_id  AND t.tablet_id = '".$_GET['Id']."'"); 

$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
    'baseURL' => $baseURL, 
    'totalRows' => $rowCount, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'searchFilter' 
); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit    
$query = $conn->query("SELECT * FROM Tablet AS t, Tablet_Receipt AS tr WHERE t.tablet_id = tr.Tablet_id AND t.tablet_id = '".$_GET['Id']."' ORDER BY tr.receipt_num LIMIT $limit");  

$_SESSION['t_id'] = $_GET['Id'];
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	<script> 
	function searchFilter(page_num) {
	    page_num = page_num?page_num:0;   
	    $.ajax({
	        type: 'POST',
	        url: '../php/get-tablet-transaction-data.php',
	        data:'page='+page_num,
	        beforeSend: function () {
	        },
	        success: function (html) {
	            $('#dataContainer').html(html);
	        }
	    });
	} 
	</script>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
	<script src="https://kit.fontawesome.com/b41521ee1f.js"></script>
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
				<?php echo $title['home']; ?>
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<a href="search-tablet.php?name=transaction" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['search-tablet']; ?></a>
			  </div>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-tablet']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
		<?php  
			$M_ID = $_GET['Id']; 
		    $sql = "SELECT * FROM Tablet WHERE tablet_id = '".$M_ID."'"; 	 
			$result = $conn->query($sql);  
			if (mysqli_num_rows($result) > 0) {
		  	// output data of each row
		  	$row = mysqli_fetch_array($result);  
		?>
		<div>
			<div class="container flex flex-wrap justify-between items-center mx-auto">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-tablet']; ?></h2>
				<div class="button">
					<a href="edit-tablet.php?name=transaction&Id=<?php echo $row['tablet_id']; ?>">
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
									<a href="../php/tablet.php?name=transaction&method=delete&Id=<?php echo $row['tablet_id']; ?>">
										<button data-modal-toggle="delete-popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
											<?php echo $form['confirm']; ?>
										</button>
									</a>  
									<button data-modal-toggle="delete-popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo $form['cancel']; ?></button>
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
						<label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['tablet-id']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['tablet_id']; ?>" disabled readonly>
					</div>
				 	<div>
						<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['inst-date']; ?></label>
						<div class="relative">
  							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
    							<svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
  							</div>
  							<input datepicker datepicker-format="dd/mm/yyyy" datepicker-autohide type="text" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo date("d-m-Y", strtotime($row['inst_date'])); ?>" disabled readonly>
						</div>
					 </div>
					<div>
						<label for="zone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['zone']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="zone" name="zone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['tablet_zone']; ?>" disabled readonly>
					 </div>
					 <div>
						<label for="tier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['tier']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="tier" name="tier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['tablet_tier']; ?>" disabled readonly>
					</div>
					<div>
						<label for="row" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['row']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="row" name="row" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['tablet_row']; ?>" disabled readonly>
					</div>
					<div>
						<label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['price']; ?></label>
						<div class="flex">
						  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">RM</span>
						  <input type="text" id="price" name="price" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['price']; ?>" disabled readonly>
						</div>
				 	</div>
					<div>
						<label for="english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['eng-name']; ?></label>
						<input type="text" id="english" name="english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_eng_name']; ?>" disabled readonly>
					</div>
					<div>
						<label for="chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['chi-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="chinese" name="chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['member_chi_name']; ?>" disabled readonly>
					</div>
					<div>
						<label for="contact1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['contact-num1']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="contact1" name="contact1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['contact_num1']; ?>" disabled readonly>
					</div>
					<div>
						<label for="contact2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['contact-num2']; ?></label>
						<input type="text" id="contact2" name="contact2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['contact_num2']; ?>" disabled readonly>
					</div>
					<div>
						<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $member['address']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['address']; ?>" disabled readonly>
					</div>
					<div>
						<label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['payment-type']; ?></label>
						<input type="text" id="payment" name="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['payment_type']; ?>" disabled readonly>
					</div>
					<div>
						<label for="ancestor-english" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['anc-eng-name']; ?></label>
						<input type="text" id="ancestor-english" name="ancestor_english" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['ancestor_eng_name']; ?>" disabled readonly>
					</div>
					<div>
						<label for="ancestor-chinese" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $transaction['anc-chi-name']; ?><span class="text-red-500 dark:text-red-300">*</span></label>
						<input type="text" id="ancestor-chinese" name="ancestor_chinese" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['ancestor_chi_name']; ?>" disabled readonly>
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
					<textarea id="remarks" name="remarks" rows="3" cols="125" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a remark..." disabled readonly><?php echo $row['remarks']; ?></textarea>
				</div> 
			</form>
			
			<div class="container flex flex-wrap justify-between items-center mx-auto pt-4">
				<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $title['view-transactions-table']; ?></h2>
				<div class="button">
					<a href="create-tablet-transaction.php?name=transaction&aside=tablet-transaction&Id=<?php echo $row['tablet_id']; ?>">
						<button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
							<i class="fa-solid fa-plus"></i>&nbsp; <?php echo $title['add-tablet-transaction']; ?>
						</button>
					</a>
				</div>
			</div>
			
			<hr class="border-gray-300 dark:border-gray-600 my-3"/>
			
			<div id="dataContainer">	
				<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
					<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class="px-6 py-3"><?php echo $form['receipt-date']; ?></th>
								<th scope="col" class="px-6 py-3"><?php echo $form['receipt-num']; ?></th>
								<th scope="col" class="px-6 py-3"><?php echo $transaction['search-mem-eng']; ?></th>
								<th scope="col" class="px-6 py-3"><?php echo $transaction['search-mem-chi']; ?></th>
								<th scope="col" class="px-6 py-3"><?php echo $form['receipt-amount']; ?></th>
								<th scope="col" class="px-6 py-3">
									<span class="sr-only"><?php echo $form['btnedit']; ?></span>
								</th>
							</tr>
						</thead>
						<tbody> 
	                    	<?php  	 
				            if($query->num_rows > 0){
				                while($row = $query->fetch_assoc()){
				            ?>
				                 <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
				                 	<th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
				                    	<a href="view-tablet-transaction.php?name=transaction&Id=<?php echo $row["Tablet_id"]; ?>&receiptNum=<?php echo $row['receipt_num']; ?>&receiptDate=<?php echo $row['receipt_date'];?>" class="dark:hover:text-blue-500 md:hover:text-blue-700"><?php echo $row["receipt_date"]; ?></a>
				                    </th> 
				                    <td class="px-6 py-4"><?php echo $row["receipt_num"]; ?></td>
				                    <td class="px-6 py-4"><?php echo $row["member_eng_name"]; ?></td>
				                    <td class="px-6 py-4"><?php echo $row["member_chi_name"]; ?></td>
				                    <td class="px-6 py-4"><?php echo $row["receipt_amount"]; ?></td>
				                    <td class="px-6 py-4 text-right">
				                    	<a href="edit-tablet-transaction.php?name=transaction&Id=<?php echo $row["Tablet_id"]; ?>&receiptNum=<?php echo $row['receipt_num']; ?>&receiptDate=<?php echo $row['receipt_date'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo $form['btnedit']; ?></a>
				                    </td>
				                </tr>
				            <?php
				                } 
				            }
			                else{ 
				                echo '<tr><td colspan="5">'.$form['no-record-warning'].'</td></tr>'; 
			                } 
	                    	?> 
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation" class="mt-6 mb-2 text-center"> 
				    <?php echo $pagination->createLinks(); ?>   
				</nav>	
			</div>	
		</div>
		<?php
		} 
		?>
	</div>
	</div>
		
	<!--Edit Tablet: Success Toast-->
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