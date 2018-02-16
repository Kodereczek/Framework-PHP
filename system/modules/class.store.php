<?php if(!defined("SYSTEM")) exit('Access denied');
	
	class store
	{
		public function add($key1, $value, $key2 = '')
		{
			if($key2 !== '')
				$_SESSION[$key1][$key2] = $value;
			else
				$_SESSION[$key1] = $value;
		}
		
		public function addRef($key1, &$value, $key2 = '')
		{
			if($key2 !== '')
				$_SESSION[$key1][$key2] = $value;
			else
				$_SESSION[$key1] = $value;
		}
		
		public function get($key1, $key2 = '')
		{
			if($key2 !== '')
			{
				if(isset($_SESSION[$key1][$key2])) return $_SESSION[$key1][$key2];
				else 											 				 return false;
			}
			else
			{
				if(isset($_SESSION[$key1])) return $_SESSION[$key1];
				else 											 	return false;
			}
		}

		public function delete($key1, $key2 = '')
		{
			if($key2 !== '')
				unset($_SESSION[$key1][$key2]);
			else
				unset($_SESSION[$key1]);
		}
	}
	
?>