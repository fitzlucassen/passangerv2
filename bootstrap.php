<?php
    session_start();
    
    // Includes
    require_once 'routes.config.php';
    require_once 'app.class.php';
    
    // Auto-load pour les entity et les repository et les helper
    spl_autoload_register("App::ManageAutoload");
    
    // Put your SQL config here
    Sql::SetDb("passangerv2");
    Sql::SetHost("localhost");
    Sql::SetUser("root");
    Sql::SetPwd("");
    // End SQL config
    
    // FOR DEVELOPER ONLY
    // Put your router config here
    Router::SetDefaultAction("index");
    Router::SetDefaultController("home");
    Router::SetDefaultLanguage("fr");
    // End router config
    
    $App = new App();
    $App->setIsDebugMode(true);
    $App->run();