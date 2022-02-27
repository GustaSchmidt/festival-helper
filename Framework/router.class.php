<?php
require(__DIR__."/route.class.php");
class Router{
    private static $routes;
    
    public static function run(){
        if(isset($_SERVER['REDIRECT_URL'])){
            $serverRequest = $_SERVER['REDIRECT_URL'];
        }else{
            $serverRequest = $_SERVER['REQUEST_URI'];
        }
        
        
        $rotaRequisitada = NULL;
        for ($i=0; $i < count(Router::$routes[$_SERVER['REQUEST_METHOD']]); $i++) { 
            $rotas = Router::$routes[$_SERVER['REQUEST_METHOD']];

            $routePath = $rotas[$i]->GetPath();
            $routeLen = $rotas[$i]->GetLen();

            $requestLen = explode("/", $serverRequest);
            array_shift($requestLen);
            $requestLen = count($requestLen);

            if($routeLen == $requestLen){
                if(substr($serverRequest, 0, strlen($routePath)) == $routePath){
                    $rotaRequisitada = $rotas[$i];
                    break;
                }
            }   

        }
        
        if(!is_null($rotaRequisitada)){
            $rotaRequisitada->start();
        }else{
            print("404 Não encontrado");
            header("location: /");
        }
        
    }
    protected static function urlParser(){
        //trata url
        if(isset($_SERVER['REDIRECT_URL'])){
            $serverRequest = explode("/", $_SERVER['REDIRECT_URL']);

        }else{
            $serverRequest = explode("/", $_SERVER['REQUEST_URI']);

        }
        array_shift($serverRequest);


        return $serverRequest;
    }

    public static function CreateRoute(String $method, String $path = '', Array $args = [], $callback){
        $pathLen = explode('/', $path);
        if($pathLen[0] == ''){
            array_shift($pathLen);   
        }

        $routeLen = count($pathLen)+count($args);

        //Cria objeto rota;
        $rota = new Route();
        $rota->SetLen($routeLen);
        $rota->SetPath($path);
        $rota->SetArgs($args);
        $rota->SetCallback(Closure::fromCallable($callback));
       
        Router::$routes[strtoupper($method)][] = $rota;
    }

}

?>