<?php
require_once "ConnectionDB.php";
class InitM extends ConnectionDB{
	static public function showInitM($tablaBD, $id){
		$pdo = ConnectionDB::cDB()->prepare("SELECT id, intro, hourI, hourO, 
			address, phone, email, logo, favicon FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		$pdo -> execute();
		return $pdo-> fetch();
		//$pdo->close();
		$pdo = null;
	}
	static public function updateInitM($tablaBD, $datosC){
		$pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET intro = :intro, 
			address = :address, hourI = :hourI, hourO = :hourO, phone = :phone, 
			email = :email, logo = :logo, favicon = :favicon WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":intro", $datosC["intro"], PDO::PARAM_STR);
		$pdo -> bindParam(":address", $datosC["address"], PDO::PARAM_STR);
		$pdo -> bindParam(":hourI", $datosC["hourI"], PDO::PARAM_STR);
		$pdo -> bindParam(":hourO", $datosC["hourO"], PDO::PARAM_STR);
		$pdo -> bindParam(":phone", $datosC["phone"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":logo", $datosC["logo"], PDO::PARAM_STR);
		$pdo -> bindParam(":favicon", $datosC["favicon"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		//$pdo->close();
		$pdo = null;
	}
}