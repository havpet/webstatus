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
		$arr[1]["port"] = 80; //testing
		
		$arr[2]["name"] = "Havpet";
		$arr[2]["address"] = "www.havpet.no";
		$arr[2]["port"] = 80; //testing
		
		$allup = true;
		
		$counter = 0;
		$timeout = 1;
		$avgtime = 0;
		
		for($i=0; $i<count($arr); $i++) {
			$result = $s->ping($arr[$i]["address"], $arr[$i]["port"], $timeout);
			$time = $s->measureTime($arr[$i]["address"], $arr[$i]["port"], $timeout);
			
			$avgtime = $avgtime + $time;

			if($counter == 1) { //Number of addresses above header
				echo "" ;  //header
			}
			
			if($result) {
				echo '<div class="up">' .$arr[$i]["name"] . ' (port ' .$arr[$i]["port"]. ') is up! Time: ' .$time. ' ms</div>';
				
			}
		
			else {
				echo '<div class="down">' .$arr[$i]["name"] . ' seems to be down. </div>';
				
				$allup = false;
				
			}
			
			$counter++;
			
		}
		
		echo 'Average time: ' . round($avgtime/count($arr), 2);
		
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
		
		
			
	?>
	
	<br />
	
</div>
	
<div id="bottomtimer">

	<span>Auto-refresh in </span><span id="timer"></span>
	
</div>


</body>

</html>
	
	
