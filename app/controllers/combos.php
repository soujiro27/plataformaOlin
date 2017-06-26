<?php



class Combos extends Rutas{



	public function obtenerCombo($data){
		
		$tabla=$this->obtenerTabla($data);
		$campos=$this->obtenerCampos($data);
		$where=$this->obtenerWhere($data);
		$pdo=$this->creaPdoCombo($data);
		$get= new Get();
		if($tabla=='remitentes'){
			$tabla='areas';
			$where='idAreaSuperior=:idAreaSuperior OR idAreaSuperior=:idAreaMenor';
		}
		$get->getCombo($tabla,$campos,$where,$pdo);

	}


	public function obtenerTabla($data){
		$tabla=$data['tabla'];
		return $tabla;

	}

	public function obtenerCampos($data){
		$campos="";
		foreach ($data['campos'] as $key => $value) {
				$campos=$campos.$value.', ';
			}
		$campos=substr($campos,0,-2);
		return $campos;
	}


	public function obtenerWhere($data){
		$where='';
		foreach ($data['where'] as $key => $value) {
			$where=$where.$key.'=:'.$key.' AND ';
		}
		$where=substr($where,0,-4);

		return $where;
	}






	public function creaPdoCombo($data){
		$pdo= array();
		foreach ($data['where'] as $key => $value) {
			$pdo[':'.$key]=$value;
		}
		return $pdo;
	}



}

 ?>
