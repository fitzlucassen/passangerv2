<?php
    /*
      Class : Model
      Déscription : Model de donnée pour les pages du site
     */
    class Model {
	public $_headerInformations = array();
	
	public function __construct($pdo, $lang) {
	    $Header = HeaderRepository::getInstance($pdo, $lang);
	    $this->_headerInformations = $Header->getAll();
	}
    }
