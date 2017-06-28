<?php 

class Login{

	private $pdo = array();

	public function checkLogin($data){

		$get = new Get();
		$this->pdo[':nombre']=$data['nombre'];
		$this->pdo['password']=$data['password'];
		
		$sql="Select idUsuario,tipo from Usuarios where nombre=:nombre and password=:password";
		$tipo=$get->consultaRetornoPDO($sql,$this->pdo);
		if(empty($tipo)){
				header('location:/templates/login.html');
		}else{
			var_dump($tipo);
			if($tipo[0]['tipo']==0){
				//$_SESSION['tipoUsuario'] = $tipo[0]['tipo'];
				//$_SESSION['idUsuario'] = $tipo[0]['idUsuario'];
				header('location:/templates/web/admin.php');
			}else{
				echo " no entra";
			}
		}

	}

}

 ?>