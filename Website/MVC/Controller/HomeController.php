<?php
     /*
	Class : HomeController
	Déscription : Permet de gérer les actions en relation avec le groupe de page Home
     */
    class HomeController extends Controller {
	public function __construct($pdo, $lang, $action) {
	    parent::__construct($pdo, $lang, "Home", $action);
	    include(__model_directory__ . "/HomeModel.php");
	}
	
	public function Index(){
	    // Une action commencera toujours par l'initilisation de son modèle
	    // Cette initialisation doit obligatoirement contenir la connexion PDO et la langue.
	    // Les autres paramètre sont facultatif
	    // title de la page / liste de nom de fichier css / liste de nom de fichier JS / html personnaliser pour la balise <head>
	    $Model = new HomeModel($this->_pdo, $this->_lang, "Passanger - LE groupe de progressif heavy métal français !", array("home"));
	    
	    // Une action finira toujours par un return d'un array avec : 
	    // - la clef "View" contenant le chemin de la vue cible
	    // - La clef "Model" contenant le modèle de données à fournir à la vue
	    return array('View' => __view_directory__ . "/" . $Model->_controller . "/" . $Model->_action . ".php", 'Model' => $Model);
	}
	
	public function Error404(){
	    $Model = new HomeModel($this->_pdo, $this->_lang, "404 - Cette page n'existe pas ou plus...", array("home"));
	    return array('View' => __view_directory__ . "/" . $Model->_controller . "/" . $Model->_action . ".php", 'Model' => $Model);
	}
    }