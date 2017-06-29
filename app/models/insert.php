<?php




class Insert{


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

	public function insertaBd($modulo,$datos){
		$db=$this->conecta();
		$datosInsert=new procesaDatosQuery();
		$campos=$datosInsert->obtieneCamposInsert($datos);
		$valores=$datosInsert->obtieneValoresQuery($datos);
		$pdo=$datosInsert->obtieneArregloPdo($datos);
		$sql="INSERT INTO ".$modulo."(".$campos.") VALUES(".$valores.")";
		$dbQuery = $db->prepare($sql);
		$dbQuery->execute($pdo);
		$resInsert['mysql']=$dbQuery->errorInfo();
		return $resInsert;
		}
	
	


	public function update($modulo,$datos){
		$db=$this->conecta();
		$datosInsert=new procesaDatosQuery();
		$valores=$datosInsert->obtieneValoresQueryUpdate($datos);
		$where=$datosInsert->obtieneValoresWhereUpdate($datos);
		$pdo=$datosInsert->obtieneArregloPdo($datos);
		$sql="UPDATE ".$modulo." SET ".$valores." WHERE ".$where;
		$dbQuery = $db->prepare($sql);
		$dbQuery->execute($pdo);
		$resInsert['mysql']=$dbQuery->errorInfo();
		return $resInsert;
		}
	


}

?>
