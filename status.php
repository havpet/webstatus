<?php

class status {
	
	public function ping($ip, $port) {
		$isUp = false;
		
		//maximum responding time
		$timeout = 1;
		
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		if($fp){   
			$isUp = true;
		} 
		
		return $isUp;
	}
	
	public function measureTime($ip, $port) {
		$time1 = microtime(true);
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		$totaltime = (microtime(true) - $time1)*1000;
		
		//last parameter represents desired number of decimals
		return round($totaltime, 2);
	}
	
	

}

?>