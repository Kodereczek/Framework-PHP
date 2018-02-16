<?php if(!defined("SYSTEM")) exit('Access denied');
	
	class input
	{
		public function post($key)
		{
			if(isset($_POST[$key])) return $_POST[$key];
			else										return false;
		}

		public function get($key)
		{
			if(isset($_GET[$key])) return $_GET[$key];
			else									 return false;
		}
		
		public function files($key1, $key2)
		{
			if(isset($_FILES[$key1][$key2])) return $_FILES[$key1][$key2];
			else									 					return false;
		}
	}
	
?>