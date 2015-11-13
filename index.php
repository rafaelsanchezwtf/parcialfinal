<?php

require('configs/include.php');

class c_index extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title','Parcial Final R F S B');
		
		$this->engine->display('header.tpl');
		$this->engine->display('index.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_index();
$call->run();

?>