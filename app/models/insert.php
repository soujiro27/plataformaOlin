<?php

require 'app/controllers/procesaDatos.php';
require 'app/models/get.php';


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
		//echo $modulo;
		$db=$this->conecta();
		/*--------------- funciones de comprobacion de registro duplicado--------------*/
		$getData=new Get();
		$duplicado=$getData->getDuplicado($modulo,$datos);
		$res=count($duplicado);
		if($res>0){
			$salida['insert']='false';
			echo json_encode($salida);
		}
		else
		{
		$datosInsert=new procesaDatosQuery();
		$campos=$datosInsert->obtieneCamposInsert($datos);
		$valores=$datosInsert->obtieneValoresQuery($datos);
		$pdo=$datosInsert->obtieneArregloPdo($datos);
		$sql="INSERT INTO ".$modulo."(".$campos.") VALUES(".$valores.")";
		$dbQuery = $db->prepare($sql);
		$dbQuery->execute($pdo);
		$salida['insert']='true';
		//echo "\nPDO::errorInfo():\n";
    	//print_r($dbQuery->errorInfo());
		echo json_encode($salida);
		}
	}


	public function update($modulo,$datos){
		$db=$this->conecta();
		/*--------------- funciones de comprobacion de registro duplicado--------------*/
		$getData=new Get();
		$duplicado=$getData->getDuplicado($modulo,$datos);
		$res=count($duplicado);
		if($res>0){
			$salida['insert']='false';
			echo json_encode($salida);
		}else{
		$datosInsert=new procesaDatosQuery();
		$valores=$datosInsert->obtieneValoresQueryUpdate($datos);
		$where=$datosInsert->obtieneValoresWhereUpdate($datos);
		$pdo=$datosInsert->obtieneArregloPdo($datos);
		$sql="UPDATE sia_".$modulo." SET ".$valores."usrModificacion=:usrModificacion,fModificacion=getdate() WHERE ".$where;
		//echo $sql;
		$dbQuery = $db->prepare($sql);
		$pdo[':usrModificacion']=$_SESSION ["idUsuario"];
		$dbQuery->execute($pdo);
		//echo "\nPDO::errorInfo():\n";
		//print_r($dbQuery->errorInfo());
		$salida['insert']='true';
		echo json_encode($salida);
		}
	}


}

?>
