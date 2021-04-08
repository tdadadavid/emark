<?php

require_once "Core/connection.php";


class Helpers{
    public static string  $statement;
    public static PDO $pdo;


    public static function selectFromDb(String $table , String $v1){
        $syntax = "SELECT {v1} FROM {$table} WHERE {$v1} = ?";
        self::$pdo =connection::connectToDb();
        self::$statement = self::$pdo->prepare($syntax);
    }

    public static function insertToDb(){
        $syntax = "INSERT INTO emark_one.allusers(firstname , lastname , email, Date , gender, password)VALUES (? , ? , ? , ? , ? , ?)";
        self::$pdo = connection::connectToDb();
        self::$statement = self::$pdo->prepare($syntax);
    }

}
