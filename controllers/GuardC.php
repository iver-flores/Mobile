<?php
class GuardC{
	//Ingreso Guardias
	public function entranceGuardC(){
		if(isset($_POST["user-ent"])){
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["user-ent"]) 
                && preg_match('/^[a-zA-Z0-9]+$/', $_POST["password-ent"])){
				$tablaBD = "guards";
				$datosC = array("userC"=>$_POST["user-ent"], "password"=>$_POST["password-ent"]);
				$resultado = GuardM::entranceGuardM($tablaBD, $datosC);				
				if($resultado !== false){
					if($resultado["user"] == $_POST["user-ent"] 
					&& $resultado["password"] == $_POST["password-ent"]){
						$_SESSION["enterC"] = true;
						$_SESSION["idC"] = $resultado["id"];
						$_SESSION["userC"] = $resultado["user"];
						$_SESSION["passwordC"] = $resultado["password"];
						$_SESSION["nameC"] = $resultado["name"];
						$_SESSION["surnameC"] = $resultado["surname"];
						$_SESSION["photoC"] = $resultado["photo"];
						$_SESSION["stateC"] = $resultado["state"];
						$_SESSION["roleC"] = $resultado["role"];
						echo '<script>
							window.location = "init";
						</script>';
					}else{
						echo '<br><div class="alert alert-danger">Error al Ingresar</div>';
					}
				}else{
					echo '<br><div class="alert alert-danger">Error al Ingresar</div>';
				}							
			}
		}
	}
	//Ver perfil secretaria
	public function viewProfileGuardC(){
		$tablaBD = "guards";
		$id = $_SESSION["idC"];
		$resultado = GuardM::viewProfileGuardC($tablaBD, $id);	
		if($resultado !== false){
			echo '<tr>							
				<td>'.$resultado["user"].'</td>
				<td>'.$resultado["password"].'</td>
				<td>'.$resultado["name"].'</td>
				<td>'.$resultado["surname"].'</td>';
				if($resultado["photo"] == "" || $resultado["photo"]== "0"){
					echo '<td><img src="http://127.0.0.1/mobile/view/img/defecto.png" 
					class="img-responsive" width="40px"></td>';
				}else{
					echo '<td><img src="http://127.0.0.1/mobile/'.$resultado["photo"].'" 
					class="img-responsive" width="40px"></td>';					
				}		
				echo '<td>						
					<a href="http://127.0.0.1/mobile/profile-g/'.$resultado["id"].'">						
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
					</a>
				</td>
			</tr>';
		}
	}
	//Editar Perfil
	public function EditProfileGuardC(){
		$tablaBD = "guards";
		$id = $_SESSION["idC"];
		$resultado = GuardM::viewProfileGuardC($tablaBD, $id);
		if($resultado != false){
			echo '<form method="post" enctype="multipart/form-data">				
				<div class="row">					
					<div class="col-md-6 col-xs-12">						
						<h2>Nombre:</h2>
						<input type="text" class="input-lg" name="nameC" value="'.$resultado["name"].'">
						<input type="hidden" class="input-lg" name="idC" value="'.$resultado["id"].'">
						<h2>Apellido:</h2>
						<input type="text" class="input-lg" name="surnameC" value="'.$resultado["surname"].'">
						<h2>Usuario:</h2>
						<input type="text" class="input-lg" name="userC" value="'.$resultado["user"].'">
						<h2>Contraseña:</h2>
						<input type="text" class="input-lg" name="passwordC" value="'.$resultado["password"].'">
					</div>
					<div class="col-md-6 col-xs-12">						
						<br><br>
						<input type="file" name="imgC">
						<br>';
						if($resultado["photo"] == "" || $resultado["photo"] == "0"){
							echo '<img src="http://127.0.0.1/mobile/view/img/defecto.png" width="200px;">';
						}else{
							echo '<img src="http://127.0.0.1/mobile/'.$resultado["photo"].'" width="200px;">';
						}					
						echo '<input type="hidden" name="imgActual" value="'.$resultado["photo"].'">
						<br><br>
						<button type="submit" class="btn btn-success">Guardar Cambios</button>
					</div>
				</div>
			</form>';
		}		
	}
	//Actualizar Perfil Secretaria
	public function updateProfileGuardC(){
		if(isset($_POST["idC"])){
			$rutaImg = $_POST["imgActual"];
			if(isset($_FILES["imgC"]["tmp_name"]) && !empty($_FILES["imgC"]["tmp_name"])){
				if(!empty($_POST["imgActual"])){
					unlink($_POST["imgActual"]);
				}
				if($_FILES["imgC"]["type"] == "image/jpeg"){
					$nombre = mt_rand(10,99);
					$rutaImg = "view/img/Guard/g-".$nombre.".jpg";
					$foto = imagecreatefromjpeg($_FILES["imgC"]["tmp_name"]);
					imagejpeg($foto, $rutaImg);
				}
				if($_FILES["imgC"]["type"] == "image/png"){
					$nombre = mt_rand(10,99);
					$rutaImg = "view/img/Guard/g-".$nombre.".png";
					$foto = imagecreatefrompng($_FILES["imgC"]["tmp_name"]);
					imagepng($foto, $rutaImg);
				}
			}
			$tablaBD = "guards";
			$datosC = array("idC"=>$_POST["idC"], "userC"=>$_POST["userC"], 
				"surnameC"=>$_POST["surnameC"], "nameC"=>$_POST["nameC"], 
				"passwordC"=>$_POST["passwordC"], "photoC"=>$rutaImg);
			$resultado = GuardM::updateProfileGuardM($tablaBD, $datosC);
			if($resultado == true){
				echo '<script>
					window.location = "http://127.0.0.1/mobile/profile-g/'.$_SESSION["idC"].'";
				</script>';
			}
		}
	} 
	//Mostrar Guardias
	public static function viewGuardsC(){
		$tablaBD = "guards";
		$resultado = GuardM::viewGuardsM($tablaBD);
		return $resultado;

	}
	//Crear Secretarias
	public function createGuardsC(){
		if(isset($_POST["rolS"])){			
			$tablaBD = "guards";
			$datosC = array("nameC"=>$_POST["name"], 
				"surnameC"=>$_POST["surname"], "userC"=>$_POST["user"], 
					"passwordC"=>$_POST["password"], 
					"photoC"=>'0', "stateC"=>'disable', 
					"roleC"=>$_POST["rolS"]);					
			$resultado = GuardM::createGuardM($tablaBD, $datosC);			
			if($resultado == true){
				echo '<script>
					window.location = "guards";
				</script>';
			}
		}
	}
	//Borrar Secretarias
	public function deleteGuardC(){
		if(isset($_GET["Gid"])){
			$tablaBD = "guards";
			$id = $_GET["Gid"];
			if($_GET["imgG"] != ""){
				unlink($_GET["imgG"]);
			}
			$resultado = GuardM::deleteGuardsM($tablaBD, $id);

			if($resultado == true){
				echo '<script>
					window.location = "guards";
				</script>';

			}

		}

	}

}