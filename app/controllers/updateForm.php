<?php 



class UpdateForm extends Rutas{

	

	public function registroUpdate($modulo,$app){
	$rutas=new Rutas();
	$modulo=$rutas->separaModulo($modulo);
	$form=new Get();
	$datos=$form->getDuplicado($modulo,$app->request->get());
	echo json_encode($datos);
	}


}



 ?>