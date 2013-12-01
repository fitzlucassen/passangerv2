<?php

/*
  Class : RouteUrl
  Déscription : Permet de gérer les url brutes du sites
 */

class RouteUrlRepository {

    private $_pdo = null;
    private $_pdoHelper = null;
    private $_lang = null;

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

    public function getByRouteName($route) {
	$request = "SELECT *
			FROM routeurl
			WHERE name='" . htmlspecialchars($route) . "'";
	try {
	    $resultat = $this->_pdoHelper->Select($request);

	    $RouteUrl = new RouteUrl($resultat["id"], $resultat["name"], $resultat["controller"], $resultat["action"], $resultat["order"]);

	    return $RouteUrl;
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function getByControllerAction($controller, $action) {
	$request = "SELECT *
			FROM routeurl
			WHERE controller='" . htmlspecialchars($controller) . "' AND action='" . htmlspecialchars($action) . "'";
	try {
	    $resultat = $this->_pdoHelper->Select($request);

	    $RouteUrl = new RouteUrl($resultat["id"], $resultat["name"], $resultat["controller"], $resultat["action"], $resultat["order"]);

	    return $RouteUrl;
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function getById($id) {
	$request = "SELECT *
			FROM routeurl
			WHERE id=" . intval($id);
	try {
	    $resultat = $this->_pdoHelper->Select($request);

	    $RouteUrl = new RouteUrl($resultat["id"], $resultat["name"], $resultat["controller"], $resultat["action"], $resultat["order"]);

	    return $RouteUrl;
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public static function getAll($Connexion) {
	$request = "SELECT *
			FROM routeurl";
	try {
	    return $Connexion->SelectTable($request);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function delete($id) {
	$query = "DELETE FROM routeurl WHERE id=" . $id;
	try {
	    return $this->_pdo->Query($query);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function add($properties) {
	$query = "INSERT INTO routeurl('id', 'name', 'controller', 'action', 'order')
				VALUES(" . $properties["id"] . ", '" . $properties["name"] . "', '" . $properties["controller"] . "', '" . $properties["action"] . "', " . $properties["order"] . ")";
	try {
	    return $this->_pdo->Query($query);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    public function update($id, $properties) {
	$query = "UPDATE routeurl 
				SET id = " . $properties["id"] . ", name = '" . $properties["name"] . "', controller = '" . $properties["controller"] . "', action = '" . $properties["action"] . "', order = " . $properties["order"] . "
				WHERE id=" . $id;
	try {
	    return $this->_pdo->Query($query);
	} catch (PDOException $e) {
	    print $e->getMessage();
	}
	return array();
    }

    /*     * *****
     * END *
     * ***** */
}