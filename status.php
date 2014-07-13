<?php

class status {
	
	public function ping($ip, $port, $timeout) {
		$isUp = false;
		
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		if($fp){   
			$isUp = true;
		} 
		
		return $isUp;
	}
	
	public function measureTime($ip, $port, $timeout) {
		$time1 = microtime(true);
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		$totaltime = (microtime(true) - $time1)*1000;
		
		//last parameter represents desired number of decimals
		return round($totaltime, 2);
	}
	
	

}

?>
