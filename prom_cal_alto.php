<?php

require('configs/include.php');

class c_prom_cal_alto extends super_controller {
	
	public function display()
	{
		$options['calificacion']['lvl2']="prom_calif_alto";
		$auxiliars['calificacion']=array("promedio");

		$this->orm->connect();
		$this->orm->read_data(array("calificacion"),$options);
		$calificacion = $this->orm->get_objects("calificacion",NULL,$auxiliars);

		$this->engine->assign('calificacion',$calificacion[0]);

		$this->engine->assign('title','Promedio calificaciones Parques nivel alto');
		$this->engine->display('header.tpl');
		$this->engine->display('prom_cal_alto.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_prom_cal_alto();
$call->run();

?>