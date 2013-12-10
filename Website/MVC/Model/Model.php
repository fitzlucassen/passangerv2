<?php
    /*
	Class : Model
	Déscription : Model de donnée pour les pages du site
     */
    class Model {
	public $_headerInformations = array();
	public $_controller = "home";
	public $_action = "index";
	public $_title = "";
	public $_js = array();
	public $_css = array();
	public $_html = "";
	public $_extraParams = array();
	
	public function __construct($pdo, $lang, $title = "", $css = array(), $js = array(), $html = "") {
	    $Header = HeaderRepository::getInstance($pdo, $lang);
	    $this->_headerInformations = $Header->getAll();
	    
	    $this->_title = $title;
	    $this->_css = $css;
	    $this->_js = $js;
	    $this->_html = $html;
	}
    }
