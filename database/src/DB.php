<?php

namespace Uph\database;

class DB {
    public static function getDB()
    {
        return new \PDO(
            'mysql:host=127.0.0.1;dbname=uph_23ti2', //connection 
            'root',  //user
            '' //passsword
        );
    }
}