<?php if(!defined("SYSTEM")) exit('Access denied');
	
	class router
	{

		public function link($controller, $method = '')
		{
			if(empty($controller)) 
			{
				$backtrace = debug_backtrace(0);
				$controller = $backtrace[1]['class'];
			}
			else if($controller == 'd') $controller = DEFAULT_CONTROLLER;
			$str = HTTP."$controller";
			
			if(!empty($method)) 
			{
				$str .= "/$method";
				
				$num = func_num_args();
				for($i=2; $i<$num; $i++)
				{
					if($i == 2) $str .= '/';
					$str .= func_get_arg($i);
					if($num !== ++$i) $str .= '/';
				}
			}
			
			return $str;
		}
		
		public function redirect($controller, $method = '')
		{
			if(empty($controller)) 
			{
				$backtrace = debug_backtrace(0);
				$controller = $backtrace[1]['class'];
			}
			else if($controller == 'd') $controller = DEFAULT_CONTROLLER;
			$str = HTTP."$controller";
			
			if(!empty($method)) 
			{
				$str .= "/$method";
				
				$num = func_num_args();
				for($i=2; $i<$num; $i++)
				{
					if($i == 2) $str .= '/';
					$str .= func_get_arg($i);
					if($num !== ++$i) $str .= '/';
				}
			}
			Header("Location: $str");
		}
		
		public function header($url)
		{
			if(preg_match('#'.HTTP.'#', $url)) Header("Location: $url");
			else $this->redirect('d', '');
		}
	}
	
?>