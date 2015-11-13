<?php

require('configs/include.php');

class c_registrar_parque extends super_controller {
	
	public function registrar(){
		
		$parque = new parque($this->post);

		$this->engine->assign('codigo',$parque->get('codigo'));
		$this->engine->assign('nombre',$parque->get('nombre'));
		$this->engine->assign('municipio',$parque->get('municipio'));
		$this->engine->assign('nivel',$parque->get('nivel'));

		if(is_empty($parque->get('codigo'))){
			throw_exception("Debe ingresar un Codigo");
		}elseif (!is_numeric($parque->get('codigo')) or $parque->get('codigo') < 0){
			throw_exception("Codigo invalido");
		}

		if(is_empty($parque->get('nombre'))){
			throw_exception("Debe ingresar un nombre");
		}

		if(is_empty($parque->get('municipio'))){
			throw_exception("Debe ingresar un municipio");
		}elseif (($parque->get('municipio')) != "Medellín"
			AND ($parque->get('municipio')) != "Rionegro"
			AND ($parque->get('municipio')) != "La Estrella"
			AND ($parque->get('municipio')) != "Copacabana"
			AND ($parque->get('municipio')) != "Guatapé"){
			throw_exception("Municipio invalido, municipios validos: Medellín, Rionegro, La Estrella, Copacabana, Guatapé");
		}

		if(is_empty($parque->get('nivel'))){
			throw_exception("Debe ingresar un nivel");
		}elseif (($parque->get('nivel')) != "alto"
			AND ($parque->get('nivel')) != "bajo"){
			throw_exception("Nivel invalido, niveles validos: alto, bajo");
		}

		$this->orm->connect();
        $this->orm->insert_data("normal",$parque);
        $this->orm->close();

        $this->type_warning = "Exito";
        $this->msg_warning = "parque agregado correctamente";
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);
	}

	public function display()
	{
		$this->engine->assign('title','Registrar Parque');
		
		$this->engine->display('header.tpl');
		$this->engine->display($this->temp_aux);
		$this->engine->display('registrar_parque.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run() {
		try {
			if (isset($this->get->option)) {
				if ($this->get->option == "registrar")
					$this->{$this->get->option}();
				else
					throw_exception("Opción ". $this->get->option ." no disponible");
			}
		} catch (Exception $e) {
			$this->error=1;
			$this->msg_warning=$e->getMessage();
			$this->temp_aux = 'message.tpl';
			$this->engine->assign('type_warning',$this->type_warning);
			$this->engine->assign('msg_warning',$this->msg_warning);
		}
		$this->display();
	}
}

$call = new c_registrar_parque();
$call->run();

?>