<?php if(!defined("SYSTEM")) exit('Access denied');
	
	class info
	{
		public function addDI($info, $type)
		{
			$_SESSION['infoDI']['tresc'] = $info;
			$_SESSION['infoDI']['typ'] = $type;
		}
		
		public function getDI()
		{
			if(isset($_SESSION['infoDI'])) return $_SESSION['infoDI'];
			else 													 return false;
		}
		
		public function deleteDI()
		{
			unset($_SESSION['infoDI']);
		}
		
		public function addMI($info, $key = '')
		{
			if(!isset($_SESSION['infoMI'])) $l = 0;
			else 														$l = count($_SESSION['infoMI']);
			if(empty($key)) $_SESSION['infoMI'][$l] = $info;
			else 						$_SESSION['infoMI'][$key] = $info;
		}
		
		public function getMI($key = '')
		{
			if(empty($key) && isset($_SESSION['infoMI'])) return $_SESSION['infoMI'];
			else if(isset($_SESSION['infoMI'][$key])) return $_SESSION['infoMI'][$key];
			else return false;
		}
		
		public function deleteMI($key = '')
		{
			if(empty($key)) unset($_SESSION['infoMI']);
			else						unset($_SESSION['infoMI'][$key]);
		}
	}
	
?>