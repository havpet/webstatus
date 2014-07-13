<?php
	
	//Change to desired number of seconds before refresh
	header("Refresh: 200;url='index.php'");
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

<?php include 'includes/timer.inc.php'; ?>


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
		$arr[0]["address"] = "www.google.com";
		$arr[0]["port"] = 80;
		
		$arr[1]["name"] = "Apple";
		$arr[1]["address"] = "www.apple.com";
		$arr[1]["port"] = 80;
		
		$arr[2]["name"] = "Havpet";
		$arr[2]["address"] = "www.havpet.no";
		$arr[2]["port"] = 80; //testing
		
		$allup = true;
		
		$counter = 0;
		$timeout = 1;
		$avgtime = 0;
		
		echo '<table><tr><td><b>Website</b></td><td><b>Response time</b></td></tr>';
		
		for($i=0; $i<count($arr); $i++) {
			$result = $s->ping($arr[$i]["address"], $arr[$i]["port"], $timeout);
			$time = $s->measureTime($arr[$i]["address"], $arr[$i]["port"], $timeout);
			
			$avgtime = $avgtime + $time;

			if($counter == 1) { //Number of addresses above header
				echo "" ;  //header
			}
			
			if($result) {
				echo '<tr class="up"><td>' .$arr[$i]["name"] . ' (port ' .$arr[$i]["port"]. ') is up!</td><td>' .$time. ' ms</td></tr>';
				
			}
		
			else {
				echo '<tr class="down"><td>' .$arr[$i]["name"] . ' seems to be down. </td><td>invalid</td></tr>';
				
				$allup = false;
				
			}
			
			$counter++;
			
		}
		
		echo '<tr style="border-top:2px solid #999"><td>Average response time: </td><td>' . round($avgtime/count($arr), 2) . ' ms</td></tr>';
		
		//checking if all sites are running
		if($allup) {
				echo '<style type="text/css">
		
				.imgup {
					display:initial;
				}
	
				</style>';
		}
			
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
	
<div id="bottomtimer">

	<span>Auto-refresh in </span><span id="timer"></span>
	
</div>


</body>

</html>
	
	
