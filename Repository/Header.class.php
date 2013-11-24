<?php
    /*
      Class : Header
      Déscription : Permet de gérer les données du site
     */
    class Header {
	private static $_instance = 0;
	private $_pdo = null;
	private $_pdoHelper = null;
	private $_lang = null;
	private $_title = "";
	private $_metaDescription = "";
	private $_metaKeywords = "";

	/**
	 * Constructor 
	 * @param $pdo 
	 * @param $lang
	 */
	private function __construct($pdo, $lang) {
	    /** Set les données de connexion * */
	    $this->_pdo = $pdo->GetConnection();
	    $this->_pdoHelper = $pdo;
	    $this->_lang = $lang;
	}
	public static function GetInstance($pdo, $lang){
	    if(Header::$_instance == 0) {
		Header::$_instance++;
		return new Header($pdo, $lang);
	    }
	    else
		return false;
	}

	/**
	 * GetAllInformations
	 * Permet de récupérer toutes les information du header
	 * @return array $result ( assoc )
	 */
	public function GetAllInformations() {
	    $request = "SELECT *
			    FROM header
			    WHERE lang='" . $this->_lang . "'";

	    try {
		$result = $this->_pdoHelper->Select($request);
		
		$this->_title = $result["title"];
		$this->_metaDescription = $result["metaDescription"];
		$this->_metaKeywords = $result["metaKeywords"];
		
		return $result;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	public function UpdateInformations($params = array()) {
	    if(array_key_exists("title", $params) && array_key_exists("metaDescription", $params) && array_key_exists("metaKeywords", $params)){
		$request = "UPDATE header
			    SET title='" . htmlspecialchars($params['title']) . "',
				metaDescription='" . htmlspecialchars($params['metaDescription']) . "',
				metaKeywords='" . htmlspecialchars($params['metaKeywords']) . "'
			    WHERE id = 1";
		$this->_pdo->execute($request);
		
		return true;
	    }
	    else
		return false;
	}
    }