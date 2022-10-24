<?php
include_once '../db/dbconnection.php';
$member_type = array('normal', 'non-member', 'permanent');
$member_status = array('Active', 'InActive'); 

//monthly tablet avg
//lump-sum
$tablet_sql = "SELECT tr.receipt_date, ROUND(AVG(tr.receipt_amount), 2) as amount
FROM tablet AS t 
RIGHT JOIN tablet_receipt AS tr  
ON t.tablet_id = tr.Tablet_id
WHERE YEAR(tr.receipt_date) = YEAR(CURRENT_DATE()) 
AND t.payment_type = 'lump-sum'
GROUP BY MONTH(tr.receipt_date)
ORDER BY tr.receipt_date";
 
//overtime

$tablet_sql1 = "SELECT tr.receipt_date, ROUND(AVG(tr.receipt_amount), 2) as amount
FROM tablet AS t 
RIGHT JOIN tablet_receipt AS tr  
ON t.tablet_id = tr.Tablet_id
WHERE YEAR(tr.receipt_date) = YEAR(CURRENT_DATE()) 
AND t.payment_type = 'over-time'
GROUP BY MONTH(tr.receipt_date)
ORDER BY tr.receipt_date";

/*
$current_year = date("Y"); 
$tablet_monthly = array(["January $current_year",0,0],["Febuary $current_year",0,0],["March $current_year",0,0],["April $current_year",0,0],["May $current_year",0,0],["June $current_year",0,0],["July $current_year",0,0],["August $current_year",0,0],["September $current_year",0,0],["October $current_year",0,0],["November $current_year",0,0],["December",0,0]);
*/
$tablet_monthly = array();
//print_r($tablet_monthly); 
//echo $sql = "SELECT MIN(accept_date),MAX(accept_date) FROM member";


?>

            <?php 
              /*
              echo "<br>";
              print_r($temp_overs_time_array); 
              */
               // count each month in transaction for loops [0] to [11]

              /*
              //print_r($tablet_array_over_time);  
              for($i = 0; $i < count($tablet_array_lump_sum); $i++){ 
                  $date1 = strtotime($tablet_array_lump_sum[$i][0]); 
                  $first = date("F Y", $date1);  
                  $tablet_monthly[] = [$first,$tablet_array_lump_sum[$i][1],0]; 
                  for($j = 0; $j < count($tablet_array_over_time); $j++){
                      $date2 = strtotime($tablet_array_lump_sum[$i][0]); 
                      $second = date("F Y", $date2);  
                      if (date("n", $first) == date("n", $second)){
                          $tablet_monthly[] = [$tablet_array_over_time[$i][0],$tablet_array_over_time[$i][1],0];
                      }
                  }
              }  
              */
              /*
              for($i = 0; $i < count($tablet_monthly); $i++){ 
                  for($j = 0; $j < count($tablet_array_lump_sum); $j++){ 
                    $key = array_search($tablet_monthly[$i][0], array_column($tablet_array_lump_sum, 'date')); 
                } 
              }

                  for($j = 0; $j < count($tablet_array_over_time); $j++){
                      if (date("n", $date1) == date("n", $tablet_array_over_time[$i][0])){
                          $tablet_monthly[] = [$tablet_array_over_time[$i][0],$tablet_array_over_time[$i][1],0];
                      }
                  }
              */
            ?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(memberType_drawChart);
        google.charts.setOnLoadCallback(memberActive_drawChart);

        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(newMember_LineChart);
        google.charts.setOnLoadCallback(Transaction);
        google.charts.setOnLoadCallback(YearlyLineChart);
        //google.charts.setOnLoadCallback(drawChart);

        function memberType_drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['member type', 'number of member'],
            <?php 
            foreach ($member_type as $data) {
                $sql = "SELECT COUNT(*) AS 'count' FROM member WHERE member_type = '$data'";
                $fire = mysqli_query($conn,$sql);
                while ($result = mysqli_fetch_assoc($fire)) {
                  echo"['".$data."',".$result['count']."],";
                }
            } 
            ?>
        ]);

        var options = {
          title: 'The number of the different member type'
        };

        var chart = new google.visualization.PieChart(document.getElementById('member_type_piechart'));

        chart.draw(data, options);
      }

      function memberActive_drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['member type', 'number of member'],
         <?php 
            foreach ($member_status as $data) {
                $sql = "SELECT COUNT(*) AS 'count' FROM member WHERE member_status = '$data'";
                $fire = mysqli_query($conn,$sql);
                while ($result = mysqli_fetch_assoc($fire)) {
                  echo"['".$data."',".$result['count']."],";
                }
            } 

         ?>
        ]);

        var options = {
          title: 'The number of the different member status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('member_active_piechart'));

        chart.draw(data, options);
      }

      function newMember_LineChart(){ 
            //overtime
            <?php 

            $member_sql = "SELECT accept_date, COUNT(member_id) as count
            FROM member 
            WHERE YEAR(accept_date) = YEAR(CURRENT_DATE())
            GROUP BY MONTH(accept_date)
            ORDER BY accept_date";

            ?>
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date'); 
            data.addColumn('number', '2022');
            // first one is date, second is tablet, third is glight, blantern
            data.addRows([
              <?php

                  $tablet_array_lump_sum = array();
                  $member = mysqli_query($conn,$member_sql); 
                  while ($result = mysqli_fetch_assoc($member)) {  
                    echo "[".date('"F"', strtotime($result['accept_date'])).",".$result['count']."],";
                  }  
              ?> 
            ]);

            var options = {
              chart: {
                title: 'Total number of new member registered in monthly',
                subtitle: 'the number of new member'
              }
              
              ,
              width: 900,
              height: 500
              
            };

            var chart = new google.charts.Line(document.getElementById('new_member_linechart'));

            chart.draw(data, google.charts.Line.convertOptions(options));
      } 

      function Transaction() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'monthly');
      data.addColumn('number', 'Tablet Transaction');
      data.addColumn('number', 'Blessing Transaction');
      data.addColumn('number', 'Light Transaction');

      data.addRows([
        ["Jan",  37.8, 80.8, 41.8],
        ["Feb",  30.9, 69.5, 32.4],
        ["Mar",  25.4,   57, 25.7],
        ["Apr",  11.7, 18.8, 10.5],
        ["May",  11.9, 17.6, 10.4],
        ["Jun",   8.8, 13.6,  7.7],
        ["Jul",   7.6, 12.3,  9.6],
        ["Aug",  12.3, 29.2, 10.6],
        ["Sep",  16.9, 42.9, 14.8],
        ["Oct", 12.8, 30.9, 11.6],
        ["Nov",  5.3,  7.9,  4.7],
        ["Dev",  6.6,  8.4,  5.2] 
      ]);

      var options = {
        chart: {
          title: 'The different transaction made in Monthly',
          subtitle: 'in thousand of ringgit (RM)'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
 
        function YearlyLineChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Lump Sum');
            data.addColumn('number', 'Over Time');
            // first one is date, second is tablet, third is glight, blantern
            data.addRows([
              <?php  
              $tablet_array_lump_sum = array();
              $tablet = mysqli_query($conn,$tablet_sql);

              while ($result = mysqli_fetch_assoc($tablet)) {
                  $yrdata= strtotime($result['receipt_date']);
                  $yrdata = date('M', $yrdata);
                  $tablet_array_lump_sum[] = array($yrdata, $result['amount']);
              } 

              $tablet_array_over_time = array();
              $tablet1 = mysqli_query($conn,$tablet_sql1);
              while ($result = mysqli_fetch_assoc($tablet1)) {

                  $yrdata= strtotime($result['receipt_date']);
                  $yrdata = date('M', $yrdata);
                  $tablet_array_over_time[] = array($yrdata, $result['amount']);
              }   

              $temp_overs_time_array = array(); 
              $temp_lump_sum_array = array(); 
              $date = "";
              $j = 0 ;
              $k = 0;
              for($i =0; $i < 12; $i++){ 
                  if($i < 9) 
                      $date =  strval("0".($i+1)."/".date("y"));   
                  else 
                      $date =  strval(($i+1)."/".date("y"));   
                  $date1 = date_create_from_format('m/y', $date)->format('M'); 
                  if(count($tablet_array_over_time) != $j)
                  { 
                    if($tablet_array_over_time[$j][0] == $date1)
                    {
                      $temp_overs_time_array[] = array($date1,$tablet_array_over_time[$j][1]); 
                      $j++;
                    }
                    else 
                      $temp_overs_time_array[] = array($date1,0); 
                  }
                  else 
                    $temp_overs_time_array[] = array($date1,0); 
                  if(count($tablet_array_lump_sum) != $k)
                  { 
                    if($tablet_array_lump_sum[$k][0] == $date1)
                    {
                      $temp_lump_sum_array[] = array($date1,$tablet_array_lump_sum[$k][1]); 
                      $k++;
                    }
                    else 
                      $temp_lump_sum_array[] = array($date1,0); 
                  }
                  else 
                    $temp_lump_sum_array[] = array($date1,0); 
              }  
                for($i =0; $i < 12; $i++){ 
                    if($i == 11)
                      echo "["."\"".$temp_lump_sum_array[$i][0]."\"".",".$temp_lump_sum_array[$i][1].",".$temp_overs_time_array[$i][1]."]";  
                    else
                      echo "["."\"".$temp_lump_sum_array[$i][0]."\"".",".$temp_lump_sum_array[$i][1].",".$temp_overs_time_array[$i][1]."],";   
                }
              ?>
            ]);

            var options = {
              chart: {
                title: 'Box Office Earnings in First Two Weeks of Opening',
                subtitle: 'in millions of dollars (USD)'
              }
              
              ,
              width: 700,
              height: 500
              
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material1'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        } 
    </script>
  </head>
  <body> 
      <div style="all: revert;">
        <div id="member_type_piechart" style="width: 100%; height: 500px;"></div>
      </div> 

    <div id="member_active_piechart" style="width: 100%; height: 500px;"></div>
    <div id="new_member_linechart" style="width: 100%; height: 500px;"></div>
    <div id="linechart_material" style="width: 100%; height: 500px;"></div>
    <div id="linechart_material1" style="width: 100%; height: 500px;"></div>
  </div>
  </body>
</html>