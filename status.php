<?php

class status {
	
	//check if website is up
	public function ping($ip, $port, $timeout) {
		$isUp = false;
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		if($fp){   
			$isUp = true;
		} 
		
		fclose($fp);
		return $isUp;
	}
	
	//measure time used for server to respond (with fsockopen)
	public function measureTime($ip, $port, $timeout) {
		$time1 = microtime(true);
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		$totaltime = (microtime(true) - $time1)*1000;
		
		return round($totaltime, 2);
    }
}

?>
