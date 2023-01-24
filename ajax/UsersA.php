<?php
require_once "../controllers/UserC.php";
require_once "../models/UserM.php";

class UsersA{
	public $Uid;
	public function EuserA(){
		$columna = "id";
		$valor = $this->Uid;
		$resultado = UsersC::UserC($columna, $valor);
		echo json_encode($resultado);
	}
}

if(isset($_POST["Uid"])){
	$eU = new UsersA();
	$eU -> Uid = $_POST["Uid"];
	$eU -> EUserA();

}else if(isset($_POST["Vid"])){
	$eV = new UsersA();
	$eV -> Uid = $_POST["Vid"];
	$eV -> EUserA();

}