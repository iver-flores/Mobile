<?php
class DoorsC{
	//Crear consultorios
	public function createDoorsC(){
		if(isset($_POST["doorN"]) && isset($_POST["ipN"])){
			$tablaBD = "doors";
			$door = array("nameC"=>$_POST["doorN"], 
            "ipC"=>$_POST["ipN"], "stateC"=>'disable');
			$resultado = DoorM::createDoorsM($tablaBD, $door);
			if($resultado == true){
				echo '<script>
				    window.location = "http://127.0.0.1/mobile/doors";
				</script>';
			}
		}
	}
	//Ver consultorios
	static public function viewDoorsC($columna, $valor){
		$tablaBD = "doors";
		$resultado = DoorM::viewDoorsM($tablaBD, $columna, $valor);
		return $resultado;
	}
	//Borrar Consultorios
	public function deleteDoorsC(){		
		if(substr($_GET["url"], 6)){
			$tablaBD = "doors";
			$id = substr($_GET["url"], 6);
			$resultado = DoorM::deleteDoorsM($tablaBD, $id);
			if($resultado == true){
				echo '<script>
		    		window.location = "http://127.0.0.1/mobile/doors";
				</script>';
			}
		}
	}
	//Editar consultorios
	public function editDoorsC(){
		$tablaBD = "doors";
		$id = substr($_GET["url"], 4);
		$resultado = DoorM::editDoorsM($tablaBD, $id);        
		echo '<form method="post" enctype="multipart/form-data">				
            <div>					
				<h2>Nombre:</h2>
				<input type="text" class="form-control input-lg" name="doorC" value="'.$resultado["name"].'">
				<input type="hidden" class="form-control input-lg" name="idC" value="'.$resultado["id"].'">				
                <h2>IP:</h2>
				<input type="text" class="form-control input-lg" name="ipC" value="'.$resultado["ip"].'">							
                <br>
				<button class="btn btn-success" type="submit">Guardar Cambios</button>  
			</div>
        </form>';
	}
	//Actualizar Consultorios
	public function updateDoorsC(){
		if(isset($_POST["doorC"])){
			$tablaBD = "doors";
			$datosC = array("idC"=>$_POST["idC"], "nameC"=>$_POST["doorC"], "ipC"=>$_POST["ipC"]);
			$resultado = DoorM::updateDoorsM($tablaBD, $datosC);
			if($resultado == true){
				echo '<script>
				    window.location = "http://127.0.0.1/mobile/doors";
				</script>';
			}
		}
	}
}