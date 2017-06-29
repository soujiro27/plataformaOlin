<?php  

require './../models/get.php';
require './../models/insert.php';

class InsertController{

	public function checkDataInsert($modulo,$datos){
		$getData=new Get();
		$insert=new Insert();
		$duplicado=$getData->getDuplicado($modulo,$datos);
		if(empty($duplicado)){
			$res=$insert->insertaBd($modulo,$datos);
			 if(empty($res['mysql'][2])){
				 $insertResponse['success']='true';
			 }
			 else{
				$insertResponse['error']=$res['mysql'][2];
			 }
			 echo json_encode($insertResponse);
		}
		else{
			$insertResponse['error']='El registro ya se encuentra registrado';
			echo json_encode($insertResponse);
		}
		
	}


	public function checkDataUpdate($modulo,$datos){
		$getData=new Get();
		$insert=new Insert();
		$duplicado=$getData->getDuplicado($modulo,$datos);
		if(empty($duplicado)){
			$res=$insert->update($modulo,$datos);
			 if(empty($res['mysql'][2])){
				 $insertResponse['success']='true';
			 }
			 else{
				$insertResponse['error']=$res['mysql'][2];
			 }
			 echo json_encode($insertResponse);
		}
		else{
			$insertResponse['error']='El registro ya se encuentra registrado';
			echo json_encode($insertResponse);
		}
		
	}

	


}


?>