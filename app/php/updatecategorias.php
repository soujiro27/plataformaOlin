<?php  
require './../controllers/valida.php';
require './../controllers/insert.php';

$nombre=$_POST['nombre'];
$modulo=$_POST['modulo'];

if($modulo=='categorias'){
    $data=array('nombre' => strtoupper($nombre), "idCategoria" => $_POST['idCategoria'] );
}
elseif('modulo'=='subcategorias'){
    $data=array('nombre' => strtoupper($nombre), "idCategoria" => $_POST['idCategoria'] );
}

$validate= new Valida();

if($validate->existe($nombre) and $validate->vacia($nombre) and $validate->noCaracteres($nombre)){
    $insert= new InsertController();
    $insert->checkDataUpdate('categorias',$data);
}
else{
   header('location: /templates/web/categorias.php');
}


?>