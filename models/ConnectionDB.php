<?php
    class ConnectionDB{
        public static function cDB(){
            $bd = new PDO("mysql:host=127.0.0.1;dbname=mobile", "root", "");
            $bd -> exec("set names utf8");
            return $bd;
        }
    }