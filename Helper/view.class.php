<?php
    /*
      Class : View
      Déscription : Permet de gérer les données en base
     */
    class View extends Helper {
	/*
	  Constructeur
	 */
	public function __construct($controller) {
	    parent::__construct($controller);
	}
	
	public function View($view, $model = array()){
	    $Model = $model;
	    include $view;
	}
	public function ViewCompact($compact){
	    $Model = $compact['Model'];
	    include $compact['View'];
	}
    }