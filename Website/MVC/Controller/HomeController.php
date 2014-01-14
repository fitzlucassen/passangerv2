<?php
     /*
	Class : HomeController
	Déscription : Permet de gérer les actions en relation avec le groupe de page Home
     */
    class HomeController extends Controller {
	public function __construct($pdo, $lang, $action) {
	    parent::__construct($pdo, $lang, "home", $action);
	    include(__model_directory__ . "/HomeModel.php");
	}
	
	public function Index(){
	    // Une action commencera toujours par l'initilisation de son modèle
	    // Cette initialisation doit obligatoirement contenir la connexion PDO et la langue.
	    $Model = new HomeModel($this->_pdo, $this->_lang);
	    
	    // Une action finira toujours par un $this->_view->ViewCompact contenant : 
	    // - La clef "Model" contenant le modèle de données à fournir à la vue
	    $this->_view->ViewCompact($this->_controller, $this->_action, array('Model' => $Model));
	}
	
	public function Error404(){
	    $Model = new HomeModel($this->_pdo, $this->_lang);
	    $this->_view->ViewCompact($this->_controller, $this->_action, array('Model' => $Model));
	}
	
	public function Menu(){
	    $Session = new Session("");
	    $LinkRepository = new LinkRepository($this->_pdo, $this->_lang);
	    
	    $menu = $LinkRepository->getAllByLang($Session->read('lang'));
	    header('Content-type: application/json');
	    echo json_encode($menu);
	}
    }