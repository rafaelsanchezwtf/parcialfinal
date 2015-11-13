<?php

require('configs/include.php');

class c_calificar_parque extends super_controller {

    public function calificar(){
        $this->engine->assign('codigo',$this->post->codigo);
        $this->engine->assign('nombre',$this->post->nombre);
        $this->engine->assign('municipio',$this->post->municipio);

        $calificacion = new calificacion($this->post);
        $calificacion->set('fecha',date('Y-m-d'));

        if(is_empty($calificacion->get('calificacion'))){
            throw_exception("Debe ingresar una calificacion");
        }elseif (($calificacion->get('calificacion')) != 1
            AND ($calificacion->get('calificacion')) != 2
            AND ($calificacion->get('calificacion')) != 3
            AND ($calificacion->get('calificacion')) != 4
            AND ($calificacion->get('calificacion')) != 5){
            throw_exception("Calificacion invalida, calificacion valida: 1, 2, 3, 4, 5");
        }

        $this->orm->connect();
        $this->orm->insert_data("normal",$calificacion);
        $this->orm->close(); 

        $this->type_warning = "Exito";
        $this->msg_warning = "Calificacion registrada";
        $this->temp_aux = 'message.tpl';
        $this->engine->assign('type_warning',$this->type_warning);
        $this->engine->assign('msg_warning',$this->msg_warning);   
    }

    public function display()
    {
        $this->engine->assign('codigo',$this->post->codigo);
        $this->engine->assign('nombre',$this->post->nombre);
        $this->engine->assign('municipio',$this->post->municipio);
        
        $this->engine->display('header.tpl');
        $this->engine->display($this->temp_aux);
        $this->engine->display('calificar_parque.tpl');
        $this->engine->display('footer.tpl');
    }
    
    public function run() {
        try {
            if (isset($this->get->option)) {
                if ($this->get->option == "calificar")
                    $this->{$this->get->option}();
                else
                    throw_exception("Opción ". $this->get->option." no disponible");
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

$call = new c_calificar_parque();
$call->run();

?>
