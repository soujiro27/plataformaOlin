<?php  
require './../controllers/valida.php';
require './../controllers/insert.php';

$nombre=$_POST['nombre'];
$modulo=$_POST['modulo'];
$idCategoria=$_POST['idCategoria'];
$validate= new Valida();
if($validate->existe($nombre) and $validate->vacia($nombre) and $validate->noCaracteres($nombre)){
    $data=array('idCategoria' => $idCategoria,  'nombre' => strtoupper($nombre));
    $insert= new InsertController();
    $insert->checkDataInsert($modulo,$data);
}
else{
   header('location: /templates/web/categorias.php');
}


?>