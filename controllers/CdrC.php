<?php
class CdrC{
	//Ver consultorios
	static public function viewCdrsC($columna, $valor){
		$tablaBD = "cdr";
		$resultado = CdrM::viewCdrsM($tablaBD, $columna, $valor);
		return $resultado;
	}
}