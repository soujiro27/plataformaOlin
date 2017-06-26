<?php




class Get{



	public function conecta(){
			try{
				require 'conexion.php';
				$db = new PDO("mysql:host={$hostname}; dbname={$database}", $username, $password );
				return $db;
			}catch (PDOException $e) {
				print "ERROR: " . $e->getMessage();
				die();
			}
		}

		//necesaria
	public function consultaRetorno($sql){
		$db=$this->conecta();
		$query=$db->prepare($sql);
		$query->execute();
		//echo "\nPDO::errorInfo():\n";
    //print_r($query->errorInfo());
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function consultaRetornoPDO($sql,$pdo){
			$db=$this->conecta();
			$query=$db->prepare($sql);
			$query->execute($pdo);
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//necesaria
	public function getTable($sql){
			$db=$this->conecta();
			$datos=$this->consultaRetorno($sql);
			echo json_encode($datos);
	}

	public function getDuplicado($tabla,$datos){
			$procesa=new procesaDatosQuery();
			$sql=$procesa->obtieneCamposWhere($datos);
			$sql="SELECT * FROM ".$tabla." WHERE ".$sql;
			$pdo=$procesa->obtieneArregloPdo($datos);
			$datos=$this->consultaRetornoPDO($sql,$pdo);
			return $datos;
	}


	public function getCombo($tabla,$campos,$where,$pdo){
		$db=$this->conecta();
		if($tabla=='auditorias'){
			$sql="SELECT ".$campos." FROM sia_".$tabla." WHERE ".$where." AND clave<>'NULL' ";
		}else{
			$sql="SELECT ".$campos." FROM sia_".$tabla." WHERE ".$where;
		}
		$datos=$this->consultaRetornoPDO($sql,$pdo);
		echo json_encode($datos);
	}





}







?>
