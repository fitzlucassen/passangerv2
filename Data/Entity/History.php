<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	namespace fitzlucassen\FLFramework\Data\Entity;

	use fitzlucassen\FLFramework\Library\Core as cores;

	class History {
		private $_id;
		private $_title;
		private $_description;
		private $_lang;
		private $_queryBuilder;

		public function __construct($id = "", $title = "", $description = "", $lang = ""){
			$this->_queryBuilder = new cores\QueryBuilder(true);
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
			if(!empty($properties["id"]))
				$this->_id = $properties["id"];
			if(!empty($properties["title"]))
				$this->_title = $properties["title"];
			if(!empty($properties["description"]))
				$this->_description = $properties["description"];
			if(!empty($properties["lang"]))
				$this->_lang = $properties["lang"];
		}
	}
