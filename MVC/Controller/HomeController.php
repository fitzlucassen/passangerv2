<?php
     /*
      Class : HomeController
      Déscription : Permet de gérer les actions en relation avec le groupe de page Home
     */
    class HomeController extends Controller {
	public function __construct($pdo, $lang) {
	    parent::__construct($pdo, $lang, "Home");
	    include(__model_directory__ . "/HomeModel.php");
	}
	
	public function Index(){
	    $Model = new HomeModel($this->_pdo, $this->_lang);
	    
	    return array('View' => __view_directory__ . "/Home/index.php", 'Model' => $Model);
	}
    }