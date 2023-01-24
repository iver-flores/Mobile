<?php
require_once "ConnectionDB.php";
class UsersM extends ConnectionDB{
	//Crear Users
	static public function crearUserM($tablaBD, $datosC){
		$pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD(name, surname, photo, 
			user, password, nameConfig, callerid, defaultuser, regexten, secret, mailbox, 
			accountcode, context, amaflags, callgroup, canreinvite, defaultip, dtmfmode, 
			fromuser, fromdomain, fullcontact, host, insecure, language, md5secret, nat, 
			deny, permit, mask, pickupgroup, port, qualify, restrictcid, rtptimeout, 
			rtpholdtimeout, type, disallow, allow, musiconhold, regseconds, ipaddr, 
			cancallforward, lastms, useragent, regserver, callbackextension, address, 
			id_camera, id_door, role) VALUES(:name, :surname, :photo, :user, :password, 
			:nameConfig, :callerId, :defaultuser, :regexten, :secret, :mailbox, :accountcode, 
			:context, :amaflags, :callgroup, :canreinvite, :defaultip, :dtmfmode, :fromuser, 
			:fromdomain, :fullcontact, :host, :insecure, :language, :md5secret, :nat, 
			:deny, :permit, :mask, :pickupgroup, :port, :qualify, :restrictcid, :rtptimeout, 
			:rtpholdtimeout, :type, :disallow, :allow, :musiconhold, :regseconds, :ipaddr, 
			:cancallforward, :lastms, :useragent, :regserver, :callbackextension, :address, 
			:camera, :door, :role)");

		$pdo -> bindParam(":name", $datosC["name"], PDO::PARAM_STR);
		$pdo -> bindParam(":surname", $datosC["surname"], PDO::PARAM_STR);
		$pdo -> bindParam(":photo", $datosC["photo"], PDO::PARAM_STR);
		$pdo -> bindParam(":user", $datosC["user"], PDO::PARAM_STR);
		$pdo -> bindParam(":password", $datosC["password"], PDO::PARAM_STR);
		$pdo -> bindParam(":nameConfig", $datosC["nameConfig"], PDO::PARAM_STR);
		$pdo -> bindParam(":callerId", $datosC["callerId"], PDO::PARAM_STR);
		$pdo -> bindParam(":defaultuser", $datosC["defaultuser"], PDO::PARAM_STR);
		$pdo -> bindParam(":regexten", $datosC["regexten"], PDO::PARAM_STR);
		$pdo -> bindParam(":secret", $datosC["secret"], PDO::PARAM_STR);
		$pdo -> bindParam(":mailbox", $datosC["mailbox"], PDO::PARAM_STR);
		$pdo -> bindParam(":accountcode", $datosC["accountcode"], PDO::PARAM_STR);
		$pdo -> bindParam(":context", $datosC["context"], PDO::PARAM_STR);
		$pdo -> bindParam(":amaflags", $datosC["amaflags"], PDO::PARAM_STR);
		$pdo -> bindParam(":callgroup", $datosC["callgroup"], PDO::PARAM_STR);
		$pdo -> bindParam(":canreinvite", $datosC["canreinvite"], PDO::PARAM_STR);
		$pdo -> bindParam(":defaultip", $datosC["defaultip"], PDO::PARAM_STR);
		$pdo -> bindParam(":dtmfmode", $datosC["dtmfmode"], PDO::PARAM_STR);
		$pdo -> bindParam(":fromuser", $datosC["fromuser"], PDO::PARAM_STR);
		$pdo -> bindParam(":fromdomain", $datosC["fromdomain"], PDO::PARAM_STR);
		$pdo -> bindParam(":fullcontact", $datosC["fullcontact"], PDO::PARAM_STR);
		$pdo -> bindParam(":host", $datosC["host"], PDO::PARAM_STR);
		$pdo -> bindParam(":insecure", $datosC["insecure"], PDO::PARAM_STR);
		$pdo -> bindParam(":language", $datosC["language"], PDO::PARAM_STR);
		$pdo -> bindParam(":md5secret", $datosC["md5secret"], PDO::PARAM_STR);
		$pdo -> bindParam(":nat", $datosC["nat"], PDO::PARAM_STR);
		$pdo -> bindParam(":deny", $datosC["deny"], PDO::PARAM_STR);
		$pdo -> bindParam(":permit", $datosC["permit"], PDO::PARAM_STR);
		$pdo -> bindParam(":mask", $datosC["mask"], PDO::PARAM_STR);
		$pdo -> bindParam(":pickupgroup", $datosC["pickupgroup"], PDO::PARAM_STR);
		$pdo -> bindParam(":port", $datosC["port"], PDO::PARAM_STR);
		$pdo -> bindParam(":qualify", $datosC["qualify"], PDO::PARAM_STR);
		$pdo -> bindParam(":restrictcid", $datosC["restrictcid"], PDO::PARAM_STR);
		$pdo -> bindParam(":rtptimeout", $datosC["rtptimeout"], PDO::PARAM_STR);
		$pdo -> bindParam(":rtpholdtimeout", $datosC["rtpholdtimeout"], PDO::PARAM_STR);
		$pdo -> bindParam(":type", $datosC["type"], PDO::PARAM_STR);
		$pdo -> bindParam(":disallow", $datosC["disallow"], PDO::PARAM_STR);
		$pdo -> bindParam(":allow", $datosC["allow"], PDO::PARAM_STR);
		$pdo -> bindParam(":musiconhold", $datosC["musiconhold"], PDO::PARAM_STR);
		$pdo -> bindParam(":regseconds", $datosC["regseconds"], PDO::PARAM_INT);
		$pdo -> bindParam(":ipaddr", $datosC["ipaddr"], PDO::PARAM_STR);
		$pdo -> bindParam(":cancallforward", $datosC["cancallforward"], PDO::PARAM_STR);
		$pdo -> bindParam(":lastms", $datosC["lastms"], PDO::PARAM_INT);
		$pdo -> bindParam(":useragent", $datosC["useragent"], PDO::PARAM_STR);
		$pdo -> bindParam(":regserver", $datosC["regserver"], PDO::PARAM_STR);
		$pdo -> bindParam(":callbackextension", $datosC["callbackextension"], PDO::PARAM_STR);
		$pdo -> bindParam(":address", $datosC["address"], PDO::PARAM_STR);		
		$pdo -> bindParam(":camera", $datosC["camera"], PDO::PARAM_INT);
		$pdo -> bindParam(":door", $datosC["door"], PDO::PARAM_INT);
		$pdo -> bindParam(":role", $datosC["role"], PDO::PARAM_STR);				

		if($pdo -> execute()){
			return true;
		}
		//pdo -> close();
		$pdo = null;
	}
	//Mostrar Users
	static public function verUsersM($tablaBD, $columna, $valor){
		if($columna != null){
			$pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
			$pdo->execute();
			return $pdo -> fetchAll();
		}else{
			$pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD");
			$pdo->execute();
			return $pdo -> fetchAll();
		}
		//$pdo -> close();
		$pdo = null;
	}
	//Editar User
	static public function UserM($tablaBD, $columna, $valor){
		if($columna != null){
			$pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
			$pdo->execute();
			return $pdo -> fetch();
		}
		//$pdo -> close();
		$pdo = null;
	}



	//Actualizar Users
	static public function actualizarUserM($tablaBD, $datosC){

		$pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, sexo = :sexo, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		//$pdo -> close();
		$pdo = null;

	}
	//Eliminar User
	static public function borrarUserM($tablaBD, $id){
		$pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, pdo::PARAM_INT);
		if($pdo -> execute()){
			return true;
		}
		//$pdo -> close();
		$pdo = null;

	}


	//Iniciar sesión User
	static public function ingresarUserM($tablaBD, $datosC){

		$pdo = ConnectionDB::cDB()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		//$pdo -> close();
		$pdo = null;

	}


	//Ver Perfil User
	static public function verPerfilUserM($tablaBD, $id){

		$pdo = ConnectionDB::cDB()->prepare("SELECT usuario, clave, apellido, nombre, sexo, foto, rol, id, horarioE, horarioS, id_consultorio FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		//$pdo -> close();
		$pdo = null;

	}



	//Actualizar Perfil User
	static public function actualizarPerfilUserM($tablaBD, $datosC){

		$pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET id_consultorio = :id_consultorio, apellido = :apellido, nombre = :nombre, foto = :foto, usuario = :usuario, clave = :clave, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		//$pdo -> close();
		$pdo = null;

	}



}