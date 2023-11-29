<?php
    class Database {
        static public function conexion(){
            $db = new mysqli('localhost', 'root', '', 'software_turnos');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }

    }
