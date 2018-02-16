<?php if(!defined('SYSTEM')) exit('Access denied');

	class index extends helper_controller
	{
		public function __construct($controller)
		{
			$this->init($controller);
			
			$this->smarty->assign('HTTP', HTTP);
			$this->smarty->assign('DATA', DATA);
		}
		
		public function __destruct()
		{
			$this->smarty->display('index.tpl');
		}
		
		public function defaultaction()
		{

		}
	}
	
?>