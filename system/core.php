<?php if(!defined('SYSTEM')) exit('Access denied');

	//Dołączenie pliku konfiguracyjnego
	require(SYSTEM.'config.php');
	require(SYSTEM.'connect.php');
	require(SYSTEM.'helper_controller.php');
	require(SYSTEM.'helper_model.php');
	
	//Główna klasa frameworka
	final class core
	{
		private $controller, $action, $arguments;
		private $gcontroller;
		
		public function __construct()
		{
			$this->getParameters();
			$this->loadController();
			$this->executeMethod();
		}
		
		private function getParameters()
		{
			//Rozbicie url-a na poszczególne elementy tablicy
			$this->arguments = $_SERVER['REQUEST_URI'];
			$this->arguments = preg_replace('#[\.\s-]*#', '', $this->arguments);
			$this->arguments = preg_replace('#/+#', '/', $this->arguments, '/');
			$this->arguments = explode('/', trim($this->arguments, '/'));

			//Wyodrębnianie kontrolera
			if(!empty($this->arguments[0])) $this->controller = array_shift($this->arguments);
			else														$this->controller = DEFAULT_CONTROLLER;
			
			//Wyodrębnianie akcji
			if(!empty($this->arguments[0])) $this->action = array_shift($this->arguments);
			else														$this->action = DEFAULT_ACTION;
			
			//Reszta elementów tablicy to argumenty
			//przekazywane do wyodrębnionej akcji
		}
		
		private function loadController()
		{
			//Dołączenie klasy kontrolera
			if(!file_exists(CONTROLLERS.$this->controller.'.php')) $this->controller = DEFAULT_CONTROLLER;
			require(CONTROLLERS.$this->controller.'.php');	
				
			//Sprawdzenie czy w pliku z kontrolerem zdefiniowano klasę kontrolera
			if(!class_exists($this->controller)) $this->controller = DEFAULT_CONTROLLER; 

			//Tworzenie instancji klasy kontrolera
			$this->gcontroller = new $this->controller($this->controller);
		}
		
		private function executeMethod()
		{
			//Sprawdzenie czy w klasie z kontrolerem zdefiniowano wywołaną akcje
			if(!method_exists($this->gcontroller, $this->action)) $this->action = DEFAULT_ACTION;
			
			//Pobranie tablicy argumentów wybranej akcji
			$class  = new ReflectionClass($this->gcontroller);
			$action = $class->getMethod($this->action);
			$parameters = $action->getParameters();
			
			//Uzupełnienie brakujących argumentów wymaganych przez metode
			while(count($parameters) > count($this->arguments))
			{
				array_push(&$this->arguments, '');
			}
			
			//Wykonanie metody odpowiadającej wybranej akcji z klasy kontrolera
			$action->invokeArgs($this->gcontroller, $this->arguments);
		}
	}
	
	$core = new core();

?>