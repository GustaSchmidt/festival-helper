<?php
include_once("./router.class.php");

/**
 * SERVER TIME
*/
date_default_timezone_set(getenv('APP_TIMEZONE'));
phpinfo();
exit();
/**
 * App Get Routes
 * */ 

Router::CreateRoute("GET", "/bloco", ["idPista"], function($_ARGS){
    include("./Model/HorariosDAO.class.php");
    include("./Controller/pista.controller.php");
    if(count($_ARGS['shows']) == 0){
        header("location: /");
        exit();
    }
    include("./View/pista.view.php");
    return 0;
});

Router::CreateRoute("GET", "/", [], function($_ARGS){
    include("./Model/HorariosDAO.class.php");
    include("./Controller/home.controller.php");
    include("./View/home.view.php");
    return 0;
});

Router::Run();
?>