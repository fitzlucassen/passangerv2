<?php

/*
  Class : Header
  Déscription : Permet de gérer les données du site
 */

class HeaderRepository {

    private static $_instance = 0;
    private $_pdo = null;
    private $_pdoHelper = null;
    private $_lang = null;

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

    public static function getInstance($pdo, $lang) {
	if (HeaderRepository::$_instance == 0) {
	    HeaderRepository::$_instance++;
	    return new HeaderRepository($pdo, $lang);
	}
	else
	    return false;
    }

    /**
     * GetAll
     * Permet de récupérer toutes les information du header
     * @return array $result ( assoc )
     */
    public function getAll() {
	$request = "SELECT *
			    FROM header
			    WHERE lang='" . $this->_lang . "'";

	try {
	    $result = $this->_pdoHelper->Select($request);

	    $Header = new Header($result["id"], $result["title"], $result["metaDescription"], $result["metaKeywords"], $result["lang"]);

	    return $Header;
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function delete($id) {
	$query = "DELETE FROM header WHERE id=" . $id;
	try {
	    return $this->_pdo->Query($query);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function add($properties) {
	$query = "INSERT INTO header('id', 'title', 'metaDescription', 'metaKeywords', 'lang')
				VALUES(" . $properties["id"] . ", '" . $properties["title"] . "', '" . $properties["metaDescription"] . "', '" . $properties["metaKeywords"] . "', '" . $properties["lang"] . "')";
	try {
	    return $this->_pdo->Query($query);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function update($params = array()) {
	if (array_key_exists("title", $params) && array_key_exists("metaDescription", $params) && array_key_exists("metaKeywords", $params)) {
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