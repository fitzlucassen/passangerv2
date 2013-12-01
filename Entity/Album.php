<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	class Album {
		private $_id;
		private $_title;
		private $_description;
		private $_date;
		private $_thumb;
		private $_lang;

		public function __construct($id, $title, $description, $date, $thumb, $lang){
			$this->fillObject(array("id" => $id, "title" => $title, "description" => $description, "date" => $date, "thumb" => $thumb, "lang" => $lang));
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
		public function getDate() {
			return $this->_date;
		}
		public function getThumb() {
			return $this->_thumb;
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
			$this->_date = $properties["date"];
			$this->_thumb = $properties["thumb"];
			$this->_lang = $properties["lang"];
		}
	}
?>