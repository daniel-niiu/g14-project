<?php 
	include "../db/dbconnection.php";  
	$data = $_POST['transaction_type'];

	//convert to Y-m-d format
	$start_date = str_replace('/', '-', $_POST['start_date']); 
        $date = explode("-", $start_date);
        $start_date = $date[2].'-'.$date[0].'-'.$date[1];   
	//convert to Y-m-d format 
	$date = str_replace('/', '-', $_POST['end_date']); 
        $date = explode("-", $date);
        $end_date = $date[2].'-'.$date[0].'-'.$date[1];  

	$index="";
	$date_array = array();
	$tablet_data_array = array();
	$blantern_data_array = array();
	$glight_data_array = array(); 

	$start_date1 = date("Y", strtotime($start_date));
	$end_date1 = date("Y", strtotime($end_date));

	$result_data_array = array(); 

	$status = ""; // 
	//if the year of start date is same as end date 
	if($start_date1 == $end_date1)
	{  
		//if the start date same month with others, show daily 	
		if(date("Y-m", strtotime($start_date)) == date("Y-m", strtotime($end_date)))
		{    
			$status = "Daily";
			for($i = date("d", strtotime($start_date)); $i <= date("d", strtotime($end_date)); $i++)
			{
				if($i < 10)
				{
					if(str_contains($i, '0'))
					{
						$i = str_replace("0","",$i);
					}
					$date_array[] = "0$i";
				}
				else
					$date_array[] = "$i";
			} 
			foreach ($data as $value) { 
				if($value == "Tablet"){ 
					$tablet_sql = "SELECT tr.receipt_date, ROUND(AVG(tr.receipt_amount), 2) as amount
					FROM tablet AS t 
					RIGHT JOIN tablet_receipt AS tr  
					ON t.tablet_id = tr.Tablet_id
					WHERE tr.receipt_date >= '$start_date'
					AND tr.receipt_date <= '$end_date' 
					GROUP BY DAY(tr.receipt_date)
					ORDER BY tr.receipt_date";

					$tablet_array = array();
					$tablet = mysqli_query($conn,$tablet_sql);
					while ($result = mysqli_fetch_assoc($tablet))
					{
					 	$yrdata= strtotime($result['receipt_date']);
					 	$yrdata = date('d', $yrdata);
					 	$tablet_array[] = array($yrdata, $result['amount'],"Tablet");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($tablet_array) != $j)
					 	{
					 		if($tablet_array[$j][0] == $date_array[$i])
					 		{
					 			$tablet_data_array[] = $tablet_array[$j][1]; 
					 			$j++;
					 		}
					 		else 
					 			$tablet_data_array[] = 0; 
					 	}
					 	else 
					 		$tablet_data_array[] = 0;   
					} 
				}
				if($value == "Blessing"){
					$blantern_sql = "SELECT receipt_date, ROUND(AVG(price), 2) as amount
					FROM blantern
					WHERE receipt_date >= '$start_date'
					AND receipt_date <= '$end_date' 
					GROUP BY DAY(receipt_date)
					ORDER BY receipt_date";

					$blantern_array = array();
					$blantern = mysqli_query($conn,$blantern_sql);
					while ($result = mysqli_fetch_assoc($blantern)) {
						$yrdata= strtotime($result['receipt_date']);
						$yrdata = date('d', $yrdata);
						$blantern_array[] = array($yrdata, $result['amount'],"Blessing");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($blantern_array) != $j)
						{
							if($blantern_array[$j][0] == $date_array[$i])
							{
								$blantern_data_array[] = $blantern_array[$j][1]; 
								$j++;
							}
							else 
								$blantern_data_array[] = 0; 
						}
						else 
							$blantern_data_array[] = 0;   
					}
				}
				if($value == "Guang"){
					$glight_sql = "SELECT receipt_date, ROUND(AVG(receipt_amount), 2) as amount
					FROM glight_receipt 
					WHERE receipt_date >= '$start_date'
					AND receipt_date <= '$end_date' 
					GROUP BY DAY(receipt_date)
					ORDER BY receipt_date";

					$glight_array = array();
					$glight = mysqli_query($conn,$glight_sql);
					while ($result = mysqli_fetch_assoc($glight)) {
						$yrdata= strtotime($result['receipt_date']);
						$yrdata = date('d', $yrdata);
						$glight_array[] = array($yrdata, $result['amount'],"Glight");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($glight_array) != $j)
						{
							if($glight_array[$j][0] == $date_array[$i])
							{
								$glight_data_array[] = $glight_array[$j][1]; 
								$j++;
							}
							else 
								$glight_data_array[] = 0; 
						}
						else 
							$glight_data_array[] = 0;   
					}
				}
			}    
			//monthly date  
			for($i = 0; $i < count($date_array); $i++)
			{
				$result_data_array[$i][0] = $date_array[$i]; 
			} 
		}
		//otherwise show monthly 
		else
		{ 
			$status = "Monthly";
			$d1 = new DateTime($start_date);
			$d2 = new DateTime($end_date);
 
			// @link http://www.php.net/manual/en/class.dateinterval.php
			$interval = $d2->diff($d1);
			$num_Of__dif_month =  $interval->format('%m');
			
			for($i = 0; $i <=  $num_Of__dif_month; $i++)
			{
				$final = date("M", strtotime("$i month", strtotime($start_date)));
				$date_array[] = $final;
			}  
			foreach ($data as $value) { 
				if($value == "Tablet"){  
					$tablet_sql = "SELECT tr.receipt_date, ROUND(AVG(tr.receipt_amount), 2) as amount
					FROM tablet AS t 
					RIGHT JOIN tablet_receipt AS tr  
					ON t.tablet_id = tr.Tablet_id 
					WHERE tr.receipt_date >= '$start_date'
					AND tr.receipt_date <= '$end_date' 
					GROUP BY MONTH(tr.receipt_date)
					ORDER BY tr.receipt_date";

					$tablet_array = array();
					$tablet = mysqli_query($conn,$tablet_sql);
					while ($result = mysqli_fetch_assoc($tablet))
					{
					 	$yrdata= strtotime($result['receipt_date']);
					 	$yrdata = date('M', $yrdata);
					 	$tablet_array[] = array($yrdata, $result['amount'],"Tablet");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($tablet_array) != $j)
					 	{
					 		if($tablet_array[$j][0] == $date_array[$i])
					 		{
					 			$tablet_data_array[] = $tablet_array[$j][1]; 
					 			$j++;
					 		}
					 		else 
					 			$tablet_data_array[] = 0; 
					 	}
					 	else 
					 		$tablet_data_array[] = 0;   
					}
				}
				if($value == "Blessing"){
					$blantern_sql = "SELECT receipt_date, ROUND(AVG(price), 2) as amount
					FROM blantern
					WHERE receipt_date >= '$start_date'
					AND receipt_date <= '$end_date' 
					GROUP BY MONTH(receipt_date)
					ORDER BY receipt_date";

					$blantern_array = array();
					$blantern = mysqli_query($conn,$blantern_sql);
					while ($result = mysqli_fetch_assoc($blantern)) {
						$yrdata= strtotime($result['receipt_date']);
						$yrdata = date('M', $yrdata);
						$blantern_array[] = array($yrdata, $result['amount'],"Blessing");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($blantern_array) != $j)
						{
							if($blantern_array[$j][0] == $date_array[$i])
							{
								$blantern_data_array[] = $blantern_array[$j][1]; 
								$j++;
							}
							else 
								$blantern_data_array[] = 0; 
						}
						else 
							$blantern_data_array[] = 0;   
					}
				}
				if($value == "Guang"){
					$glight_sql = "SELECT receipt_date, ROUND(AVG(receipt_amount), 2) as amount
					FROM glight_receipt 
					WHERE receipt_date >= '$start_date'
					AND receipt_date <= '$end_date' 
					GROUP BY MONTH(receipt_date)
					ORDER BY receipt_date";

					$glight_array = array();
					$glight = mysqli_query($conn,$glight_sql);
					while ($result = mysqli_fetch_assoc($glight)) {
						$yrdata= strtotime($result['receipt_date']);
						$yrdata = date('M', $yrdata);
						$glight_array[] = array($yrdata, $result['amount'],"Glight");
					}   
					$j = 0;
					for($i = 0; $i < count($date_array); $i++)
					{   
						if(count($glight_array) != $j)
						{
							if($glight_array[$j][0] == $date_array[$i])
							{
								$glight_data_array[] = $glight_array[$j][1]; 
								$j++;
							}
							else 
								$glight_data_array[] = 0; 
						}
						else 
							$glight_data_array[] = 0;   
					}
				}
			}  
			//monthly date 
			for($i = 0; $i < count($date_array); $i ++)
			{
				$result_data_array[$i][0] = $date_array[$i];
			}
		}
	}  
	// show with different year
	else
	{ 
		$d1 = new DateTime($start_date);
		$d2 = new DateTime($end_date);
		$status = "Yearly";
		// @link http://www.php.net/manual/en/class.dateinterval.php
		$interval = $d2->diff($d1);
		$num_Of__dif_month =  $interval->format('%y');
			
		for($i = 0; $i <=  $num_Of__dif_month; $i++)
		{
			$final = date("Y", strtotime("$i year", strtotime($start_date)));
			$date_array[] = $final;
		}  
		foreach ($data as $value) { 
			if($value == "Tablet"){ 
				$tablet_sql = "SELECT tr.receipt_date, ROUND(AVG(tr.receipt_amount), 2) as amount
				FROM tablet AS t 
				RIGHT JOIN tablet_receipt AS tr  
				ON t.tablet_id = tr.Tablet_id 
				WHERE tr.receipt_date >= '$start_date'
				AND tr.receipt_date <= '$end_date' 
				GROUP BY YEAR(tr.receipt_date)
				ORDER BY tr.receipt_date";

				$tablet_array = array();
				$tablet = mysqli_query($conn,$tablet_sql);
				while ($result = mysqli_fetch_assoc($tablet))
				{
				 	$yrdata= strtotime($result['receipt_date']);
				 	$yrdata = date('Y', $yrdata);
				 	$tablet_array[] = array($yrdata, $result['amount'],"Tablet");
				}   
				$j = 0;
				for($i = 0; $i < count($date_array); $i++)
				{   
					if(count($tablet_array) != $j)
					 {
					 	if($tablet_array[$j][0] == $date_array[$i])
					 	{
					 		$tablet_data_array[] = $tablet_array[$j][1]; 
					 		$j++;
					 	}
					 	else 
					 		$tablet_data_array[] = 0; 
					 }
					 else 
					 	$tablet_data_array[] = 0;   
				}
			}
			if($value == "Blessing"){
				$blantern_sql = "SELECT receipt_date, ROUND(AVG(price), 2) as amount
				FROM blantern
				WHERE receipt_date >= '$start_date'
				AND receipt_date <= '$end_date' 
				GROUP BY YEAR(receipt_date)
				ORDER BY receipt_date";
				$blantern_array = array();
				$blantern = mysqli_query($conn,$blantern_sql);
				while ($result = mysqli_fetch_assoc($blantern)) {
					$yrdata= strtotime($result['receipt_date']);
					$yrdata = date('Y', $yrdata);
					$blantern_array[] = array($yrdata, $result['amount'],"Blessing");
				}   
				$j = 0;
				for($i = 0; $i < count($date_array); $i++)
				{   
					if(count($blantern_array) != $j)
					{
						if($blantern_array[$j][0] == $date_array[$i])
						{
							$blantern_data_array[] = $blantern_array[$j][1]; 
							$j++;
						}
						else 
							$blantern_data_array[] = 0; 
					}
					else 
						$blantern_data_array[] = 0;   
				}
			}
			if($value == "Guang"){
				$glight_sql = "SELECT receipt_date, ROUND(AVG(receipt_amount), 2) as amount
				FROM glight_receipt 
				WHERE receipt_date >= '$start_date'
				AND receipt_date <= '$end_date' 
				GROUP BY YEAR(receipt_date)
				ORDER BY receipt_date";

				$glight_array = array();
				$glight = mysqli_query($conn,$glight_sql);
				while ($result = mysqli_fetch_assoc($glight)) {
					$yrdata= strtotime($result['receipt_date']);
					$yrdata = date('Y', $yrdata);
					$glight_array[] = array($yrdata, $result['amount'],"Glight");
				}   
				$j = 0;
				for($i = 0; $i < count($date_array); $i++)
				{   
					if(count($glight_array) != $j)
					{
						if($glight_array[$j][0] == $date_array[$i])
						{
							$glight_data_array[] = $glight_array[$j][1]; 
							$j++;
						}
						else 
							$glight_data_array[] = 0; 
					}
					else 
						$glight_data_array[] = 0;   
				}
			}
		}  
		//monthly date 
		for($i = 0; $i < count($date_array); $i ++)
		{
			$result_data_array[$i][0] = $date_array[$i];
		}
	}
	//insert value to result data array with 2d array
	if(!empty($tablet_data_array))
	{
		for($i = 0; $i < count($tablet_data_array); $i ++)
		{
			$result_data_array[$i][] = $tablet_data_array[$i];
		}
	}
	//insert value to result data array with 2d array
	if(!empty($blantern_data_array))
	{
		for($i = 0; $i < count($blantern_data_array); $i ++)
		{
			$result_data_array[$i][] = $blantern_data_array[$i];
		}
	}
	//insert value to result data array with 2d array
	if(!empty($glight_data_array))
	{
		for($i = 0; $i < count($glight_data_array); $i ++)
		{
			$result_data_array[$i][] = $glight_data_array[$i];
		}
	}
	//print_r($result_data_array);
	$index = rtrim($index,",");
	$string = $index."\n".$start_date."\n".$end_date; 
	if($string != ""){
?>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['line']}); 
        google.charts.setOnLoadCallback(Transaction); 
	    function Transaction() { 
		    var data = new google.visualization.DataTable();
		    data.addColumn('string', '<?php echo $status; ?>');
		    <?php
		    // user selected checkbox
		    $count = 0;
			foreach ($data as $value) 
			{  
				$count++;
			?> 
				data.addColumn('number', '<?php echo $value; ?> Transaction'); 
			<?php
			}  
			?>  
		    data.addRows([
		    	<?php    
		    		$data_chart = "";  
					for($i = 0; $i < count($date_array); $i++)
					{
		                if($count == 3)
		                { 
		    				if($i == (count($date_array)-1))
			                    $data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1].",".$result_data_array[$i][2].",".$result_data_array[$i][3]."]";  
			                else
			                    $data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1].",".$result_data_array[$i][2].",".$result_data_array[$i][3]."],";  
		                }
		                // user selected checkbox 
		                else if($count == 2)
		                { 
			                if($i == (count($date_array)-1))
			                    $data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1].",".$result_data_array[$i][2]."]";  
			                else
			                    $data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1].",".$result_data_array[$i][2]."],";  
		                }
		                // user selected checkbox 
		                else
		                {
		                	if($i == (count($date_array)-1))
			                	$data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1]."]";  
			                else
			                    $data_chart .= "["."\"".$result_data_array[$i][0]."\"".",".$result_data_array[$i][1]."],"; 
			            }
		            }  
	                echo "$data_chart";
		    	?> 
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
    </script> 
<?php
		echo '<div id="linechart_material" style="width: 100%; height: 500px;"></div>'; 
	} 
	else
	{
		echo $string;
	} 
?>