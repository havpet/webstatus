<?php
	
	//Change to desired number of seconds before refresh
	header("Refresh: 180;url='index.php'");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

 ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title>Webstatus by Havpet</title>
	
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">

<link rel="stylesheet" type="text/css" href="css/styles.css"/>


</head>
<body>
<div id="wrapper">

	<div id="statusimg">

		<img class="imgup" alt="" src="img/approval-256.png" />
		<img class="imgdown" alt="" src="img/x-mark-256.png" />

	</div>

	<?php
		require_once('status.php');

		$s = new status;

		
		//change to desired addresses. You can also add new ones.
		$arr[0]["name"] = "Google";
		$arr[0]["address"] = "google.com";
		$arr[0]["port"] = 80;
		
		$arr[1]["name"] = "Apple";
		$arr[1]["address"] = "apple.com";
		$arr[1]["port"] = 80;
		
		$arr[2]["name"] = "Havpet";
		$arr[2]["address"] = "havpet.no";
		$arr[2]["port"] = 80;
		
		$arr[3]["name"] = "Webfaction";
		$arr[3]["address"] = "95.211.73.1";
		$arr[3]["port"] = 21;
		
		//initializing variables
		$allup = true;
		$timeout = 1;
		$avgtime = 0;
		
		//top row of the table
		echo '<table>
					<tr>
						<td><b>Name</b></td>
						<td><b>Address</b></td>
						<td><b>Port</b></td>
						<td><b>Response time</b></td>
					 </tr>';
		
		//0->number of websites
		for($i=0; $i<count($arr); $i++) {
		
			//calculations
			$result = $s->ping($arr[$i]["address"], $arr[$i]["port"], $timeout);
			$time = $s->measureTime($arr[$i]["address"], $arr[$i]["port"], $timeout);
			
			$avgtime = $avgtime + $time;
			
			//if site is responding
			if($result) {
				echo '<tr class="up">
							<td>' .$arr[$i]["name"] . '</td>
							<td>' .$arr[$i]["address"]. '</td>
							<td> ' .$arr[$i]["port"]. '</td>
							<td>' .$time. ' ms</td>
						 </tr>';
				
			}
			
			//if site is not responding
			else {
				echo '<tr class="down">
							<td>' .$arr[$i]["name"] . '</td>
							<td>' .$arr[$i]["address"]. '</td>
							<td> ' .$arr[$i]["port"]. '</td>
							<td>invalid</td>
						 </tr>';
				
				$allup = false;
				
			}
			
		}
		
		//last row (average response time)
		echo '<tr style="border-top:2px solid #999">
					<td>Average: </td>
					<td></td>
					<td></td>
					<td>' . round($avgtime/count($arr), 2) . ' ms</td>
				 </tr>';
		
		//if all sites are running, show success at top
		if($allup) {
				echo '<style type="text/css">
		
							.imgup {
								display:initial;
							}
	
						 </style>';
		}
		
		//if any of the sites are down, show red cross
		else {
				
			echo '<style type="text/css">
		
						.imgdown {
							display:initial;
						}
	
					 </style>';
		}
		
		
		echo '</table>';
	?>
	
	<br />
	
</div>

</body>

</html>
	
	
