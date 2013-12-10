<?php
    class Auth extends Helper {
	private $_user = null;

	public function __construct($controller, $params = null) {
	    parent::__construct($controller, $params);
	}

	public function __transmit($params) {
	    return array("user" => $this->getUser());
	}

	public function Connect($pseudo, $pwd) {

	}

	public function Disconnect() {
	    $this->_controller->Session->clear("Auth");
	}

	public function GetUser() {

	}

	public function Persist() {
	    // fait une connexion persistant en cookie (cf. tuto grafikart)
	}
    }