<?php  

class Valida{

	private $cadena;


	public function existe($cadena){
		$this->cadena=$cadena;
		if(isset($cadena)){
			return true;
		}
		else{
			return false;	
		}
	}

	public function vacia($cadena){
		$this->cadena=$cadena;
		if(!empty($cadena)){
			return true;
		}else{
			return false;
		}
	}

	public function noCaracteres($cadena){
		$this->cadena=$cadena;
		$cadenaLimpia=ltrim($cadena);
		$caracteres=strlen($cadenaLimpia);
		if($caracteres>0){
			return true;
		}else{
			return false;
		}

	}

	public function email($cadena){
		$this->cadena=$cadena;
		if(filter_var($this->cadena,FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}


}



?>