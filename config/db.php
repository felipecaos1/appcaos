<?php

class DataBase{

    public static function connect(){
        $db = new mysqli('localhost','root','','appcaos_db');
        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}