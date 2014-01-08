<?php
    /*
	Class : Model
	Déscription : Model de donnée pour les pages du site
     */
    class Model {
	public $_headerInformations = null;
	public $_controller = "home";
	public $_action = "index";
	public $_head = "";
	public $_content = "";
	public $_params = array();
	
	public function __construct($pdo, $lang, $params = array()) {
	    // Les configuration de base générale pour le site en BDD
	    if(class_exists("HeaderRepository")){
		$Header = HeaderRepository::getInstance($pdo, $lang);
		$this->_headerInformations = $Header->getAll();
	    }
	    $this->_params = $params;
	}
    }
