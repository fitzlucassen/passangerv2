<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	class History {
		private $_id;
		private $_title;
		private $_description;
		private $_lang;

		public function __construct($id, $title, $description, $lang){
			$this->fillObject(array("id" => $id, "title" => $title, "description" => $description, "lang" => $lang));
		}

		/***********
		 * GETTERS *
		 ***********/
		public function getId() {
			return $this->_id;
		}
		public function getTitle() {
			return $this->_title;
		}
		public function getDescription() {
			return $this->_description;
		}
		public function getLang() {
			return $this->_lang;
		}
		/*******
		 * END *
		 *******/

		public function fillObject($properties) {
			$this->_id = $properties["id"];
			$this->_title = $properties["title"];
			$this->_description = $properties["description"];
			$this->_lang = $properties["lang"];
		}
	}
?>