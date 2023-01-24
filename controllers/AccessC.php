<?php
class AccessC{
	//Ver consultorios
	static public function viewAccessC($columna, $valor){
		$tablaBD = "access";
		$resultado = AccessM::viewAccessM($tablaBD, $columna, $valor);
		return $resultado;
	}
}