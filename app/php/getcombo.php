<?php 
require './../models/get.php';

if($_GET['modulo']=='categorias'){
        $data=array('estatus' => $_GET['estatus']);
}


$get= new Get();
$datos=$get->getDuplicado($_GET['modulo'],$data);
echo json_encode($datos);


?>