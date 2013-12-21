<?php
     /*
	Class : EntrepriseController
	Déscription : Permet de gérer les actions en relation avec une entreprise
     */
    class EntrepriseController extends Controller {
	public function __construct($pdo, $lang, $action) {
	    parent::__construct($pdo, $lang, "entreprise", $action);
	    include(__model_directory__ . "/EntrepriseModel.php");
	}
	
	public function Profile($params){
	    $Model = new EntrepriseModel($this->_pdo, $this->_lang, $params);
	    
	    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
	    // - La clef "Model" contenant le modèle de données à fournir à la vue
	    $this->_view->ViewCompact($this->_controller, $this->_action, array('Model' => $Model));
	}
    }