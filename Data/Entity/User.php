<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Entity;

	use fitzlucassen\FLFramework\Library\Core as cores;

	class User {
		private $_id;
		private $_login;
		private $_password;
		private $_email;
		private $_role;
		private $_queryBuilder;

		public function __construct($id = "", $login = "", $password = "", $email = "", $role = ""){
			$this->_queryBuilder = new cores\QueryBuilder(true);
			$this->fillObject(array("id" => $id, "login" => $login, "password" => $password, "email" => $email, "role" => $role));
		}

		/***********
		 * GETTERS *
		 ***********/
		public function getId() {
			return $this->_id;
		}
		public function getLogin() {
			return $this->_login;
		}
		public function getPassword() {
			return $this->_password;
		}
		public function getEmail() {
			return $this->_email;
		}
		public function getRole() {
			return $this->_role;
		}
		/*******
		 * END *
		 *******/

		public function fillObject($properties) {
			if(!empty($properties["id"]))
				$this->_id = $properties["id"];
			if(!empty($properties["login"]))
				$this->_login = $properties["login"];
			if(!empty($properties["password"]))
				$this->_password = $properties["password"];
			if(!empty($properties["email"]))
				$this->_email = $properties["email"];
			if(!empty($properties["role"]))
				$this->_role = $properties["role"];
		}
	}
