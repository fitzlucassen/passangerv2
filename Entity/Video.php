<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	class Video {
		private $_id;
		private $_url;
		private $_title;
		private $_description;
		private $_thumb;
		private $_lang;

		public function __construct($id, $url, $title, $description, $thumb, $lang){
			$this->fillObject(array("id" => $id, "url" => $url, "title" => $title, "description" => $description, "thumb" => $thumb, "lang" => $lang));
		}

		/***********
		 * GETTERS *
		 ***********/
		public function getId() {
			return $this->_id;
		}
		public function getUrl() {
			return $this->_url;
		}
		public function getTitle() {
			return $this->_title;
		}
		public function getDescription() {
			return $this->_description;
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
			$this->_url = $properties["url"];
			$this->_title = $properties["title"];
			$this->_description = $properties["description"];
			$this->_thumb = $properties["thumb"];
			$this->_lang = $properties["lang"];
		}
	}
?>