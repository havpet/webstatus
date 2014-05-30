<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css"/>

</head>
<body>
<div id="wrapper">

	<?php
		require_once('status.php');

		$s = new status;
		
		$arr[0]["name"] = "Google";
		$arr[0]["address"] = "www.google.com";
		$arr[0]["port"] = 80;
		
		$arr[1]["name"] = "Apple";
		$arr[1]["address"] = "www.apple.com";
		$arr[1]["port"] = 803; //testing
		
		$arr[2]["name"] = "Havpet";
		$arr[2]["address"] = "www.havpet.no";
		$arr[2]["port"] = 80; //testing
		
		
		$numberOfEntries = 3;
		
		for($i=0; $i<$numberOfEntries; $i++) {
			$result = $s->ping($arr[$i]["address"], $arr[$i]["port"]);
			
			
			if($result) {
				echo '<div class="up">' .$arr[$i]["name"] . ' is up!</div>';
			}
		
			else {
				echo '<div class="down">' .$arr[$i]["name"] . ' is down.';
			}
			
		}
	?>

</div>

</body>

</html>
	
	