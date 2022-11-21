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
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css"/>
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
                    <a href="../index.php"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        <?php echo $title['home']; ?>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <a class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-product']; ?></a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <p class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400"><?php echo $title['view-stock']; ?></p>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- Styles -->
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
            $(document).ready(function(){
                expense_report();
            });

            function expense_report()
            {
                $.ajax({
                    url:"member-report-data.php",
                    type:"POST",
                    dataType: 'json',
                    success:function(response){
//                        if(response.status == true)
//                        {

                            am5.ready(function() {
                                // Create root element
                                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                var root = am5.Root.new("chartdiv");

                                // Set themes
                                // https://www.amcharts.com/docs/v5/concepts/themes/
                                root.setThemes([
                                    am5themes_Animated.new(root)
                                ]);


                                // Create chart
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                                    panX: true,
                                    panY: true,
                                    wheelX: "panX",
                                    wheelY: "zoomX",
                                    pinchZoomX:true
                                }));

                                // Add cursor
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                                cursor.lineY.set("visible", false);


                                // Create axes
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                                var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
                                xRenderer.labels.template.setAll({
                                    rotation: -90,
                                    centerY: am5.p50,
                                    centerX: am5.p100,
                                    paddingRight: 15
                                });

                                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                                    maxDeviation: 0.3,
                                    categoryField: "active", //add your field name
                                    renderer: xRenderer,
                                    tooltip: am5.Tooltip.new(root, {})
                                }));

                                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                                    maxDeviation: 0.3,
                                    //min: 0,
                                    renderer: am5xy.AxisRendererY.new(root, {})
                                }));


                                // Create series
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                                    name: "Members",
                                    xAxis: xAxis,
                                    yAxis: yAxis,
                                    valueYField: "value", //add your field name
                                    sequencedInterpolation: true,
                                    categoryXField: "active", //add your field name
                                    tooltip: am5.Tooltip.new(root, {
                                        labelText:"{valueY}"
                                    })
                                }));

                                series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
                                series.columns.template.adapters.add("fill", function(fill, target) {
                                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                                });

                                series.columns.template.adapters.add("stroke", function(stroke, target) {
                                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                                });

                                // Set data
                                //static data
                                /*
                                 var data = [{
                                 country: "USA",
                                 value: 2025
                                 }, {
                                 country: "China",
                                 value: 1882
                                 }, {
                                 country: "Japan",
                                 value: 1809
                                 }];
                                 */

                                //dynamic data pass
                                var chart_data = [];
                                for(var i = 0; i < response.length; i++)
                                {
                                    chart_data.push({
                                        "active" : response[i].active,
                                        "inactive"  : parseInt(response[i].inactive)
                                    });
                                }
                                console.log(chart_data);

                                xAxis.data.setAll(chart_data);
                                series.data.setAll(chart_data);

                                // Make stuff animate on load
                                // https://www.amcharts.com/docs/v5/concepts/animations/
                                series.appear(1000);
                                chart.appear(1000, 100);

                            }); // end am5.ready()

//                        }
//                        else
//                        {
//                            alert(response.msg);
//                        }
                    },
                    error: function (xhr, status) {
                        console.log('ajax error = ' + xhr.statusText);
                        alert(response.msg);
                    }
                });

            }
            //--- END
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
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

            themeToggleBtn.addEventListener('click', function () {

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