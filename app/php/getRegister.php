<?php 
require './../models/get.php';

$get= new Get();



$data=array('idCategoria' => $_GET['idCategoria'] );
$datos=$get->getDuplicado($_GET['tabla'],$data);
echo json_encode($datos);





?>