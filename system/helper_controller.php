<?php if(!defined("SYSTEM")) exit('Access denied');
	
	abstract class helper_controller
	{
		private function __set($name, $value)
		{
			$this->$name = $value;
		}
		
		private function __get($name)
		{
			return $this->$name;
		}

		public function init($model)
		{
			//Przekazanie nazwy kontrolera
			$this->model 			= $model;
 			
			//Ładowanie modułów (Klas)
			$this->loadModuleC('store',  M_STORE);
			$this->loadModuleC('input',  M_INPUT);
			$this->loadModuleC('router', M_ROUTER);
			$this->loadModuleC('info', 	 M_INFO);
			
			//Ładowanie modułów (Funkcji)
			$this->loadModuleF('filtr', M_FILTR);
			
			//Ładowanie "Smarty"
			$this->loadSmarty();
				
			//Ładowanie modelu
			$this->loadModel($this->model);
		}
		
		private function loadModuleC($module, $on)
		{	
			//Odpalanie modułów (Klas)
			if($on == 1)
			{
				require(SYSTEM.MODULES."class.$module.php");
				eval('$this->'.$module.' = new $module;');
			}
		}
		
		private function loadModuleF($module, $on)
		{	
			//Odpalanie modułów (Funkcji)
			if($on == 1)
			{
				require(SYSTEM.MODULES."function.$module.php");
			}
		}
		
		private function loadSmarty()
		{
			//Odpalanie i konfiguracja "Smarty"
			if(M_SMARTY == 1)
			{
				require(SYSTEM.SMARTY.'smarty.class.php');
				
				$this->smarty = new Smarty;
				
				$this->smarty->template_dir = VIEWS;
				$this->smarty->compile_dir  = VIEWS_C;
				$this->smarty->debugging = DEBUGGING_SMARTY;
			}
		}
		
		private function loadModel($model)
		{
			//Odpalanie modelu wybranego kontrolera
			if(file_exists(MODELS."$model.php"))
			{
				require(MODELS."$model.php");
				if(class_exists('model'))
				$this->model = new model;
			}
		}
	}
	
?>