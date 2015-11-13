<?php
	
	class parque extends object_standard{
		protected $codigo;
		protected $nombre;
		protected $municipio;
		protected $nivel;

		var $components = array();

		var $auxiliars = array();

		public function metadata(){
			return array("codigo" => array(), "nombre" => array(), "municipio" => array(), "nivel" => array()); 
		}

		public function primary_key(){
			return array("codigo");
		}

		public function relational_keys($class, $rel_name){
			switch ($class) {
				default:
				break;
			}
		}
	}

?>