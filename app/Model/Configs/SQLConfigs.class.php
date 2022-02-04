<?php
class sqlBasic{
    protected static $conn;

    function __construct() {
        $servername = getenv('DB_HOST');
        $serverport = getenv('DB_PORT');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $database = getenv('DB_SCHEMA');

        $PDOoptions = [
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];

        try{
            sqlBasic::$conn = new PDO("mysql:dbname=$database;host=$servername;port=$serverport", $username, $password, $PDOoptions);
            
            return 0;

        }catch(PDOException $e){
            throw new PDOException("Falha na conexão: " . $e->getMessage(), 1);
            return 1;
        }
    }

}



?>