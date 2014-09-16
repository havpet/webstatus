<?php

class status {
	
	//check if website is up
	public function ping($ip, $port, $timeout) {
		$fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout);
		
		fclose($fp);
		return $fp;
	}
	
	//measure time used for server to respond (with fsockopen)
	public function measureTime($ip, $port, $timeout) {
		$time1 = microtime(true);
		$this->ping($ip, $port, $timeout);
		$totaltime = (microtime(true) - $time1)*1000;
		
		return round($totaltime, 2);
    }
}

?>
