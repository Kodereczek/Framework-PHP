<?php if(!defined("SYSTEM")) exit('Access denied');

	function filtr($var, $flag = '', $warp = 0)
	{
		$var = trim($var);
		$var = preg_replace('/(\/\*)*(\*\/)*[$]*/', '', $var);
		
		if($warp !== 0) $var = wordwrap($var, $warp, "\n", 1);
		
		if(!empty($flag))
		{
			$flag = strtolower($flag);
			if($flag == 'html') $var = htmlspecialchars($var);
			if($flag == 'db') 	$var = mysql_real_escape_string(stripslashes($var));
			if($flag == 'int')  $var = preg_replace('/[^0-9]/', '', $var);
			if($flag == 'url')
			{
				$var = str_replace(array('Ą','Ę','Ó','Ś','Ł','Ż','Ź','Ć','Ń'), array('A','E','O','S','L','Z','Z','C','N'), $var); 
				$var = str_replace(array('ą','ę','ó','ś','ł','ż','ź','ć','ń'), array('a','e','o','s','l','z','z','c','n'), $var);
				
				$var = preg_replace('/[^a-zA-Z0-9\s]/', '', $var);
				$var = preg_replace('/[\s-]+/', '-', $var);
			}
		}
		
		return $var;
	}

?>