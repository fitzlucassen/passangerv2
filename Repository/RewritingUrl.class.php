<?php
    /*
      Class : RewrittingUrl
      Déscription : Permet de gérer les url rewrittées du sites
     */
    class RewritingUrl {
	private $_pdo = null;
	private $_pdoHelper = null;
	private $_lang = null;
	private $_id = 0;
	private $_idRoute = null;
	private $_urlMatched = "";

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
	
	public function GetByIdRoute($idRoute){
	    $request = "SELECT *
			FROM rewrittingurl
			WHERE lang='" . $this->_lang . "' AND idRoute=" . intval($idRoute);
	    try {
		$resultat = $this->_pdoHelper->Select($request);
		
		$this->_id = $resultat["id"];
		$this->_idRoute = $resultat["idRoute"];
		$this->_urlMatched = $resultat["urlMatched"];
		
		return $resultat;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	public static function GetByIdRouteStatic($idRoute, $lang, $Connexion){
	    $request = "SELECT *
			FROM rewrittingurl
			WHERE lang='" . $lang . "' AND idRoute=" . intval($idRoute);
	    try {
		return $Connexion->Select($request);
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	public function GetByUrlMatched($url){
	    return Router::GetRoute($url);
	}
	
	/*
	 * Getters
	 */
	public function GetIdRoute(){
	    return $this->_idRoute;
	}
	public function GetUrlMatched(){
	    return $this->_urlMatched;
	}
    }