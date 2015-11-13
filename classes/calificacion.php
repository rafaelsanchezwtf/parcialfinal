<?php
 
	class calificacion extends object_standard
	{
		//attributes
		protected $id;
		protected $fecha;
		protected $calificacion;
		protected $parque;
		
		//components
		var $components = array();
		
		//auxiliars for primary key and for files
		var $auxiliars = array();
		
		//data about the attributes
		public function metadata(){
			return array("id" => array(), "fecha" => array(), "calificacion" => array(), "parque" => array("foreign_name" => "c_p","foreign" => "parque", "foreign_attribute" =>"codigo")); 
		}

		public function primary_key(){
			return array("id");
		}

		public function relational_keys($class, $rel_name){
			switch($class){
				case "parque":
					switch ($rel_name) {
							case "c_p":
								return array("parque");
								break;
					}
				break;
					
			    default:
				break;
			}
		}
	}

?>