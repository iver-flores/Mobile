<?php

class UsersC{
	//Crear Users
	public function crearUsersC(){
		if(isset($_POST["roleU"])){
			$tablaBD = "users";
			$datosC = array("surname"=>$_POST["surname"], "role"=>$_POST["role"], 
			"name"=>$_POST["name"], "camera"=>$_POST["camera"], "door"=>$_POST["door"],
			"user"=>$_POST["user"], "password"=>$_POST["password"], "photo"=>'0',
			"nameConfig"=>$_POST["nameConfig"], "callerId"=>$_POST["callerId"], "defaultuser"=>$_POST["defaultuser"],
			"regexten"=>$_POST["regexten"], "secret"=>$_POST["secret"], "mailbox"=>$_POST["mailbox"],
			"accountcode"=>$_POST["accountcode"], "context"=>$_POST["context"], "amaflags"=>$_POST["amaflags"],
			"callgroup"=>$_POST["callgroup"], "canreinvite"=>$_POST["canreinvite"], "defaultip"=>$_POST["defaultip"],
			"dtmfmode"=>$_POST["dtmfmode"], "fromuser"=>$_POST["fromuser"], "fromdomain"=>$_POST["fromdomain"],
			"fullcontact"=>$_POST["fullcontact"], "host"=>$_POST["host"], "insecure"=>$_POST["insecure"],
			"language"=>$_POST["language"], "md5secret"=>$_POST["md5secret"], "nat"=>$_POST["nat"],
			"deny"=>$_POST["deny"], "permit"=>$_POST["permit"], "mask"=>$_POST["mask"],
			"pickupgroup"=>$_POST["pickupgroup"], "port"=>$_POST["port"], "qualify"=>$_POST["qualify"],
			"restrictcid"=>$_POST["restrictcid"], "rtptimeout"=>$_POST["rtptimeout"], "rtpholdtimeout"=>$_POST["rtpholdtimeout"],
			"type"=>$_POST["type"], "disallow"=>$_POST["disallow"], "allow"=>$_POST["allow"],
			"musiconhold"=>$_POST["musiconhold"], "regseconds"=>$_POST["regseconds"], "ipaddr"=>$_POST["ipaddr"],
			"cancallforward"=>$_POST["cancallforward"], "lastms"=>$_POST["lastms"], "useragent"=>$_POST["useragent"],
			"regserver"=>$_POST["regserver"], "callbackextension"=>$_POST["callbackextension"], "address"=>$_POST["address"]);
			$resultado = UsersM::CrearUserM($tablaBD, $datosC);
			if($resultado == true){
				echo '<script>
				    window.location = "users";
				</script>';
			}
		}
	}
	//Mostrar Users
	static public function verUsersC($columna, $valor){
		$tablaBD = "users";
		$resultado = UsersM::VerUsersM($tablaBD, $columna, $valor);
		return $resultado;
	}
	//Editar User
	static public function UserC($columna, $valor){
		$tablaBD = "users";
		$resultado = UsersM::UserM($tablaBD, $columna, $valor);
		return $resultado;
	}
	//Actualizar User
	public function actualizarUserC(){

		if(isset($_POST["Did"])){

			$tablaBD = "users";

			$datosC = array("id"=>$_POST["Did"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "sexo"=>$_POST["sexoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

			$resultado = UsersM::actualizarUserM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "Users";
				</script>';

			}

		}

	}
	//Borrar User
	public function borrarUserC(){
		if(isset($_GET["Uid"])){
			$tablaBD = "users";
			$id = $_GET["Uid"];
			if($_GET["imgU"] != ""){
				unlink($_GET["imgU"]);
			}
			$resultado = UsersM::BorrarUserM($tablaBD, $id);
			if($resultado == true){
				echo '<script>
					window.location = "users";
				</script>';
			}
		}
	}


	//Iniciar sesión User
	public function ingresarUserC(){

		if(isset($_POST["usuario-Ing"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

				$tablaBD = "Users";

				$datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

				$resultado = UsersM::IngresarUserM($tablaBD, $datosC);

				if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){


					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["sexo"] = $resultado["sexo"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];

					echo '<script>

					window.location = "inicio";
					</script>';

				}

			}

		}

	}


	//Ver Perfil User
	public function verPerfilUserC(){

		$tablaBD = "Users";

		$id = $_SESSION["id"];

		$resultado = UsersM::VerPerfilUserM($tablaBD, $id);

		echo '<tr>
				
				<td>'.$resultado["usuario"].'</td>
				<td>'.$resultado["clave"].'</td>
				<td>'.$resultado["nombre"].'</td>
				<td>'.$resultado["apellido"].'</td>';

				if($resultado["foto"] == ""){

					echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';

				}else{

					echo '<td><img src="'.$resultado["foto"].'" width="40px"></td>';

				}
				
				$columna = "id";
				$valor = $resultado["id_consultorio"];

				$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

				echo '<td>'.$consultorio["nombre"].'</td>' ;
				

				echo '<td>

					Desde: '.$resultado["horarioE"].'
					<br>
					Hasta: '.$resultado["horarioS"].'

				</td>

				<td>
					
					<a href="http://127.0.0.1/clinica/perfil-D/'.$resultado["id"].'">
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
					</a>

				</td>

			</tr>';

	}



	//Editar Perfil User
	public function editarPerfilUserC(){

		$tablaBD = "Users";
		$id = $_SESSION["id"];

		$resultado = UsersM::verPerfilUserM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Nombre:</h2>
							<input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
							<input type="hidden" name="Did" value="'.$resultado["id"].'">	

							<h2>Apellido:</h2>
							<input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

							<h2>Usuario:</h2>
							<input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

							<h2>Contraseña:</h2>
							<input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">';


				$columna = "id";
				$valor = $resultado["id_consultorio"];

				$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

				echo '<h2>Consultorio Actual: '.$consultorio["nombre"].'</h2>
					<h3>Cambiar Consultorio</h3>
							<select class="input-lg" name="consultorioPerfil">';
								
							$columna = null;
							$valor = null;

							$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

							foreach ($consultorio as $key => $value) {
								
								echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

							}

							echo '</select>

							<div class="form-group">
								
								<h2>Horario:</h2>
								Desde: <input type="time" class="input-lg" name="hePerfil" value="'.$resultado["horarioE"].'">
								Hasta: <input type="time" class="input-lg" name="hsPerfil" value="'.$resultado["horarioS"].'">

							</div>

						</div>


						<div class="col-md-6 col-xs-12">
							
							<br><br>

							<input type="file" name="imgPerfil">
							<br>';

							if($resultado["foto"] == ""){

								echo '<img src="http://127.0.0.1/clinica/Vistas/img/defecto.png" class="img-responsive" width="200px">';

							}else{

								echo '<img src="http://127.0.0.1/clinica/'.$resultado["foto"].'" class="img-responsive" width="200px">';

								
							}
							

							echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

							<br><br>

							<button type="submit" class="btn btn-success">Guardar Cambios</button>

						</div>

					</div>

				</form>';

	}
	//Actualizar Perfil User
	public function actualizarPerfilUserC(){

		if(isset($_POST["Did"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}


				if($_FILES["imgPerfil"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Users/Doc-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgPerfil"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Users/Doc-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

			}

			$tablaBD = "Users";

			$datosC = array("id"=>$_POST["Did"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"], "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "consultorio"=>$_POST["consultorioPerfil"], "horarioE"=>$_POST["hePerfil"], "horarioS"=>$_POST["hsPerfil"], "foto"=>$rutaImg);

			$resultado = UsersM::ActualizarPerfilUserM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://127.0.0.1/clinica/perfil-D/'.$resultado["id"].'";
				</script>';

			}

		}

	}


}