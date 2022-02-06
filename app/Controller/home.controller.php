<?php
class PistaController{
    private $TaRolando;

    public function __construct(){
        $daoPista = new HorarioDAO();
        $this->TaRolando = $daoPista->queryLinePlay();
    }
    public function getShowsAtivos(){
        return $this->TaRolando;
    }
    public function getShowsAtivosJson(){
        return json_encode($this->TaRolando);
    }
}

$dao = new PistaController();
$_ARGS['Show'] = $dao->getShowsAtivos();


?>