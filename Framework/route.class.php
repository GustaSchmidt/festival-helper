<?php
class Route extends Router{
    private $len;
    private $path;
    private $args;
    private $callback;
    
    public function start(){
        call_user_func($this->callback, $this->GetArgs());
    }

    public function SetLen(Int $tamanho = null){
        $this->len = $tamanho;
    }
    public function SetPath(String $path = null){
        $this->path = $path;
    }
    public function SetArgs(Array $argsName = null){
        $this->args = $argsName;
    }
    public function SetCallback(Object $clojure){
        $this->callback = $clojure;
    }

    public function GetArgs(){
        $auxPath = $this->path;
        if($auxPath[0] != '/'){
            $auxPath = '/'.$auxPath;
        }
        $auxPath = explode("/", $auxPath);
        array_shift($auxPath);

        $auxArgs = Route::urlParser();
        for ($i=0; $i < count($auxPath); $i++) { 
            array_shift($auxArgs);
        }

        $argObject = [];
        for ($i=0; $i < count($this->args); $i++) { 
            $argObject[ $this->args[$i] ] = $auxArgs[$i];

        }

        return $argObject;
    }
    public function GetPath(){
        return $this->path;
    }
    public function GetLen(){
        return $this->len;
    }

}
?>