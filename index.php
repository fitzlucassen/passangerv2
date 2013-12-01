<?php
    require_once 'bootstrap.php';

    // On récupère l'url qui correspond
    $RewritingUrlRepository = new RewrittingUrlRepository($Connexion, $Session->read('lang'));

    // S'il n'y a rien en base concernant cette route,
    // On récupère la route de la homepage et on en déduit l'objet rewritting
    $url = $RewritingUrlRepository->getByUrlMatched($page);
    if(!isset($url['controller']) || empty($url['controller'])){
	$RouteUrlRepository = new RouteUrlRepository($Connexion, $Session->read('lang'));
	$RouteUrl = $RouteUrlRepository->getByRouteName('Home');
	$RewrittingUrl = $RewritingUrlRepository->getByIdRoute($RouteUrl->getId());
    }
    // Sinon on récupère la route grâce à l'url rewritté
    else {
	// Via cette url on récupère l'objet route correspondant
	$RouteUrlRepository = new RouteUrlRepository($Connexion, $Session->read('lang'));
	$RouteUrl = $RouteUrlRepository->getByControllerAction($url['controller'], $url['action']);
    }
    if($RouteUrl->getId() == 0){
	// TODO: 404 redirect
	die('Fausse route');
    }
    // On include la classe correspondant à la page souhaité
    include __controller_directory__ . '/' . $RouteUrl->getController() . 'Controller.php';
    
    // On instancie le controller et on exécute la fonction relative à l'action demandée
    $controllerClass = $RouteUrl->getController() . 'Controller';
    $actionName = $RouteUrl->getAction();
    $Action = new $controllerClass($Connexion, $Session->read('lang'));
    
    $ViewHelper->ViewCompact($Action->$actionName());