<?php
include "db/dbconnection.php";    
isMainPageLoggedIn(); 
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
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" type="image/x-icon" href="images/logo.ico">
	<title>Tze Yin Membership Management Portal</title>
</head>

<body class="dark:bg-gray-900">
	<?php
		include('templates/header.php');
	?>
	
	<?php
		include('templates/login.php');
	?>
	
	<div class="dashboard">
		<div class="container flex flex-wrap justify-between items-center mx-auto pl-4 pr-4">
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $index['index-dashboard'];?></h3>
			<div class="button">
				<button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="authentication-modal">
					<i class="fa-solid fa-plus"></i>&nbsp; <?php echo $index['index-reminder'];?>
				</button>
				
				<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    				<div class="relative w-full h-full max-w-lg p-4 md:h-auto">
        				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            				<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            				</button>
            				<div class="px-6 py-6 lg:px-8">
                				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><?php echo $index['index-reminder-create-title']; ?></h3>
                				<form class="space-y-6" action="php/reminder.php?method=add" method="post">
                    				<div>
                        				<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-title']; ?></label>
                        				<input type="text" name="title" id="reminder-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="<?php echo $index['reminder-title-placeholder']; ?>" required>
                    				</div>
                    				<div>
                        				<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-date']; ?></label>
                        				<input type="date" name="date" id="reminder-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    				</div>
                    				<div>
                        				<label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-content']; ?></label>
                        				<input type="text" name="content" id="reminder-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="<?php echo $index['reminder-content-placeholder']; ?>" required>
                    				</div>
                    				<button type="submit" name="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo $form['submit']; ?></button>
                				</form>
            				</div>
        				</div>
    				</div>
				</div> 
				
				<button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="broadcast-modal">
					<i class="fa-brands fa-whatsapp"></i>&nbsp; <?php echo $index['index-broadcast']; ?>
				</button>
				
				<div id="broadcast-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
					<div class="relative p-4 w-full max-w-md h-full md:h-auto">
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
							<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="broadcast-modal">
								<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
							</button>
							<div class="py-6 px-6 lg:px-8">
								<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><?php echo $index['index-whatsapp-title']; ?></h3>
								<form class="space-y-6" action="members/whatsapp.php" method="post" target=”_blank”>
									<div>
										<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"><?php echo $index['index-whatsapp-message']; ?></label>
										<textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo $index['whatsapp-content-placeholder']; ?>" required></textarea>
									</div>
									<button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><?php echo $form['submit']; ?></button>
								</form>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		
		<hr class="border-gray-300 dark:border-gray-600"/>
		<?php
		$sql = "SELECT * FROM reminder ORDER BY reminder_id DESC LIMIT 0,3";  
		?>
		<div class="container pt-4 pl-4 mx-auto">
			<ol class="relative border-l border-gray-200 dark:border-gray-700">
				<?php 
					$result = $conn->query($sql); 
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
				?>
				<li class="mb-8 ml-6">
					<div class="container flex flex-wrap justify-between items-center mx-auto">
						<span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
							<svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
						</span>
						<h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white"><?php echo $row['title']; ?></h3>

						<div class="flex items-end md:order-2">
						<button data-dropdown-toggle="dropdown<?php echo $row['reminder_id']; ?>" class="text-black hover:text-gray-600 font-medium rounded-lg text-sm pl-4 py-2.5 text-center inline-flex items-center dark:text-white dark:hover:text-gray-300 float-right" type="button"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>

						<div id="dropdown<?php echo $row['reminder_id']; ?>" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(1054.4px, 983.6px, 0px);">
							<ul class="py-1" aria-labelledby="dropdown">
								<li>
									<a href="#" name="reminder" tag="<?php echo $row['reminder_id']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="authentication-modal-content"><?php echo $index['index-reminder-edit-title']; ?></a>
								</li>
								<li>
									<a href="#" name="reminder-delete" tag="<?php echo $row['reminder_id']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="popup-modal"><?php echo $index['index-reminder-delete-title']; ?></a>
								</li>
							</ul>
						</div>
						</div>
					</div>
				
					<time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
						<?php 

							$date = $row['reminder_date']; 
							echo "On ".date("l, F d, Y",strtotime($date)); 
							?> 
					</time>
					<p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"><?php echo $row['remarks']; ?></p>
				</li>
				<?php
					}
				}
				else{
					echo '<p class="mt-2 text-base text-center font-bold text-gray-500 dark:text-gray-400">'.$index['index-reminder-null'].'</p>
					<p class="mb-6 text-sm text-center font-normal text-gray-500 dark:text-gray-400">'.$index['index-reminder-null-title'].'</p>';
				}
				?> 
			</ol>
			
			<div id="authentication-modal-content" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    			<div class="relative w-full h-full max-w-md p-4 md:h-auto">
        			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            			<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-content">
                			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            			</button>
            			<div class="px-6 py-6 lg:px-8"> 
                			<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><?php echo $index['index-reminder-edit-title']; ?></h3>
                			<form method="post" action="php/reminder.php?method=update">
                    			<div>
                        			<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-title']; ?></label>
                        			<input type="text" name="title" id="edit-reminder-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="" required>
                    			</div>
                    			<div>
                        			<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-date']; ?></label>
                        			<input type="date" name="date" id="edit-reminder-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="" required>
                    			</div>
                    			<div>
                        			<label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $index['index-reminder-content']; ?></label>
                        			<input type="text" name="content" id="edit-reminder-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="" required>
                    			</div>
                    			<input type="submit" name="button" id="edit-reminder-submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="<?php echo $form['submit']; ?>">
                    			<input type="hidden" id="edit-reminder-id" name="reminderid" value="">
                			</form>
            			</div> 
        			</div>
    			</div>
			</div> 
				
			<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
				<div class="relative w-full h-full max-w-md p-4 md:h-auto">
					<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
						<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
							<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
						</button>
						<div class="p-6 text-center">
							<svg class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
							<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?php echo $index['index-reminder-delete']; ?></h3>
							<a id="delete-reminder"><button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"><?php echo $form['confirm']; ?></button></a>
							<button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"><?php echo $form['cancel']; ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		if($_SESSION['type'] == "admin")
		{
	?>
	<hr class="border-gray-300 dark:border-gray-600"/>
	<div class="admin-shortcuts mt-2 mb-1">
		<div class="container flex flex-wrap justify-between items-center mx-auto pl-4 pr-4">
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $index['index-shortcuts'];?></h3>
			<button type="button" id="filterbtn" class="py-2.5 px-5 mr-2 mb-2 text-sm text-gray-900 bg-white rounded-lg  hover:text-blue-700 dark:text-white dark:bg-gray-900 dark:hover:text-gray-300" data-modal-toggle="authentication-modal3">
				<i class="fa-solid fa-filter"></i> <?php echo $index['index-filter']; ?>
			</button>

			<div id="authentication-modal3" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    			<div class="relative w-full h-full max-w-lg p-4 md:h-auto">
        			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            			<button type="button" id="closebtn" onclick="clearcheck()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal3">
                			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            				</button>
            				<div class="px-6 py-6 lg:px-8">
                				<h3 class="mb-6 text-xl font-medium text-gray-900 dark:text-white"><?php echo $index['index-filter-title']; ?></h3>
                				<div class="space-y-6">	 
    								<div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                             <input id="create-members" name="preference" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                                             <label for="create-members" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['create-member']; ?></label>
                                        </div>
                                        <div>
                                             <input id="search-members" name="preference" type="checkbox" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="search-members" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['search-member']; ?></label>
                                         </div>
                                        <div>
                                             <input id="create-tablet" name="preference" type="checkbox" value="3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="create-tablet" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['create-tablet']; ?></label>
                                         </div>
                                        <div>
                                             <input id="search-tablet" name="preference" type="checkbox" value="4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="search-tablet" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['search-tablet']; ?></label>
                                         </div>
                                        <div>
                                             <input id="create-blantern" name="preference" type="checkbox" value="5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="create-blantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['create-blessing']; ?></label>
                                         </div>
                                         <div>
                                             <input id="search-blantern" name="preference" type="checkbox" value="6" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="search-blantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['search-blessing']; ?></label>
                                         </div>
                                        <div>
                                             <input id="create-glantern" name="preference" type="checkbox" value="7" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="create-glantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['create-light']; ?></label>
                                         </div>
                                         <div>
                                             <input id="search-glantern" name="preference" type="checkbox" value="8" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="search-glantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['search-light']; ?></label>
                                         </div>
                                        <div>
                                             <input id="create-product" name="preference" type="checkbox" value="9" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="create-product" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['create-product']; ?></label>
                                         </div>
                                         <div>
                                             <input id="search-product" name="preference" type="checkbox" value="10" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="search-product" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['search-product']; ?></label>
                                         </div>
                                        <div>
                                             <input id="stock-in" name="preference" type="checkbox" value="11" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="stock-in" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['stock-in']; ?></label>
                                         </div>
                                        <div>
                                             <input id="stock-out" name="preference" type="checkbox" value="12" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                             <label for="stock-out" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $title['stock-out']; ?></label>
                                         </div>
                				</div>
                    				<button id="btn_submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-toggle="authentication-modal3"><?php echo $form['submit']; ?></button>
            				</div>
        			</div>
    			</div>
			</div>
		</div>
	</div>

	<div class="row container flex flex-wrap justify-between items-center mx-auto">
		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a0" href="members/create-member.php?name=member&aside=create-member">
					<div class="color1"></div>
					<div class="p-5">
						<h5 id="h50" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden"><?php echo $title['create-member'];?></h5>
						<p id="p0" class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $index['body-create-member'];?></p>
					</div>
				</a>
			</div>
		</div>

		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a1" href="members/search-member.php?name=member&aside=search-member">
					<div class="color2"></div>
					<div class="p-5">
						<h5 id="h51" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden"><?php echo $title['search-member'];?></h5>
						<p id="p1" class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $index['body-search-member'];?></p>
					</div>
				</a>
			</div>
		</div>

		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a2" href="transactions/create-tablet.php?name=transaction&aside=create-tablet">
					<div class="color3"></div>
					<div class="p-5">
						<h5 id="h52" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden"><?php echo $title['create-tablet'];?></h5>
						<p id="p2" class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $index['body-create-tablet'];?></p>
					</div>
				</a>
			</div>
		</div>
	</div>
	
	<?php
		}
	?>
	<!--Toast: Edit User-->
	<div id="toast-success-user" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-success-password']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success-user" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
	<?php 
	if($_GET['title'] == "reminderadd" && $_GET['success'] == "success")
	{
	?>
	<!--Toast: Add Reminder-->
	<div id="toast-add-reminder" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-add-reminder']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-add-reminder" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
	<?php 
	} 
	if($_GET['title'] == "reminderedit" && $_GET['success'] == "success")
	{
	?>
	<!--Toast: Edit Reminder-->
	<div id="toast-edit-reminder" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-edit-reminder']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-edit-reminder" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
	<?php 
	}
	if($_GET['title'] == "reminderdelete" && $_GET['success'] == "success")
	{
	?>
	<!--Toast: Delete Reminder-->
	<div id="toast-delete-reminder" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		 <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-delete-reminder']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-delete-reminder" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	<?php
	}
	?>
	<!--Toast: Filter Preferences-->
	<div id="toast-success-filter" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal"><?php echo $toast['toast-success-filter']; ?></div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>
	
	<?php 
    date_default_timezone_set("Asia/Kuala_Lumpur");
	$date = date('Y-m-d');
	$sql = "SELECT * FROM reminder WHERE reminder_date = '$date'";  
	$query = $conn->query($sql);
	if($query->num_rows > 0){ 
	?>
	<!--Toast: Reminder Reached Notification-->
	<div id="toast-notification" class="
		<?php 
			if($query->num_rows == 0) echo "hidden";
		?> w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-300 fixed bottom-5 left-5" role="alert">
		<div class="flex items-center mb-3">
			<span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white"><?php echo $toast['toast-new-notification']; ?></span>
			<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button>
		</div>
		<?php 
			while($row = $query->fetch_assoc()){
		?>
		<div class="flex items-center">
			<div class="relative inline-block shrink-0">
				<img class="w-12 h-12 rounded-full" src="images/logo.png"/>
				<span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
					<svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
				</span>
			</div>
			<div class="ml-3 text-sm font-normal">
				<h4 class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo $row['title']; ?></h4>
				<div class="text-sm font-normal"><?php echo $row['remarks']; ?></div> 
				<span class="text-xs font-medium text-blue-600 dark:text-blue-500"><?php echo $toast['toast-notification-today']; ?></span>   
			</div>
		</div>
		<?php 
			}
		}
		?>
	</div>
	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>
	
	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
	</footer>
	
	<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
	
	<script>
		var login = document.getElementById('loginTemplate');
		login.classList.remove('hidden');
		var toast_user = document.getElementById('toast-danger-user');
		<?php

		if($_SESSION["status"] == "T"){  
		?>
		login.classList.add('hidden');
		toast_user.classList.add('hidden');
		
		<?php
		}
		else if($_SESSION["status"] == "F"){
		?> 
			login.classList.remove('hidden');
			toast_user.classList.remove('hidden');
		<?php
		}
		else{ 
		?>
			login.classList.add('hidden');
			toast_user.classList.add('hidden');
		<?php
		}
		?>
	</script>
	
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

	<script>   
	var shortcuts = [
		{ value: 1, head: "<?php echo $title['create-member'];?>", body: "<?php echo $index['body-create-member'];?>", anchor: "members/create-member.php?name=member&aside=create-member" },
		{ value: 2, head: "<?php echo $title['search-member'];?>", body: "<?php echo $index['body-search-member'];?>", anchor: "members/search-member.php?name=member&aside=search-member" },
		{ value: 3, head: "<?php echo $title['create-tablet'];?>", body: "<?php echo $index['body-create-tablet'];?>", anchor: "transactions/create-tablet.php?name=transaction&aside=create-tablet" },
		{ value: 4, head: "<?php echo $title['search-tablet'];?>", body: "<?php echo $index['body-search-tablet'];?>", anchor: "transactions/search-tablet.php?name=transaction&aside=search-tablet" },
		{ value: 5, head: "<?php echo $title['create-blessing'];?>", body: "<?php echo $index['body-create-blessing'];?>", anchor: "transactions/create-blantern.php?name=transaction&aside=create-blantern" },
		{ value: 6, head: "<?php echo $title['search-blessing'];?>", body: "<?php echo $index['body-search-blessing'];?>", anchor: "transactions/search-blantern.php?name=transaction&aside=search-blantern" },
		{ value: 7, head: "<?php echo $title['create-light'];?>", body: "<?php echo $index['body-create-light'];?>", anchor: "transactions/create-glight.php?name=transaction&aside=create-glight" },
		{ value: 8, head: "<?php echo $title['search-light'];?>", body: "<?php echo $index['body-search-light'];?>", anchor: "transactions/search-glight.php?name=transaction&aside=search-glight" },
		{ value: 9, head: "<?php echo $title['create-product'];?>", body: "<?php echo $index['body-create-product'];?>", anchor: "products/create-product.php?name=product&aside=create-product" },
		{ value: 10, head: "<?php echo $title['search-product'];?>", body: "<?php echo $index['body-search-product'];?>", anchor: "products/search-product.php?name=product&aside=search-product" },
		{ value: 11, head: "<?php echo $title['stock-in'];?>", body: "<?php echo $index['body-stock-in'];?>", anchor: "stocks/stock-in.php?name=stock&aside=stock-in" },
		{ value: 12, head: "<?php echo $title['stock-out'];?>", body: "<?php echo $index['body-stock-out'];?>", anchor: "stocks/stock-out.php?name=stock&aside=stock-out" }
	]
	 
	var selection = new Array(); 
	var btn = document.getElementById('btn_submit');
	var form = document.getElementById('form1');

	btn.addEventListener('click', function() {
		var count = form.querySelectorAll('input[type="checkbox"]:checked').length;
		console.log(count);
		if(count == 3){ 
			form.querySelectorAll('input').forEach(function (input){ 
				if(input.type === 'checkbox' && input.checked){
				selection.push(input.value);
				} 
			});
			//console.log(selection);
		  	//result1 = selection.filter(f => !selection.includes(f));

		  	var result1 = shortcuts.filter(function(f){ 
		  		return f.value == selection[0] || f.value == selection[1] || f.value == selection[2];

		  	 //=> !selection.includes(f)
		  	}); 
		  	console.log(result1);
		  	var i = 0;
		  	result1.forEach(function (data){ 
				var a = document.getElementById('a'+i);
				var title = document.getElementById('h5'+i);
				var content = document.getElementById('p'+i);
				
				a.setAttribute('href',data.anchor);
				title.innerHTML = data.head;
				content.innerHTML = data.body;
				 
				i++;
		  	});
		  	selection = new Array(); 
		}
		else{
			alert("You cannot select less or more than 3 preferences.")
		}
	 });


	</script>
	
	<script src="script/jquery.min.js"></script>
	<script> 
		$(function(){
			$("a[name='reminder']").on('click', function(){
				var reminder_id = $(this).attr('tag');   
				//alert(reminder_id);

				$.ajax({
					dataType: 'json',
					method: "POST",
					url: "php/json_index.php",
					data: {
						reminder_id: reminder_id
					},  
					success: function(data){ 
						$('#edit-reminder-title').val(data.reminderTitle);
						$('#edit-reminder-date').val(data.reminderDate);
						$('#edit-reminder-content').val(data.reminderRemarks); 
						$('#edit-reminder-id').val(data.reminderID); 
						console.log(data);
					}, 
					error: function(data) {
						console.log("error: ", data);
					}
				})

			   //delete-reminder-button 
			});
			$("a[name='reminder-delete']").on('click', function(){
				var reminder_id = $(this).attr('tag');    
				$('#delete-reminder').attr('href',"php/reminder.php?method=delete&Id="+reminder_id);  
			});
		});
	</script>
</body>
</html>