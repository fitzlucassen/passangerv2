<?php
     /*
      Class : HomeModel
      Déscription : Model de donnée pour les pages du controller home
     */
    class HomeModel extends Model{
	public function __construct($pdo, $lang) {
	    parent::__construct($pdo, $lang);
	}
    }
