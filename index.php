<?php
    require_once 'bootstrap.php';

    // On récupère l'url qui correspond
    $RewritingUrl = new RewritingUrl($Connexion, $Session->read('lang'));

    // S'il n'y a rien en base concernant cette route,
    // On récupère la route de la homepage et on en déduit l'objet rewritting
    $url = $RewritingUrl->GetByUrlMatched($page);
    if(!isset($url['controller']) || empty($url['controller'])){
	$Route = new RouteUrl($Connexion, $Session->read('lang'));
	$Route->GetByRouteName('Home');
	$RewritingUrl->GetIdRoute($Route->GetId());
    }
    // Sinon on récupère la route grâce à l'url rewritté
    else {
	// Via cette url on récupère l'objet route correspondant
	$Route = new RouteUrl($Connexion, $Session->read('lang'));
	$Route->GetByControllerAction($url['controller'], $url['action']);
    }
    if($Route->GetId() == 0){
	// TODO: 404 redirect
	die('Fausse route');
    }
    // On include la classe correspondant à la page souhaité
    include __controller_directory__ . '/' . $Route->GetController() . 'Controller.php';
    
    // On instancie le controller et on exécute la fonction relative à l'action demandée
    $controllerClass = $Route->GetController() . 'Controller';
    $actionName = $Route->GetAction();
    $Action = new $controllerClass($Connexion, $Session->read('lang'));
    
    $ViewHelper->ViewCompact($Action->$actionName());