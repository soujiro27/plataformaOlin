<?php 

session_start();
	class Login{

		private $pdo = array();

		public function checkLogin($data,$app){

			$get = new Get();
			$this->pdo[':nombre']=$data['nombre'];
			$this->pdo['password']=$data['password'];
			
			$sql="Select idUsuario,tipo from Usuarios where nombre=:nombre and password=:password";
			$tipo=$get->consultaRetornoPDO($sql,$this->pdo);
			if(empty($tipo)){
				$app->render('login.html');
			}else{
				if($tipo[0]['tipo']==0){
					$_SESSION['tipoUsuario'] = $tipo[0]['tipo'];
					$_SESSION['idUsuario'] = $tipo[0]['idUsuario'];
					$url=$app->urlFor('adminPanel');
					$app->redirect($url);
				}else{
					echo " no entra";
				}
			}

		}

	}

 ?>