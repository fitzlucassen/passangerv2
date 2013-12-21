<?php
    // On inclue le fichier d'initialisation
    require_once 'bootstrap.php';
    
    // On crée la class principale APP.
    $App = new App($Connexion, $Session->read('lang'), $page);
    
    // On initialise le routing de base
    $result = $App->ManageRouting();
    
    // On redirige si page par défaut
    if(!$result){
	header('location:' . $App->getRewrittingUrl()->getUrlMatched());
    }
    // On vérifie que la page existe
    $App->Manage404Route();
    // On créée le controller recherché
    $App->ManageController();
    
    try {
	// On vérifie que le fichier de la classe de ce controller existe bien
	$controllerFile = __controller_directory__ . '/' . $App->getControllerName() . '.php';
	if(!file_exists($controllerFile))
	    throw new ControllerException(ControllerException::NOT_FOUND);
	
	// On include le fichier de cette classe controller correspondant à la page souhaitée
	include __controller_directory__ . '/' . $App->getControllerName() . '.php';

	// On vérifie que la classe existe bien
	if(!class_exists($App->getControllerName()))
	    throw new ControllerException(ControllerException::INSTANCE_FAIL);
    }
    catch(ControllerException $e){
	// On gère les erreur de façon personnalisée
	if($e->getType() == ControllerException::INSTANCE_FAIL){
	    echo $ErrorManager->controllerInstanceFailed($App->getControllerName());
	    die();
	}
	else{
	    echo $ErrorManager->controllerClassDoesntExist($App->getControllerName());
	    die();
	}
    }
    
    // On instancie le controller cible et on créée l'action
    $App->ManageAction();
    
    // On exécute l'action cible du controller et on affiche la vue avec le modèle renvoyé
    try{
	$App->ExecuteAction();
    }
    catch(ViewException $e){
	echo $ErrorManager->noModelProvided($App->getControllerName(), $App->getActionName());
	die();
    }