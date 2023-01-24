<?php
require_once "ConnectionDB.php";
class AccessM extends ConnectionDB{	
	//Ver consultorios
	static public function viewAccessM($tablaBD, $columna, $valor){
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
}