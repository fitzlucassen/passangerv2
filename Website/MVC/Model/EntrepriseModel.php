<?php
     /*
      Class : EntrepriseModel
      Déscription : Model de donnée pour les pages du controller home
     */
    class EntrepriseModel extends Model{
	public function __construct($pdo, $lang, $params = array()) {
	    parent::__construct($pdo, $lang, $params);
	}
    }
