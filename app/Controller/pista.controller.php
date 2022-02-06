<?php

class PistaController{
    private $showsPista;

    public function __construct(int $pista = null){
        if(is_null($pista)){
            throw new Exception("Passe um parametro para o contrutor", 1);
        }
        $daoPista = new HorarioDAO();
        
        $this->showsPista = $daoPista->queryByPista($pista);
        
    }
    public function getShows(){
        return $this->showsPista;
    }
    public function getShowsJson(){
        return json_encode($this->showsPista);
    }
}
$controler = new PistaController($_ARGS['idPista']);
$_ARGS['shows'] = $controler->getShows();

?>