<?php 
require './../models/get.php';
require './../controllers/valida.php';
$validate= new Valida();

$id=$_GET['id'];
$modulo=$_GET['tabla'];


if ($modulo=='categorias') {$data=array('idCategoria' => $id );}
elseif ($modulo=='subcategorias'){$data=array('idSubCategoria' => $id );}



if($validate->existe($id) and $validate->vacia($id) and $validate->noCaracteres($id)){
    $get= new Get();
    $datos=$get->getDuplicado($_GET['tabla'],$data);
    echo json_encode($datos);

}






?>