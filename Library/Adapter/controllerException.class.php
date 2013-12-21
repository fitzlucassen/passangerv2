<?php
    /*
      Class : ControllerException
      Déscription : Permet de gérer les exceptions
     */

    class ControllerException extends Exception{
	private $_typeError = "";
	const NOT_FOUND = "not found";
	const INSTANCE_FAIL = "instance fail";
	
	 /*
	  Constructeur
	 */
	public function __construct($type) {
	    parent::__construct();
	    $this->_typeError = $type;
	}
	
	public static function getNOT_FOUND() {
	    return self::NOT_FOUND;
	}

	public static function getINSTANCE_FAIL() {
	    return self::INSTANCE_FAIL;
	}
	
	public function getType(){
	    return $this->_typeError;
	}
    }