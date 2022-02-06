<?php
include_once("./router.class.php");

/**
 * SERVER TIME
*/
date_default_timezone_set(getenv('APP_TIMEZONE'));

/**
 * App Get Routes
 * */ 

//HOME ou INDEX
Router::CreateRoute("GET", "/bloco", ["idPista"], function($args){
    include("./View/pista.view.php");
    return 0;
});
Router::CreateRoute("GET", "/", [], function(){
    // include("./View/home.view.php");
    include("./Model/HorariosDAO.class.php");
    return 0;
});

Router::Run();
?>