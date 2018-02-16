<?php

	if(CONNECT == 1)
	{
		$baza = @mysql_connect(C_HOST, C_USER, C_PASS) or die('Nie można połączyć się z Mysql');
	
		mysql_select_db(C_DB) or die('Nie można wybrać bazy');
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER_SET 'utf8_general_ci'");
	}
	
?>