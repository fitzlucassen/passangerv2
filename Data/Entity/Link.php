<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	class Link {
		private $_id;
		private $_title;
		private $_href;
		private $_lang;

		public function __construct($id, $title, $href, $lang){
			$this->fillObject(array("id" => $id, "title" => $title, "href" => $href, "lang" => $lang));
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
		public function getHref() {
			return $this->_href;
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
			$this->_href = $properties["href"];
			$this->_lang = $properties["lang"];
		}
	}
?>