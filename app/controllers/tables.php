<?php
require './../models/get.php';


class Tables{

private $categorias='select idCategoria as id,nombre,estatus from Categorias';
private $subcategorias='select idSubCategoria as id,idCategoria,nombre,estatus from Categorias';


public function incio($modulo){
		$obtener= new Get();
		if($modulo=='categorias'){$sql=$this->categorias;}
		if($modulo=='subcategorias'){$sql=$this->subcategorias;}
		$obtener->getTable($sql);
}





}

$modulo=$_GET['table'];
$tabla=new Tables();
$tabla->incio($modulo);


 ?>
