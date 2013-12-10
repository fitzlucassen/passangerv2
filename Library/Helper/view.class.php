<?php
    /*
      Class : View
      Déscription : Permet de gérer les vues
     */
    class View extends Helper {
	/*
	  Constructeur
	 */
	public function __construct($controller) {
	    parent::__construct($controller);
	}
	
	/**
	 * View -> appelle une vue le plus simplement possible
	 * @param type $view
	 * @param type $model
	 */
	public function View($view, $model = array()){
	    $Model = $model;
	    include $view;
	}
	/**
	 * ViewCompact -> la méthode complète d'appel à une vue
	 * @param type $controller
	 * @param type $action
	 * @param type $compact
	 */
	public function ViewCompact($controller, $action, $compact){
	    $Model = $compact['Model'];
	    $Model->_controller = $controller;
	    $Model->_action = $action;
	    
	    $Model->_extraParams = $this->GetMoreHeadCssAndJs($Model);
	    
	    //include $compact['View'];
	    include(__view_directory__ . "/layout.php");
	}
	
	/**
	 * GetMoreHeadCssAndJs -> Met en forme les fichier CSS et les fichier JS à inclure par page en + du template
	 * @param type $Model
	 * @return type
	 */
	private function GetMoreHeadCssAndJs($Model){
	    $title = $Model->_title;
	    $html = $Model->_html;
	    $css = "";
	    $js = "";
	    foreach($Model->_css as $thisCss){
		$css .= '<link type="text/css" rel="stylesheet" href="' . __css_directory__ . '/' . $thisCss . '.css" />';
	    }
	    foreach($Model->_js as $thisJs){
		$js .= '<script type="text/javascript" src="' . __js_directory__ . '/' . $thisJs . '.js" />';
	    }
	    
	    return array('title' => $title, 'css' => $css, 'js' => $js, 'html' => $html);
	}
    }