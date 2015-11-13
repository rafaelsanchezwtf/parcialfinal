<?php

require('configs/include.php');

class c_listar_parques extends super_controller {

    public function display()
    {
        $options['parque']['lvl2']="all";
        $this->orm->connect();
        $this->orm->read_data(array("parque"), $options);
        $parque = $this->orm->get_objects("parque");
        $this->orm->close();
        $this->engine->assign('parque',$parque);
        
        $this->engine->display('header.tpl');
        $this->engine->display($this->temp_aux);
        $this->engine->display('listar_parques.tpl');
        $this->engine->display('footer.tpl');
    }
    
    public function run()
    {
        try
        {
            if (isset($this->get->option))
            {
                $this->{$this->get->option}();
            }
        }
        catch (Exception $e) 
		{
			$this->error=1;
            $this->msg_warning=$e->getMessage();
			$this->engine->assign('type_warning',$this->type_warning);
			$this->engine->assign('msg_warning',$this->msg_warning);
			$this->temp_aux = 'message.tpl';
		}    
        $this->display();
    }
}

$call = new c_listar_parques();
$call->run();

?>
