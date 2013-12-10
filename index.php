<?php
    // On inclue le fichier d'initialisation
    require_once 'bootstrap.php';

    // On tente de récupérer l'objet urlrewritting grâce à l'url
    $RewritingUrlRepository = new RewrittingUrlRepository($Connexion, $Session->read('lang'));
    $url = $RewritingUrlRepository->getByUrlMatched($page);
    
    // S'il n'y a aucune route en base matchant cette url, ou que l'url est '/'
    if(!isset($url['controller']) || empty($url['controller']) || ($url["debug"] == "default" && $page == '/')){
	// On récupère la route de la homepage et on en déduit l'objet rewritting
	$RouteUrlRepository = new RouteUrlRepository($Connexion, $Session->read('lang'));
	$RouteUrl = $RouteUrlRepository->getByRouteName('Home');
	$RewrittingUrl = $RewritingUrlRepository->getByIdRoute($RouteUrl->getId());

	// Puis on redirige
	header('location:' . $RewrittingUrl->getUrlMatched());
    }
    // Sinon on récupère la route grâce à l'url rewritté
    else {
	
	// Via cette url on récupère l'objet route correspondant
	$RouteUrlRepository = new RouteUrlRepository($Connexion, $Session->read('lang'));
	$RouteUrl = $RouteUrlRepository->getByControllerAction($url['controller'], $url['action']);
    }
    // Si l'url n'existe pas on redirige vers la page 404
    if($RouteUrl->getId() == 0 || ($url["debug"] == "default" && $page != '/')){
	$RouteUrl = $RouteUrlRepository->getByRouteName('Error404');
	$RewrittingUrl = $RewritingUrlRepository->getByIdRoute($RouteUrl->getId());
	header('location:' . Router::ReplacePattern($RewrittingUrl->getUrlMatched(), $page));
    }
    
    $controllerName = $RouteUrl->getController() . 'Controller';
    // On include la classe controller correspondant à la page souhaité
    include __controller_directory__ . '/' . $controllerName . '.php';
    
    // On instancie le controller et on exécute la fonction relative à l'action demandée
    $controllerClass = $controllerName;
    $actionName = $RouteUrl->getAction();
    $Action = new $controllerClass($Connexion, $Session->read('lang'), $actionName);
    
    // On exécute l'action cible du controller et on affiche la vue avec le modèle renvoyé
    $ViewHelper->ViewCompact($RouteUrl->getController(), $actionName, $Action->$actionName());