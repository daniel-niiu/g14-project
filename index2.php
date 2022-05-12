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
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" type="image/x-icon" href="images/logo.ico">
	<title>Tze Yin Membership Management Portal</title>
</head>

<body class="dark:bg-gray-900">
	<?php
		include('templates/header.php');
	?>

	<?php
		//include('templates/login.php');
	?>

	<div class="dashboard">
		<div class="container flex flex-wrap justify-between items-center mx-auto pl-4 pr-4">
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Dashboard</h3>
			<div class="button">
				<button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" data-modal-toggle="authentication-modal">
					<i class="fa-solid fa-plus"></i>&nbsp; Reminders
				</button>

				<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    				<div class="relative w-full h-full max-w-md p-4 md:h-auto">
        				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            				<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            				</button>
            				<div class="px-6 py-6 lg:px-8">
                				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create Reminder</h3>
                				<form class="space-y-6" action="#">
                    				<div>
                        				<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                        				<input type="text" name="title" id="reminder-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Insert your title here" required>
                    				</div>
                    				<div>
                        				<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                        				<input type="date" name="date" id="reminder-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    				</div>
                    				<div>
                        				<label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                        				<input type="text" name="content" id="reminder-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Insert your content here" required>
                    				</div>
                    				<button type="submit" name="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                				</form>
            				</div>
        				</div>
    				</div>
				</div>

				<button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
					<i class="fa-brands fa-whatsapp"></i>&nbsp; Broadcast
				</button>
			</div>
		</div>
		<hr class="border-gray-300 dark:border-gray-600"/>

		<div class="container pt-4 pl-4 mx-auto">
			<ol class="relative border-l border-gray-200 dark:border-gray-700">
				<li class="mb-8 ml-6">
					<div class="container flex flex-wrap justify-between items-center mx-auto">
						<span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
							<svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
						</span>
						<h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Application UI v2.0.0 <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">Latest</span></h3>

						<div class="flex items-end md:order-2">
						<button data-dropdown-toggle="dropdown1" class="text-black hover:text-gray-600 font-medium rounded-lg text-sm pl-4 py-2.5 text-center inline-flex items-center dark:text-white dark:hover:text-gray-300 float-right" type="button"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>

						<div id="dropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(1054.4px, 983.6px, 0px);">
							<ul class="py-1" aria-labelledby="dropdown">
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="authentication-modal-content">Edit Content</a>
								</li>
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="popup-modal">Delete Content</a>
								</li>
							</ul>
						</div>
						</div>
					</div>

					<time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">On January 13th, 2022</time>
					<p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &amp; Marketing pages.</p>
				</li>

				<li class="mb-8 ml-6">
					<div class="container flex flex-wrap justify-between items-center mx-auto">
						<span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
							<svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
						</span>
						<h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Figma v1.3.0</h3>

						<div class="flex items-end md:order-2">
						<button data-dropdown-toggle="dropdown1" class="text-black hover:text-gray-600 font-medium rounded-lg text-sm pl-4 py-2.5 text-center inline-flex items-center dark:text-white dark:hover:text-gray-300 float-right" type="button"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>

						<div id="dropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(1054.4px, 983.6px, 0px);">
							<ul class="py-1" aria-labelledby="dropdown">
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="authentication-modal-content">Edit Content</a>
								</li>
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="popup-modal">Delete Content</a>
								</li>
							</ul>
						</div>
						</div>
					</div>

					<time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">On December 7th, 2021</time>
					<p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and components are first designed in Figma and we keep a parity between the two versions even as we update the project.</p>
					</li>

					<li class="mb-8 ml-6">
					<div class="container flex flex-wrap justify-between items-center mx-auto">
						<span class="flex absolute -left-3 justify-center items-center w-6 h-6 bg-blue-200 rounded-full ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
						<svg class="w-3 h-3 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
						</span>
						<h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.2.2</h3>

						<div class="flex items-end md:order-2">
						<button data-dropdown-toggle="dropdown1" class="text-black hover:text-gray-600 font-medium rounded-lg text-sm pl-4 py-2.5 text-center inline-flex items-center dark:text-white dark:hover:text-gray-300 float-right" type="button"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>

						<div id="dropdown1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(1054.4px, 983.6px, 0px);">
							<ul class="py-1" aria-labelledby="dropdown">
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="authentication-modal-content">Edit Content</a>
								</li>
								<li>
									<a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="popup-modal">Delete Content</a>
								</li>
							</ul>
						</div>
						</div>
					</div>

					<time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">On December 2nd, 2021</time>
					<p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements built on top of Tailwind CSS.</p>
				</li>
			</ol>

			<div id="authentication-modal-content" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    			<div class="relative w-full h-full max-w-md p-4 md:h-auto">
        			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            			<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-content">
                			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            			</button>
            			<div class="px-6 py-6 lg:px-8">
                			<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Reminder</h3>
                			<form class="space-y-6" action="#">
                    			<div>
                        			<label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                        			<input type="text" name="title" id="reminder-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="Title" required>
                    			</div>
                    			<div>
                        			<label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date</label>
                        			<input type="date" name="date" id="reminder-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="24-4-2022" required>
                    			</div>
                    			<div>
                        			<label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Content</label>
                        			<input type="text" name="content" id="reminder-content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="Description" required>
                    			</div>
                    			<button type="submit" name="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
							<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this reminder?</h3>
							<button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes, I'm sure</button>
							<button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<hr class="border-gray-300 dark:border-gray-600"/>

	<div class="admin-shortcuts mt-2 mb-1">
		<div class="container flex flex-wrap justify-between items-center mx-auto pl-4 pr-4">
			<h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white">Administrative Shortcuts</h3>
			<button type="button" id="filterbtn" onclick="checkCBs()" class="py-2.5 px-5 mr-2 mb-2 text-sm text-gray-900 bg-white rounded-lg  hover:text-blue-700 dark:text-white dark:bg-gray-900 dark:hover:text-gray-300" data-modal-toggle="authentication-modal3">
				<i class="fa-solid fa-filter"></i> Filter
			</button>

			<div id="authentication-modal3" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    			<div class="relative w-full h-full max-w-md p-4 md:h-auto">
        			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            			<button type="button" id="closebtn" onclick="clearcheck()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal3">
                			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            				</button>
            				<div class="px-6 py-6 lg:px-8">
                				<h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Select your Preferences</h3>
                				<form name="form1" class="space-y-6" action="#">
									<div class="flex items-center mb-4">
										 <input id="create-members" name="preference" type="checkbox" value="1" onclick="chkcontrol(0)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
										 <label for="create-members" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Create Member</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="search-members" name="preference" type="checkbox" value="2" onclick="chkcontrol(1)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="search-members" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search Member</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="create-tablet" name="preference" type="checkbox" value="3" onclick="chkcontrol(2)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="create-tablet" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Create Memorial Tablet</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="search-tablet" name="preference" type="checkbox" value="4" onclick="chkcontrol(3)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="search-tablet" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search Memorial Tablet</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="create-blantern" name="preference" type="checkbox" value="5" onclick="chkcontrol(4)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="create-blantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Create Blessing Lantern</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="search-blantern" name="preference" type="checkbox" value="6" onclick="chkcontrol(5)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="search-blantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search Blessing Lantern</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="create-glantern" name="preference" type="checkbox" value="7" onclick="chkcontrol(6)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="create-glantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Create Guang-Ming Light</label>
									 </div>
									 <div class="flex items-center mb-4">
										 <input id="search-glantern" name="preference" type="checkbox" value="8" onclick="chkcontrol(7)" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										 <label for="search-glantern" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search Guang-Ming Light</label>
									 </div>

                    				<button type="submit" onclick="filterPreference()" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                				</form>
            				</div>
        			</div>
    			</div>
			</div>
		</div>
	</div>

	<div class="row container flex flex-wrap justify-between items-center mx-auto">
		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a" href="#1">
					<div class="color1"></div>
					<div class="p-5">
						<h5 id="h5" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden">Noteworthy technology acquisitions 2021</h5>
						<p id="p" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
					</div>
				</a>
			</div>
		</div>

		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a1" href="#2">
					<div class="color2"></div>
					<div class="p-5">
						<h5 id="h51" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden">Noteworthy technology acquisitions 2021</h5>
						<p id="p1" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
					</div>
				</a>
			</div>
		</div>

		<div class="column">
			<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
				<a id="a2" href="#3">
					<div class="color3"></div>
					<div class="p-5">
						<h5 id="h52" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white overflow-hidden">Noteworthy technology acquisitions 2021</h5>
						<p id="p2" class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
					</div>
				</a>
			</div>
		</div>
	</div>

	<!--Toast: Edit User-->
	<div id="toast-success-user" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">User details modified successfully.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<div id="toast-danger-user" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Wrong password. Please try again.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<!--Toast: Add Reminder-->
	<div id="toast-success-reminder" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Reminder created successfully.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<!--Toast: Edit Reminder-->
	<div id="toast-success" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Reminder modified successfully.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<!--Toast: Filter Preferences-->
	<div id="toast-success-filter" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Shortcuts modified successfully.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<div id="toast-warning-filter" class="hidden flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 left-5" role="alert">
		<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
		</div>
		<div class="ml-3 text-sm font-normal">Insufficient choice. Please try again.</div>
		<button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
			<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
		</button>
	</div>

	<hr class="border-gray-300 dark:border-gray-600 mt-4"/>

	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4">Disclaimer: This is a student work in progress for SWE40001/SWE40002 Software Engineering Project A/B of Swinburne University of Technology, Sarawak (2022).</p>
	</footer>

	<script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>

		document.getElementById('closebtn').onclick = function clearcheck() {
	    var checkboxes = document.getElementsByName('preference');

	    for (var checkbox of checkboxes) {

	        checkbox.checked = false;

	    }

		}


		function chkcontrol(j) {

			total = 0;

			for(i=0;i<document.form1.preference.length;i++){

				if(document.form1.preference[i].checked) {

					total += 1;

				}

			}

			if (total > 3) {

				document.form1.preference[j].checked = false
			}
			return false;
		}

		function filterPreference()
		{

			var createmem = document.getElementById('create-members');
			var searchmem = document.getElementById('search-members');
			var createtab = document.getElementById('create-tablet');
			var searchtab = document.getElementById('search-tablet');
			var createblant = document.getElementById('create-blantern');
			var searchblant = document.getElementById('search-blantern');
			var createglant = document.getElementById('create-glantern');
			var searchglant = document.getElementById('search-glantern');

			checkcount = 0;





					if (createmem.checked)  {

						document.getElementById('h5').innerHTML = "Create Members";
						document.getElementById('p').innerHTML = "Create a new member.";
						document.getElementById('a').innerHTML = "/FYP/g14-project-main/members/create-member.php";
						checkcount++;

					}

					if (searchmem.checked) {

						document.getElementById('h51').innerHTML = "Search Members";
						document.getElementById('p1').innerHTML = "Look up an existing member.";
						document.getElementById('a1').href = "/FYP/g14-project-main/members/search-member.php";
						checkcount++;

					}

					if (createtab.checked) {

						document.getElementById('h52').innerHTML = "Create Memorial Tablets";
						document.getElementById('p2').innerHTML = "Create a new memorial tablet entry.";
						document.getElementById('a2').href = "/FYP/g14-project-main/transactions/create-tablet.php";
						checkcount++;

					}

					if (searchtab.checked) {

						document.getElementById('h5').innerHTML = "Search Memorial Tablets";
						document.getElementById('p').innerHTML = "Search for an existing memorial tablet.";
						document.getElementById('a').href = "/FYP/g14-project-main/transactions/search-tablet.php";
						checkcount++;

					}

					if (createblant.checked) {

						document.getElementById('h5').innerHTML = "Create Blessing Lantern";
						document.getElementById('p').innerHTML = "Create a new blessing lantern entry.";
						document.getElementById('a').href = "/FYP/g14-project-main/transactions/create-blantern.php";
						checkcount++;

					}

					if (searchblant.checked) {

						document.getElementById('h5').innerHTML = "Search Blessing Lantern";
						document.getElementById('p').innerHTML = "Search for an existing blessing lantern.";
						document.getElementById('a').href = "/FYP/g14-project-main/transactions/search-blantern.php";
						checkcount++;

					}

					if (createglant.checked) {

						document.getElementById('h5').innerHTML = "Create Guang-Ming Light";
						document.getElementById('p').innerHTML = "Create a new guang-ming light entry.";
						document.getElementById('a').href = "/FYP/g14-project-main/transactions/create-glight.php";
						checkcount++;

					}

					if (searchglant.checked) {

						document.getElementById('h5').innerHTML = "Search Guang-Ming Light";
						document.getElementById('p').innerHTML = "Search for an existing guang-ming light.";
						document.getElementById('a').href = "/FYP/g14-project-main/transactions/search-glight.php";
						checkcount++;

					}


		}

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
</body>
</html>
