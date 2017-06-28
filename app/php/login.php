<?php  
require './../controllers/valida.php';
require './../controllers/insert.php';
require './../controllers/login.php';
$nombre=$_POST['nombre'];
$password=$_POST['password'];

$validate= new Valida();
if($validate->existe($nombre) and $validate->vacia($nombre) and $validate->noCaracteres($nombre) and $validate->email($nombre)){
    if($validate->existe($password) and $validate->vacia($password) and $validate->noCaracteres($password)){
        $data=array('nombre' => $nombre, 'password' => $password );
        $login= new Login();
        $login->checkLogin($data);
    }else{
        header('location: /templates/login.html');
    }
}
else{
   header('location: /templates/login.html');
}


?>