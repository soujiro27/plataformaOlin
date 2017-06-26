<?php
class Tables extends Rutas{

private $caracteres='select idCaracter,siglas, nombre,estatus from sia_CatCaracteres';

public function incio($modulo){
		$obtener= new Get();
		if($modulo=='Caracteres'){$sql=$this->caracteres;}

		$obtener->getTable($sql);
}



}



 ?>
