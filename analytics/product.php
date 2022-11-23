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
				<svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
				<?php echo $title['home']; ?>
			  </a>
			</li>
			<li>
			  <div class="flex items-center">
				<svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
				<p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $analytics['product']; ?></p>
			  </div>
			</li>
		  </ol>
		</nav>
		
        <div style="width:860px;">
            <h2 class="flex items-center mb-1 text-xl font-bold text-gray-900 dark:text-white"><?php echo $analytics['product']; ?></h2>
            <hr class="border-gray-300 dark:border-gray-600 my-3"/>
            <form method="post" action="#" onsubmit="#">
                <div class="relative z-0 w-full mb-6 group">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $stock['product-name']; ?></label>
                    <select id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
				<option value="" selected>Select Product</option>
					<?php 

					$sql = "SELECT s.product_name as product_id, p.product_chi_name as product_chi_name, p.product_eng_name as product_eng_name FROM (stockin s JOIN stockout so ON s.product_name = so.product_name)
						JOIN product p ON p.product_id = s.product_name
						Group by s.product_name";
					
					$result = $conn->query($sql);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
						foreach($rows as $row){
							echo '<option value="'.$row['product_id'].'">'.$row['product_chi_name']. "-" . $row['product_eng_name'].'</option>';
						}
					}
					?>
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
               <button type="button" name="btn_submit" class="chart-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="float:right;"><?php echo $form['submit']; ?></button>
            </form>
		</div>
		<div style="clear:both;height:auto"></div>
		<style>
            #chartdiv {
                width: 100%;
                height: 500px;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Chart code -->
        <script>
            jQuery(document).ready(function () {
				jQuery('.chart-btn').click(function(){
					var data = jQuery(this).parents('form').serializeArray();
					console.log(data);
					expense_report(data);
				})
               
            });

            function expense_report(data) {
                jQuery.ajax({
                    url: "stocks-report-data.php",
                    type: "POST",
                    dataType: 'json',
					data:data,
                    success: function (response) { 
						if(!response){
							jQuery('#chartdiv').empty();
						}
						else{
						jQuery('#chartdiv').empty();
						am5.array.each(am5.registry.rootElements, function(root) {
							if (root) {
							if (root.dom.id == "chartdiv") {
								root.dispose();
							}
							}
						});
                        am5.ready(function () {
                            var root = am5.Root.new("chartdiv");
                            root.setThemes([
                                am5themes_Animated.new(root)
                            ]);
                            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                                panX: false,
                                panY: false,
                                wheelX: "panX",
                                wheelY: "zoomX",
                                layout: root.verticalLayout
                            }));

                            var legend = chart.children.push(am5.Legend.new(root, {
                                centerX: am5.p50,
                                x: am5.p50
                            }));
// Data
                            var data = [];
                            for(var i = 0; i < response.length; i++)
                            {
                                data.push({
                                    "Product" : response[i].Product,
                                    "stock_in"  : parseInt(response[i].stock_in),
                                    "stock_out"  : parseInt(response[i].stock_out)
                                });
                            } 
                            var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
                                categoryField: "Product",
                                renderer: am5xy.AxisRendererY.new(root, {
                                    inversed: true,
                                    cellStartLocation: 0.1,
                                    cellEndLocation: 0.9
                                })
                            }));

                            yAxis.data.setAll(data);

                            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                                renderer: am5xy.AxisRendererX.new(root, {}),
                                min: 0
                            }));

                            function createSeries(field, name) {
                                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                                    name: name,
                                    xAxis: xAxis,
                                    yAxis: yAxis,
                                    valueXField: field,
                                    categoryYField: "Product",
                                    sequencedInterpolation: true,
                                    tooltip: am5.Tooltip.new(root, {
                                        labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
                                    })
                                }));

                                series.columns.template.setAll({
                                    height: am5.p100
                                });


                                series.bullets.push(function () {
                                    return am5.Bullet.new(root, {
                                        locationX: 1,
                                        locationY: 0.5,
                                        sprite: am5.Label.new(root, {
                                            centerY: am5.p50,
                                            text: "{valueX}",
                                            populateText: true
                                        })
                                    });
                                });

                                series.bullets.push(function () {
                                    return am5.Bullet.new(root, {
                                        locationX: 1,
                                        locationY: 0.5,
                                        sprite: am5.Label.new(root, {
                                            centerX: am5.p100,
                                            centerY: am5.p50,
                                            text: "{name}",
                                            fill: am5.color(0xffffff),
                                            populateText: true
                                        })
                                    });
                                });

                                series.data.setAll(data);
                                series.appear();

                                return series;
                            }
                            createSeries("stock_in", "Stock In");
                            createSeries("stock_out", "Stock Out");
                            var legend = chart.children.push(am5.Legend.new(root, {
                                centerX: am5.p50,
                                x: am5.p50
                            }));

                            legend.data.setAll(chart.series.values);
                            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                                behavior: "zoomY"
                            }));
                            cursor.lineY.set("forceHidden", true);
                            cursor.lineX.set("forceHidden", true);
                            chart.appear(1000, 100);

                        }); // end am5.ready()
					}

            },
            error: function (xhr, status) {
                console.log('ajax error = ' + xhr.statusText);
                jQuery('#chartdiv').html('No Data Found'); 
            }
            })
            ;

            }
           
        </script>
		
        <div id="chartdiv"></div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> 
	</script> 
</body>
</html>
