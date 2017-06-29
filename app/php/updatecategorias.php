<?php  
require './../controllers/valida.php';
require './../controllers/insert.php';

$nombre=$_POST['nombre'];
$validate= new Valida();
if($validate->existe($nombre) and $validate->vacia($nombre) and $validate->noCaracteres($nombre)){
    $data=array('nombre' => strtoupper($nombre), "idCategoria" => $_POST['idCategoria'] );
    $insert= new InsertController();
    $insert->checkDataUpdate('categorias',$data);
}
else{
   header('location: /templates/web/categorias.php');
}


?>