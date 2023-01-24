<?php
require_once "ConnectionDB.php";
class CamerasM extends ConnectionDB{
	//Crear COnsultorios
	static public function createCameraM($tablaBD, $camera){
		$pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD(name, ip) 
        VALUES (:nameC, :ipC)");
		$pdo -> bindParam(":nameC", $camera["nameC"], PDO::PARAM_STR);
        $pdo -> bindParam(":ipC", $camera["ipC"], PDO::PARAM_STR);        
		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}
		//$pdo -> close();
		$pdo = null;
	}
	//Ver consultorios
	static public function viewCamerasM($tablaBD, $columna, $valor){
		if($columna == null){
			$pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");
			$pdo -> execute();
			return $pdo ->fetchAll();
		}else{
			$pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
			$pdo -> execute();
			return $pdo -> fetch();
		}
	}
	//Borrar Consultorios
	static public function deleteCamerasM($tablaBD, $id){
		$pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}
		//$pdo -> close();
		$pdo = null;

	}
	//Editar consultorios
	static public function editCamerasM($tablaBD, $id){
		$pdo = ConnectionDB::cDB()->prepare("SELECT id, name, ip FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		$pdo -> execute();
		return $pdo -> fetch();
		//$pdo -> close();
		$pdo = null;

	}
	//Actualizar Consultorios
	static public function updateCamerasM($tablaBD, $datosC){
		$pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET name = :nameC, ip = :ipC WHERE id = :idC");
		$pdo -> bindParam(":idC", $datosC["idC"], PDO::PARAM_INT);
		$pdo -> bindParam(":nameC", $datosC["nameC"], PDO::PARAM_STR);
        $pdo -> bindParam(":ipC", $datosC["ipC"], PDO::PARAM_STR);        
		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}
		//$pdo -> close();
		$pdo = null;
	}
}