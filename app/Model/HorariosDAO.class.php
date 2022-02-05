<?php

class Horario extends sqlBasic{
    private static $colums;
    
    function __construct(){
        $statement = sqlBasic::$conn->prepare("DESCRIBE user");
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
        $loadedUser = $statement->fetchAll()[0];
        $statement = null;
        return $loadedUser;
    }

    public function insert(Horario $user = null){
        if(is_null($user)){
            throw new Exception("Inset deve reveber um array com as chaves correspondentes as colunas da tabela 'horarios'", 1);
        }
        $statement = sqlBasic::$conn->prepare("INSERT INTO `horarios` (`idHorario`, `Pista`, `Artista`, `Estilo`, `HorarioInicio`, `HorarioFim`) 
                VALUES (NULL, 
                ':pista', 
                ':artista',
                ':estilo', 
                ':inicio', 
                ':fim'
            )");
        try {
            $statement->bindParam(":nome", $user->nome);
            $statement->bindParam(":apelido", $user->apelido);
            $statement->bindParam(":email", $user->email);
            $statement->bindParam(":senha", $user->senha);
            $statement->bindParam(":celular", $user->celular);

            return $statement->execute();
        }catch(\PDOException $e) {
            return $e;
        }
    }  
    
    

}

?>