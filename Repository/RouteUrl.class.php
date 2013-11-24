<?php
    /*
      Class : RouteUrl
      Déscription : Permet de gérer les url brutes du sites
     */
    class RouteUrl {
	private $_pdo = null;
	private $_pdoHelper = null;
	private $_lang = null;
	private $_id = 0;
	private $_name = "";
	private $_controller = "";
	private $_action = "";
	private $_order = 0;

	/**
	 * Constructor 
	 * @param $pdo 
	 * @param $lang
	 */
	public function __construct($pdo, $lang) {
	    /** Set les données de connexion * */
	    $this->_pdo = $pdo->GetConnection();
	    $this->_pdoHelper = $pdo;
	    $this->_lang = $lang;
	}
	
	public function GetByRouteName($route){
	    $request = "SELECT *
			FROM routeurl
			WHERE name='" . htmlspecialchars($route) . "'";
	    try {
		$resultat = $this->_pdoHelper->Select($request);
		
		$this->_id = $resultat["id"];
		$this->_name = $resultat["name"];
		$this->_controller = $resultat["controller"];
		$this->_action = $resultat["action"];
		$this->_order = $resultat["order"];
		
		return $resultat;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	public function GetByControllerAction($controller, $action){
	    $request = "SELECT *
			FROM routeurl
			WHERE controller='" . htmlspecialchars($controller) . "' AND action='" . htmlspecialchars($action) . "'";
	    try {
		$resultat = $this->_pdoHelper->Select($request);
		
		$this->_id = $resultat["id"];
		$this->_name = $resultat["name"];
		$this->_controller = $resultat["controller"];
		$this->_action = $resultat["action"];
		$this->_order = $resultat["order"];
		
		return $resultat;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	public function GetById($id){
	    $request = "SELECT *
			FROM routeurl
			WHERE id=" . intval($id);
	    try {
		$resultat = $this->_pdoHelper->Select($request);

		$this->_id = $resultat["id"];
		$this->_name = $resultat["name"];
		$this->_controller = $resultat["controller"];
		$this->_action = $resultat["action"];
		$this->_order = $resultat["order"];
		
		return $resultat;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	public static function GetAll($Connexion){
	    $request = "SELECT *
			FROM routeurl";
	    try {		
		return $Connexion->SelectTable($request);
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	/*
	 * Getters
	 */
	public function GetId(){
	    return $this->_id;
	}
	public function GetController(){
	    return $this->_controller;
	}
	public function GetAction(){
	    return $this->_action;
	}
    }
?>
