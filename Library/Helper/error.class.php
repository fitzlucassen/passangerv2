<?php

    /*
      Class : Error
      Déscription : Permet de gérer les erreurs
     */
    class Error extends Helper {
	/*
	  Constructeur
	 */
	public function __construct($controller) {
	    parent::__construct($controller);
	}
	
	public function noConnexionAvailable(){
	    header('location: /Error/noConnexionAvailable');
	}
	
	public function noModelProvided($controller, $action){
	    header('location: /Error/noModelProvided/' . $controller . '/' . $action);
	}
	
	public function controllerClassDoesntExist($controller){
	    header('location: /Error/controllerClassDoesntExist/' . $controller);
	}
	
	public function controllerInstanceFailed($controller){
	    header('location: /Error/controllerInstanceFailed/' . $controller);
	}
    }