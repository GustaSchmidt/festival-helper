<?php
include_once("./router.class.php");


/**
 * App Routes
 * */ 

//HOME ou INDEX
Router::CreateRoute("GET", "/", [], function(){
    include("./View/home.view.html");
    return 0;
});

Router::Run();
?>