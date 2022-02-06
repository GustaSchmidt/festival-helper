<?php
require_once(__DIR__."/Configs/SQLConfigs.class.php");

class Horario extends sqlBasic{
    private static $colums;
    
    function __construct(){
        $statement = sqlBasic::$conn->prepare("DESCRIBE horarios");
        $statement->execute();
        User::$colums = $statement->fetchAll();
       
        for ($i=0; $i < count(User::$colums); $i++) { 
            $this->{User::$colums[$i]['Field']} = NULL;
        }
    }
}

class HorarioDAO extends sqlBasic{

    public function load(int $id = null){
        if(is_null($id)){
            throw new Exception("Load 'HorarioDAO' deve receber inteiro", 1);
        }
        $statement = sqlBasic::$conn->prepare("SELECT * FROM `horarios` WHERE `id`=:id LIMIT 1");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $loadedTime = $statement->fetchAll()[0];
        $statement = null;
        return $loadedTime;
    }

    public function insert(Horario $apresentacao = null){
        if(is_null($user)){
            throw new Exception("Inset deve reveber um array com as chaves correspondentes as colunas da tabela 'horarios'", 1);
        }
        $statement = sqlBasic::$conn->prepare("INSERT INTO `horarios` (`Pista`, `Artista`, `Estilo`, `HorarioInicio`, `HorarioFim`) 
                VALUES (NULL, 
                ':pista', 
                ':artista',
                ':estilo', 
                ':inicio', 
                ':fim'
            )");
        try {

            $statement->bindParam(":pista", $apresentacao->Pista);
            $statement->bindParam(":artista", $apresentacao->Artista);
            $statement->bindParam(":estilo", $apresentacao->Estilo);
            $statement->bindParam(":inicio", $apresentacao->HorarioInicio);
            $statement->bindParam(":fim", $apresentacao->HorarioFim);

            return $statement->execute();
        }catch(\PDOException $e) {
            return $e;
        }
    }  

    public function queryAll(){
        $statement = sqlBasic::$conn->prepare("SELECT * FROM `horarios`");
        $statement->execute();
        $result = $statement->fetchAll();
        $statement = null;

        return $result;
    }

    public function queryByPista(int $pista = null){
        if(is_null($pista)){
            throw new Exception("Paremetro query não foi passado", 1);
        }
        $statement = sqlBasic::$conn->prepare("SELECT * FROM `horarios` WHERE Pista = :id");
        try {
            $statement->bindParam(":id", $pista);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement = null;
            return $result;

        }catch(\PDOException $e){
            return $e;
        }
    }

    public function queryLinePlay(){
        $statement = sqlBasic::$conn->prepare("SELECT * FROM `horarios` WHERE HorarioInicio <= CURRENT_TIME AND HorarioFim >= CURRENT_TIME");
        
        $statement->execute();
        $result = $statement->fetchAll();
        $statement = null;
        
        return $result;
    }
    
}
?>