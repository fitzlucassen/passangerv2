<?php 
	/**********************************************************
	 **** File generated by fitzlucassen\DALGenerator tool ****
	 * All right reserved to fitzlucassen repository on github*
	 ************* https://github.com/fitzlucassen ************
	 **********************************************************/
	class HistoryRepository {
		private $_pdo;
		private $_lang;
		private $_pdoHelper;

		public function __construct($pdo, $lang){
			$this->_pdoHelper = $pdo;
			$this->_pdo = $pdo->GetConnection();
			$this->_lang = $lang;
		}

		/**************************
		 * REPOSITORIES FUNCTIONS *
		 **************************/
		public function getAll(){
			$query = "SELECT * FROM history";
			try {
				return $this->_pdo->SelectTable($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function getById($id){
			$query = "SELECT * FROM history WHERE id=" . $id;
			try {
				$properties = $this->_pdo->Select($query);
				$object = new History();
				$object->fillObject($properties);
				return $object;
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function delete($id) {
			$query = "DELETE FROM history WHERE id=" . $id;
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function add($properties) {
			$query = "INSERT INTO history('id', 'title', 'description', 'lang')
				VALUES(" . $properties["id"] . ", '" . $properties["title"] . "', '" . $properties["description"] . "', '" . $properties["lang"] . "')";
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}

		public function update($id, $properties) {
			$query = "UPDATE history 
				SET id = " . $properties["id"] . ", title = '" . $properties["title"] . "', description = '" . $properties["description"] . "', lang = '" . $properties["lang"] . "'
				WHERE id=" . $id;
			try {
				return $this->_pdo->Query($query);
			}
			catch(PDOException $e){
				print $e->getMessage();
			}
			return array();
		}
		/*******
		 * END *
		 *******/

	}
?>