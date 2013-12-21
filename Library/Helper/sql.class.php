<?php
    /*
      Class : SQL
      Déscription : Permet de gérer les données en base
     */
    class Sql extends Helper {
	private $_db = 'passangerv2';			// base de données 
	private $_host = 'localhost';			// adresse de la base 
	private $_user = 'root';			// nom 
	private $_pwd = '';				// mot de passe 
	private $_con = '';				// connexion PDO
	private $_email = 'contact@passanger.fr';	// email de l'admin du site 
	
	/*
	 * Constructeur
	 */
	public function __construct($controller = null) {
	    try  
	    { 
		$this->SetController($controller);
		$this->_con = new PDO($this->GetDns(), $this->_user, $this->_pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

		// pour mysql on active le cache de requête 
		if($this->_con->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') 
		    $this->_con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); 
	    } 
	    catch(PDOException $e) { 
		//On indique par email qu'on n'a plus de connection disponible 
		throw new ConnexionException();
	    } 
	}
	
	/**
	 * GetDns -> On récupète l'host ici
	 * @return type
	 */
	public function GetDns() { 
	    return 'mysql:host=' . $this->_host . ';dbname=' . $this->_db; 
	}
	
	/**
	 * Select -> Pour un select simple (un seul résultat)
	 * @param type $reqSelect
	 * @return type
	 */
	public function Select($reqSelect) { 
	    try 
	    { 
		$this->_con->beginTransaction();
		$result = $this->_con->prepare($reqSelect); 
		$result->execute(); 
		$this->_con->commit();
		
		return $result->fetch(PDO::FETCH_ASSOC); 
	    } 
	    catch (Exception $e)  
	    { 
		//On indique par email que la requête n'a pas fonctionné. 
		error_log(date('D/m/y').' à '.date("H:i:s").' : '.$e->getMessage(), 1, $this->_email); 
		$this->_con->rollBack(); 
		$message = new Message(); 
		$message->outPut('Erreur dans la requêtte', 'Votre requête a été abandonné'); 
	    } 
	}
	
	/**
	 * SelectTable -> Pour un select multiple (plusieurs résultat)
	 * @param type $reqSelect
	 * @return type
	 */
	public function SelectTable($reqSelect) {
	    $this->_con->beginTransaction();
	    $result = $this->_con->prepare($reqSelect); 
	    $result->execute();
	    $this->_con->commit();
	    
	    /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */ 
	    $resultat = $result->fetchAll(); 
	    return $resultat; 
	} 
	
	/*
	 * Gestion des erreurs
	 */
	public static function Exception_handler($exception) {
            // Output the exception details
            die('Uncaught exception: ' . $exception->getMessage());
        }
	
	/***********
	 * GETTERS *
	 ***********/
	public function GetConnection() {
	    return $this->_con;
	}
    }
