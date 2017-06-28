<?php  
require './../controllers/valida.php';
require './../controllers/insert.php';
$nombre=$_POST['nombre'];
$password=$_POST['password'];

$validate= new Valida();
if($validate->existe($nombre) and $validate->vacia($nombre) and $validate->noCaracteres($nombre) and $validate->email($nombre)){
    if($validate->existe($password) and $validate->vacia($password) and $validate->noCaracteres($password)){
        $data=array('nombre' => $nombre, 'password' => $password );
        $insert= new InsertController();
        $insert->checkDataInsert('usuarios',$data);
    }else{
        $insertResponse['error']='El fomato es Incorrecto';
        echo json_encode($insertResponse);
    }
}
else{
   $insertResponse['error']='El fomato es Incorrecto';
   echo json_encode($insertResponse);
}


?>