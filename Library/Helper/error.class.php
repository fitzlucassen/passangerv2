<?php

    /*
      Class : Error
      Déscription : Permet de gérer les erreurs
     */
    class Error extends Helper {
	private $_layout = "";
	/*
	  Constructeur
	 */
	public function __construct($controller) {
	    parent::__construct($controller);
	    $this->_layout = "<html><head><title>ERROR</title><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" ></head><body>";
	}
	
	public function noConnexionAvailable(){
	    $string = $this->_layout . "<div class=\"error\">";
	    $string .= "<p>Il semble y avoir un problème au niveau de la connexion MySQL. Cela peut-être dû à plusieurs choses :</p>";
	    $string .= "<ul><li>Vous n'avez pas créez de base de données sur votre serveur.</li>";
	    $string .= "<li>Vous avez mal renseigné les configurations liées à la base de données dans le fichier Library/Helper/sql.class.php</li>";
	    $string .= "<li>Vous n'avez aucun serveur PHP/MySQL de lancer (lancer WAMP ou XAMP en local)</li></ul></div></body>";
	    return $string;
	}
	
	public function noModelProvided($controller, $action){
	    $string = $this->_layout . "<div class=\"error\">";
	    $string .= "<p>Visiblement, vous n'avez pas fourni de modèle à une vue qui en nécessite un.</p>";
	    $string .= "<ul><li>Vérifier que la fonction <b>" . $action . "</b> du contrôleur <b>" . $controller . "</b>, se termine bien par : <i>";
	    $string .= '$this->_view->ViewCompact($this->_controller, $this->_action, array("Model" => $Model)' . "</i></li>";
	    $string .= "<li>De même, vérifiez que l'objet que vous passé en paramètre comme modèle hérite bien de la classe <i>Website/MVC/Model/Model.php</i></li>";
	    $string .= "</div></body>";
	    return $string;
	}
	
	public function controllerClassDoesntExist($controller){
	    $string = $this->_layout . "<div class=\"error\">";
	    $string .= "<p>Visiblement, le contrôleur que vous essayer d'inclure n'existe pas</p>";
	    $string .= "<ul><li>Vérifier que le fichier <b>" . $controller . "</b> existe bien dans le dossier <i>Website/MVC/Controller</i></li></ul>";
	    $string .= "</div></body>";
	    return $string;
	}
	
	public function controllerInstanceFailed($controller){
	    $string = $this->_layout . "<div class=\"error\">";
	    $string .= "<p>Le fichier <b>" . $controller . "</b> a bien été inclue. Cependant, la classe qui y réside n'existe pas</p>";
	    $string .= "<ul><li>Vérifier que dans le fichier <b>" . $controller . "</b> il existe bien une classe du même nom.</li></ul>";
	    $string .= "</div></body>";
	    return $string;
	}
    }