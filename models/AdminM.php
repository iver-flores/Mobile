<?php
    require_once "ConnectionDB.php";
    class AdminM extends ConnectionDB{
        //Ingreso Guardias
        static public function entranceAdminM($tablaBD, $datosC){
            $pdo = ConnectionDB::cDB()->prepare("SELECT id, user, password, name, 
                surname, photo, role FROM $tablaBD WHERE user = :userC");
            $pdo -> bindParam(":userC", $datosC["userC"], PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            //$pdo -> close();
            $pdo = null;

        }
        //Ver perfil secretaria
        static public function viewProfileAdminC($tablaBD, $id){
            $pdo = ConnectionDB::cDB()->prepare("SELECT user, password, 
                name, surname, photo, role, id FROM $tablaBD WHERE id = :id");
            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetch();
            //$pdo -> close();
            $pdo = null;

        }
        //Actualizar Perfil Secretaria
        static public function updateProfileAdminM($tablaBD, $datosC){
            $pdo = ConnectionDB::cDB()->prepare("UPDATE $tablaBD SET user = :userC, 
                password = :passwordC, name = :nameC, surname = :surnameC, 
                photo = :photoC WHERE id = :idC");
            $pdo -> bindParam(":idC", $datosC["idC"], PDO::PARAM_INT);
            $pdo -> bindParam(":userC", $datosC["userC"], PDO::PARAM_STR);
            $pdo -> bindParam(":passwordC", $datosC["passwordC"], PDO::PARAM_STR);
            $pdo -> bindParam(":nameC", $datosC["nameC"], PDO::PARAM_STR);
            $pdo -> bindParam(":surnameC", $datosC["surnameC"], PDO::PARAM_STR);
            $pdo -> bindParam(":photoC", $datosC["photoC"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;
            }else{
                return false;
            }

            //$pdo -> close();
            $pdo = null;

        }
        //Mostrar Guardias
        static public function viewGuardsM($tablaBD){
            $pdo = ConnectionDB::cDB()->prepare("SELECT * FROM $tablaBD ORDER BY surname ASC");
            $pdo -> execute();
            return $pdo -> fetchAll();
            //$pdo -> close();
            $pdo = null;

        }
        //Crear Secretarias
        static public function CrearSecretariaM($tablaBD, $datosC){

            $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (nombre, apellido, usuario, clave, rol) VALUES (:nombre, :apellido, :usuario, :clave, :rol)");

            $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
            $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
            $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
            $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
            $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

            if($pdo -> execute()){

                return true;

            }else{

                return false;

            }

            //$pdo -> close();
            $pdo = null;

        }



        //Borrar Secretarias
        static public function BorrarSecretariaM($tablaBD, $id){

            $pdo = ConnectionDB::cDB()->prepare("DELETE FROM $tablaBD WHERE id = :id");

            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

            if($pdo -> execute()){

                return true;

            }else{

                return false;

            }

            //$pdo -> close();
            $pdo = null;

        }
    }