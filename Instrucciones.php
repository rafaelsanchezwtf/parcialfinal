
<!-- Añadir el archivo prom_cal_alto.php en carpeta raiz (parcialfinal) -->
<!-- inicio prom_cal_alto.php -->
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
<!-- fin prom_cal_alto.php -->

<!-- Añadir el archivo prom_cal_alto.tpl en carpeta parcialfinal/templates -->
<!-- inicio prom_cal_alto.tpl -->
<table>    
	<b>Promedio calificaciones parques de nivel alto: {$calificacion->auxiliars['promedio']}</b><br/><br/>    
</table>
<!-- fin prom_cal_alto.tpl -->

<!-- Añadir a function select($option,$data) en case "calificacion": dentro de db.php ubicado en parcialfinal/modules-->
<!-- Inicio consulta -->
case "prom_calif_alto":
	$info=$this->get_data("SELECT suma/contador as promedio FROM (SELECT  SUM(calificacion) as suma, COUNT(*) as contador FROM calificacion WHERE parque IN (SELECT codigo FROM parque WHERE nivel = 'alto')) aux;");
	break;
<!-- Fin consulta -->

<!-- NOTA: Esta consulta es la misma enviada en el archivo CONSULTA punto d.txt dentro de carpeta raiz (parcialfinal) en el archivo del parcial enviado 'RafaelSanchez.rar'-->

