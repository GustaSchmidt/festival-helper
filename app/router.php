<?php
include_once("./router.class.php");


/**
 * App Routes
 * */ 

//HOME ou INDEX
Router::CreateRoute("GET", "/bloco", ["idPista"], function($args){
    include("./View/pista.view.php");
    return 0;
});
Router::CreateRoute("GET", "/", [], function(){
    include("./View/home.view.php");
    return 0;
});

Router::Run();
?>