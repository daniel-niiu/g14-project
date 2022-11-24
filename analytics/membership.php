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

	<style>		
	@media screen and (min-width:1490px){
    #horizontal{
        margin-left: 8.5rem;
    	}
	}
	</style>
	
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
	include('../templates/analytics-aside.php');
	?>

    <div class="mx-auto">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="../index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        <?php echo $title['home']; ?>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $analytics['membership']; ?></p>
                    </div>
                </li>
            </ol>
        </nav>

        <div style="width:860px;">
            <h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $analytics['membership']; ?></h2>
            <hr class="border-gray-300 dark:border-gray-600 my-3" />

            <form id="analytics-form">
                <div class="relative z-0 w-full mb-4 group">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $analytics['category']; ?></label>
                    <select id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Member Status" selected><?php echo $member['member-status']; ?></option>
                        <option value="Age"><?php echo $member['age']; ?></option>
                        <option value="Member Type"><?php echo $member['member-type']; ?></option>
                    </select>
                </div>

                <div class="inline-flex justify-center items-center w-full">
                    <hr class="my-6 w-full h-px bg-gray-200 border dark:bg-gray-500 dark:border-gray-500">
                    <span id="horizontal" class="absolute left-1/2 px-3 font-medium text-sm text-gray-900 bg-white -translate-x-1/2 dark:text-white dark:bg-gray-900">
                        <?php echo $analytics['receipt-date']; ?>
                    </span>
                </div>

                <div date-rangepicker class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="start-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $export['period-from']; ?></label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker-format="dd/mm/yyyy" type="text" id="start-date" name="start-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
                        </div>
                        <p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_dob" style="display:none;"><?php echo $form['empty-warning']; ?></p>
                    </div>
                    <div>
                        <label for="end-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $export['period-to']; ?></label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input datepicker-format="dd/mm/yyyy" type="text" id="end-date" name="end-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dd/mm/yyyy">
                        </div>
                        <p class='text-xs font-normal text-red-500 dark:text-red-300 mt-1 ml-1' id="p_dob" style="display:none;"><?php echo $form['empty-warning']; ?></p>
                    </div>
                </div>

                <button type="submit" name="btn_submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;"><?php echo $form['submit']; ?></button>
            </form>
        </div>
    </div>

    <div class="w-full">
        <canvas class="member-chart" id="member-chart-by-status"></canvas>
        <canvas class="member-chart" id="member-chart-by-age"></canvas>
        <canvas class="member-chart" id="member-chart-by-type"></canvas>
    </div>

	</div>

	<hr class="border-gray-300 dark:border-gray-600 mt-4" />

	<footer>
		<p class="text-center text-xs font-normal text-gray-500 dark:text-gray-400 my-4"><?php echo $page['footer']; ?></p>
	</footer>

	<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

	<script>
		var allMembers = [];

		$('.member-chart').hide();

		function getAllMembers() {
			$.ajax({
				method: 'POST',
				url: './membership-api.php?method=allMembers',
				success: function(e) {

					allMembers = JSON.parse(e);
				}
			});
		}

		getAllMembers();


		$('#analytics-form').submit(function() {
			event.preventDefault();
			let filterType = $('#title').val();
			showMemberChart(filterType);
		});


		/**
		 * ===== Charts
		 */

		let memberStatusChart = document.querySelector('#member-chart-by-status');
		let memberAgeChart = document.querySelector('#member-chart-by-age');
		let memberTypeChart = document.querySelector('#member-chart-by-type');

		let memberStatusChartObj = null;
		let memberAgeChartObj = null;
		let memberTypeChartObj = null;


		function showMemberChart(filterType) {

			$('.member-chart').hide();

			let members = allMembers;

			let startDate = $('#start-date').val();
			let endDate = $('#end-date').val();


			if (startDate != '' && endDate != '') {

				let startDateObj = new Date(startDate);
				let endDateObj = new Date(endDate);

				let filteredMembers = members.filter((member) => {

					let recordedOnObj = new Date(member.recordedOn);

					if (recordedOnObj >= startDateObj && recordedOnObj <= endDateObj) {
						return member;
					}

				});

				members = filteredMembers;
			}


			if (filterType == 'Member Status') {
				$('.member-chart#member-chart-by-status').show();
				memberChartByStatus(members);

			} else if (filterType == 'Age') {
				$('.member-chart#member-chart-by-age').show();
				memberChartByAge(members);
			} else if (filterType == 'Member Type') {
				$('.member-chart#member-chart-by-type').show();
				memberChartByType(members);
			}

		}

		function memberChartByStatus(members) {


			let membersData = {};

			members.forEach(function(member) {
				if (membersData[member.member_status] == undefined) {
					membersData[member.member_status] = 0
				}
				membersData[member.member_status]++;
			});

			if (memberStatusChartObj == null) {
				memberStatusChartObj = new Chart(memberStatusChart, {
					type: 'bar',
					data: {
						labels: Object.keys(membersData),
						datasets: [{
							label: 'Members by status',
							data: Object.values(membersData)
						}]
					}
				});
			} else {

				memberStatusChartObj.data.labels = Object.keys(membersData);
				memberStatusChartObj.data.datasets[0].data = Object.values(membersData);
				memberStatusChartObj.update();
			}

		}

		function memberChartByAge(members) {


			let membersData = {};

			members.forEach(function(member) {

				let memberDOBYear = member.member_dob.toString().split('-');
				memberDOBYear = memberDOBYear[0];

				let age = getAge(memberDOBYear);

				if (membersData[age] == undefined) {
					membersData[age] = 0;
				}
				membersData[age]++;
			});

			if (memberAgeChartObj == null) {
				memberAgeChartObj = new Chart(memberAgeChart, {
					type: 'bar',
					data: {
						labels: Object.keys(membersData),
						datasets: [{
							label: 'Members by age',
							data: Object.values(membersData)
						}]
					}
				});
			} else {
				memberAgeChartObj.data.labels = Object.keys(membersData);
				memberAgeChartObj.data.datasets[0].data = Object.values(membersData);
				memberAgeChartObj.update();
			}

		}

		function memberChartByType(members) {


			let membersData = {};

			members.forEach(function(member) {

				if (membersData[member.member_type] == undefined) {
					membersData[member.member_type] = 0;
				}
				membersData[member.member_type]++;
			});

			if (memberTypeChartObj == null) {
				memberTypeChartObj = new Chart(memberTypeChart, {
					type: 'bar',
					data: {
						labels: Object.keys(membersData),
						datasets: [{
							label: 'Members by type',
							data: Object.values(membersData)
						}]
					}
				});
			} else {
				memberTypeChartObj.data.labels = Object.keys(membersData);
				memberTypeChartObj.data.datasets[0].data = Object.values(membersData);
				memberTypeChartObj.update();
			}

		}


		function getAge(birthYear) {
			var currentDate = new Date();
			var currentYear = currentDate.getFullYear();
			age = currentYear - birthYear;
			return age;
		}
	</script>

</body>

</html>