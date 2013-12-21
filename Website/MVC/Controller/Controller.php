<?php
     /*
	Class : Controller
	Déscription : Permet de gérer la classe mère de tous les controllers
     */
    class Controller {
	protected $_pdo = null;
	protected $_lang = null;
	protected $_controller = "";
	protected $_action = "";
	protected $_view = null;
	
	public function __construct($pdo, $lang, $controller, $action) {
	    include(__model_directory__ . "/Model.php");
	    include(__helper_directory__ . "/view.class.php");
	   
	    $this->_lang = $lang;
	    $this->_pdo = $pdo;
	    $this->_controller = $controller;
	    $this->_action = $action;
	    $this->_view = new View($pdo, $lang);
	}
    }