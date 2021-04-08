<?php


class connection
{
    /**
     * @return PDO/string
     */
    public static function connectToDb(): string
    {

        try {
            $server = "mysql:host=127.0.0.1";
            $dbName = "allusers";
            $dbusername = "root";
            $dbpassword = "dadadavidtofunmi";

            return new PDO("$server;$dbName", $dbusername, $dbpassword);
        }
        catch (PDOException $exception){
            return "ERROR = " . $exception->getMessage();
        }


    }
}