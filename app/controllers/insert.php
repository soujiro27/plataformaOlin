<?php  


class InsertController{




	public function checkDataInsert($modulo,$datos){
		$getData=new Get();
		$insert=new Insert();
		$duplicado=$getData->getDuplicado($modulo,$datos);
		if(empty($duplicado)){
			$res=$insert->insertaBd($modulo,$datos);
			echo json_encode($res);
		}
		else{
			$salida['insert']='false';
			echo json_encode($salida);
		}
		
	}


	


}


?>