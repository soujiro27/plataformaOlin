<?php
require './../models/get.php';

class Tables{

private $caracteres='select idCategoria,nombre,estatus from Categorias';

public function incio($modulo){
		$obtener= new Get();
		if($modulo=='categorias'){$sql=$this->caracteres;}

		$obtener->getTable($sql);
}





}

$tabla=new Tables();
$tabla->incio('categorias');


 ?>
