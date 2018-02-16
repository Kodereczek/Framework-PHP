<?php if(!defined("SYSTEM")) exit('Access denied');

	class timegenerated
	{
		private $timer_start, $timer_stop;
		
		public function startTimer()
		{
			list($usec, $sec) = explode(" ", microtime());
			$this->time_start = ((float)$usec + (float)$sec);
		}
		
		public function returnTime()
		{
			list($usec, $sec) = explode(" ", microtime());
			$this->time_stop = ((float)$usec + (float)$sec);
			return substr($this->time_stop - $this->time_start, 0, 10);
		}
	}
	
?>