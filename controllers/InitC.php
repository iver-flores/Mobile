<?php
class InitC{
	public function showInitC(){
		$tablaBD = "init";
		$id = "1";
		$resultado = InitM::showInitM($tablaBD, $id);
		echo '<div class="box-body">        
	          <div class="col-md-6 bg-primary" style="margin-top: 5%; background-color: #FF5722 ">	            
	            <h1 style="color: white;">Bienvenidos</h1>
	            <h3 style="color: black;">'.$resultado["intro"].'</h3>
	            <hr>
	            <h2>Horario:</h2>
	            <h3 style="color: black;">Desde: '.$resultado["hourI"].'</h3>
	            <h3 style="color: black;">Hasta: '.$resultado["hourO"].'</h3>
	            <hr>
	            <h2>Dirección:</h2>
	            <h3 style="color: black;">'.$resultado["address"].'</h3>
	            <hr>
	            <h2>Contactos:</h2>
	            <h3 style="color: black;">Teléfono: '.$resultado["phone"].' <br>
	            Correo: '.$resultado["email"].'</h3>
	          </div>
	          <div class="col-md-6">	        
			  	<br>
				<br>
				<br>
				<br>
	            <img src="'.$resultado["logo"].'" class="img-responsive">
	          </div>
	        </div>';
	}
	//Editar Perfil
	public function EditInitC(){
		$tablaBD = "init";
		$id = "1";
		$resultado = InitM::showInitM($tablaBD, $id);
		echo '<form method="post" enctype="multipart/form-data">				
				<div class="row">					
					<div class="col-md-6 col-xs-12">						
						<h2>Introducción:</h2>
						<input type="text" class="input-lg" name="intro" value="'.$resultado["intro"].'">
						<input type="hidden" class="input-lg" name="Iid" value="'.$resultado["id"].'">
						<div class=form-group>
							<h2>Horario:</h2>
							Desde:<input type="time" class="input-lg" name="hourI" value="'.$resultado["hourI"].'">
							Hasta:<input type="time" class="input-lg" name="hourO" value="'.$resultado["hourO"].'">
						</div>
						<h2>Dirección:</h2>
						<input type="text" class="input-lg" name="address" value="'.$resultado["address"].'">
						<h2>Teléfono:</h2>
						<input type="text" class="input-lg" name="phone" value="'.$resultado["phone"].'">
						<h2>Correo:</h2>
						<input type="text" class="input-lg" name="email" value="'.$resultado["email"].'">
					</div>
					<div class="col-md-6 col-xs-12">											
						<h2>Logo:</h2>
						<input type="file" name="logo">
						<br>
						<img src="http://127.0.0.1/mobile/'.$resultado["logo"].'" width="200px;">
						<input type="hidden" name="logoActual" value="'.$resultado["logo"].'">
						<br><br>
						<h2>Favicon:</h2>
						<input type="file" name="favicon">
						<br>
						<img src="http://127.0.0.1/mobile/'.$resultado["favicon"].'" width="200px;">
						<input type="hidden" name="faviconActual" value="'.$resultado["favicon"].'">
						<br><br>
						<button type="submit" class="btn btn-success">Guardar Cambios</button>
					</div>
				</div>
			</form>';
	}
	public function updateInitC(){
		if(isset($_POST["Iid"])){
			$rutaLogo = $_POST["logoActual"];
			if(isset($_FILES["logo"]["tmp_name"]) && !empty($_FILES["logo"]["tmp_name"])){
				if(!empty($_POST["logoActual"])){
					unlink($_POST["logoActual"]);
				}
				if($_FILES["logo"]["type"] == "image/jpeg"){
					$rutaLogo = "view/img/logo.jpeg";
					$logo = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);			
					imagejpeg($logo, $rutaLogo);
				}
				if($_FILES["logo"]["type"] == "image/png"){
					$rutaLogo = "view/img/logo.png";
					$logo = imagecreatefrompng($_FILES["logo"]["tmp_name"]);				
					imagepng($logo, $rutaLogo);
				}
			}
			$rutaFavicon = $_POST["faviconActual"];
			if(isset($_FILES["favicon"]["tmp_name"]) && !empty($_FILES["favicon"]["tmp_name"])){
				if(!empty($_POST["faviconActual"])){
					unlink($_POST["faviconActual"]);
				}
				if($_FILES["favicon"]["type"] == "image/jpeg"){
					$rutaFavicon = "view/img/favicon.jpeg";
					$favicon = imagecreatefromjpeg($_FILES["favicon"]["tmp_name"]);				
					imagejpeg($favicon, $rutaFavicon);
				}
				if($_FILES["favicon"]["type"] == "image/png"){
					$rutaFavicon = "view/img/favicon.png";
					$favicon = imagecreatefrompng($_FILES["favicon"]["tmp_name"]);			
					imagepng($favicon, $rutaFavicon);
				}
			}
			$tablaBD = "init";
			$datosC = array("id"=>$_POST["Iid"], "intro"=>$_POST["intro"], "hourI"=>$_POST["hourI"], 
				"hourO"=>$_POST["hourO"], "phone"=>$_POST["phone"], "email"=>$_POST["email"], 
				"address"=>$_POST["address"], "logo"=>$rutaLogo, "favicon"=>$rutaFavicon);
			$resultado = InitM::updateInitM($tablaBD, $datosC);
			if($resultado == true){
				echo '<script>
					window.location = "init-edit";
				</script>';
			}
		}
	}
	public function FaviconC(){
		$tablaBD = "init";
		$id = "1";
		$resultado = InitM::showInitM($tablaBD, $id);
		echo '<link rel="icon" type="" href="'.$resultado["favicon"].'">';
	}
}