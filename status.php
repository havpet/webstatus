<?php

class status {
	
	public function ping($ip, $port) {
		$isUp = false;
		$timeout = 1;
		
		if($fp = @fsockopen($ip,$port,$errCode,$errStr,$timeout)){   
			$isUp = true;
		} 
		
		return $isUp;
	}

}