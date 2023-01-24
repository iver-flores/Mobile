<?php
class CamerasC{
	//Crear consultorios
	public function createCameraC(){
		if(isset($_POST["cameraN"]) && isset($_POST["ipN"])){
			$tablaBD = "cameras";
			$camera = array("nameC"=>$_POST["cameraN"], 
            "ipC"=>$_POST["ipN"], "stateC"=>'disable');
			$resultado = CamerasM::createCameraM($tablaBD, $camera);
			if($resultado == true){
				echo '<script>
				    window.location = "http://127.0.0.1/mobile/cameras";
				</script>';
			}
		}
	}
	//Ver consultorios
	static public function viewCamerasC($columna, $valor){
		$tablaBD = "cameras";
		$resultado = CamerasM::viewCamerasM($tablaBD, $columna, $valor);
		return $resultado;
	}
	//Borrar Consultorios
	public function deleteCamerasC(){				
		if(substr($_GET["url"], 8)){
			$tablaBD = "cameras";
			$id = substr($_GET["url"], 8);
			$resultado = CamerasM::deleteCamerasM($tablaBD, $id);
			if($resultado == true){
				echo '<script>
		    		window.location = "http://127.0.0.1/mobile/cameras";
				</script>';
			}
		}
	}
	//Editar consultorios
	public function editCamerasC(){
		$tablaBD = "cameras";
		$id = substr($_GET["url"], 4);
		$resultado = CamerasM::editCamerasM($tablaBD, $id);        
		echo '<form method="post" enctype="multipart/form-data">				
            <div>					
				<h2>Nombre:</h2>
				<input type="text" class="form-control input-lg" name="cameraC" value="'.$resultado["name"].'">
				<input type="hidden" class="form-control input-lg" name="idC" value="'.$resultado["id"].'">				
                <h2>IP:</h2>
				<input type="text" class="form-control input-lg" name="ipC" value="'.$resultado["ip"].'">							
                <br>
				<button class="btn btn-success" type="submit">Guardar Cambios</button>  
			</div>
        </form>';
	}
	//Actualizar Consultorios
	public function updateCamerasC(){
		if(isset($_POST["cameraC"])){
			$tablaBD = "cameras";
			$datosC = array("idC"=>$_POST["idC"], "nameC"=>$_POST["cameraC"], "ipC"=>$_POST["ipC"]);
			$resultado = CamerasM::updateCamerasM($tablaBD, $datosC);
			if($resultado == true){
				echo '<script>
				    window.location = "http://127.0.0.1/mobile/cameras";
				</script>';
			}
		}
	}



}