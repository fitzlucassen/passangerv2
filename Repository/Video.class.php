<?php
    /*
      Class : Video
      Déscription : Permet de gérer les vidéos du site
     */
    class Video {
	private $_pdo = null;
	private $_pdoHelper = null;
	private $_lang = null;
	private $_id = "";
	private $_url = "";
	private $_title = "";
	private $_description = "";
	private $_thumb = "";

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

	/**
	 * GetAll
	 * Permet de récupérer toutes les vidéos
	 * @return array $result ( assoc )
	 */
	public static function GetAll() {
	    $request = "SELECT *
			    FROM video
			    WHERE lang='" . $this->_lang . "'";

	    try {
		$result = $this->_pdoHelper->SelectTable($request);
		
		return $result;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	/**
	 * GetById
	 * Permet de récupérer une vidéo via son id
	 * @param int $id
	 * @return object $result
	 */
	public function GetById($id){
	    $request = "SELECT *
			    FROM video
			    WHERE lang='".$this->lang."'
			    AND id=".$id;

	    try {
		$result = $this->_pdoHelper->Select($request);
		
		$this->FillObject($result);
		
		return $result;
	    } catch (PDOException $e) {
		print $e->getMessage();
	    }
	    return array();
	}
	
	/**
	 * FillObject
	 * Remplit un objet de type Video
	 * @param array $result
	 */
	private function FillObject($result){
	    $this->_title = $result["title"];
	    $this->_description = $result["description"];
	    $this->_url = $result["url"];
	    $this->_thumb = $result["thumb"];
	    $this->_id = $result["id"];
	}
    }