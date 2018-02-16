<?php if(!defined('SYSTEM')) exit('Access denied');

	//Adres strony
	define('HTTP', 'http://'.$_SERVER['SERVER_NAME'].'/');
	
	//Adres strony referencyjnej
	define('REF', $_SERVER['HTTP_REFERER']);
	
	//Foldery frameworka
	define('MODULES',   'modules/');
	define('SMARTY', 	'smarty/');
	define('PHPMAILER', 'phpmailer/');
	
	//Foldery aplikacji
	define('CONTROLLERS', 'application/controllers/');
	define('MODELS', 	  'application/models/');
	define('VIEWS', 	  'application/views/');
	define('VIEWS_C', 	  'application/views_c/');
	define('DATA', 		  'application/data/');
	define('TEMP',		  'application/temp/');
	
	//Domyślny kontroler i akcja
	define('DEFAULT_CONTROLLER', 'index');
	define('DEFAULT_ACTION', 	 'defaultaction');
	
	//Wł/Wył Moduły
	define('M_SMARTY', 1);
	define('M_STORE',  1);
	define('M_INPUT',  1);
	define('M_ROUTER', 1);
	define('M_FILTR',  1);
	define('M_INFO',   1);
	
	//Wł/Wył połączenie z bazą
	define('CONNECT', 1);
	
	//Dane do połączenia z bazą
	define('C_HOST', 'host');
	define('C_USER', 'user');
	define('C_PASS', 'pass');
	define('C_DB', 	 'database');
	
	//Debugging Smarty
	define('DEBUGGING_SMARTY', false);
	
	//Wyświetlanie błędów składni PHP
	ini_set('display_errors', 1);
  error_reporting(E_ALL);
	
	//Rozpoczęcie lub wznowienie sesji
	session_start();

?>