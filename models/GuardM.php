<?php
    require_once "ConnectionDB.php";
    class GuardM extends ConnectionDB{
        //Ingreso Guardias
        static public function entranceGuardM($tablaBD, $datosC){
            $pdo = ConnectionDB::cDB()->prepare("SELECT id, user, password, name, 
                surname, photo, state, role FROM $tablaBD WHERE user = :userC");
            $pdo -> bindParam(":userC", $datosC["userC"], PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
            //$pdo -> close();
            $pdo = null;

        }
        //Ver perfil secretaria
        static public function viewProfileGuardC($tablaBD, $id){
            $pdo = ConnectionDB::cDB()->prepare("SELECT user, password, 
                name, surname, photo, role, id FROM $tablaBD WHERE id = :id");
            $pdo -> bindParam(":id", $id, PDO::PARAM_INT);
            $pdo -> execute();
            return $pdo -> fetch();
            //$pdo -> close();
            $pdo = null;

        }
        //Actualizar Perfil Secretaria
        static public function updateProfileGuardM($tablaBD, $datosC){
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
        static public function createGuardM($tablaBD, $datosC){
            $pdo = ConnectionDB::cDB()->prepare("INSERT INTO $tablaBD (user, 
                password, name, surname, photo, state, role) VALUES (:userC, :passwordC, 
                :nameC, :surnameC, :photoC, :stateC, :roleC)");
            $pdo -> bindParam(":nameC", $datosC["nameC"], PDO::PARAM_STR);
            $pdo -> bindParam(":surnameC", $datosC["surnameC"], PDO::PARAM_STR);
            $pdo -> bindParam(":userC", $datosC["userC"], PDO::PARAM_STR);
            $pdo -> bindParam(":passwordC", $datosC["passwordC"], PDO::PARAM_STR);                        
            $pdo -> bindParam(":photoC", $datosC["photoC"], PDO::PARAM_STR);
            $pdo -> bindParam(":stateC", $datosC["stateC"], PDO::PARAM_STR);
            $pdo -> bindParam(":roleC", $datosC["roleC"], PDO::PARAM_STR);
            if($pdo -> execute()){
                return true;
            }else{
                return false;
            }
            //$pdo -> close();
            $pdo = null;

        }
        //Borrar Secretarias
        static public function deleteGuardsM($tablaBD, $id){
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