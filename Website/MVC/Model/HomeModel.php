<?php
     /*
      Class : HomeModel
      Déscription : Model de donnée pour les pages du controller home
     */
    class HomeModel extends Model{
	public function __construct($pdo, $lang, $title = "", $css = array(), $js = array(), $html = "") {
	    parent::__construct($pdo, $lang, $title, $css, $js, $html);
	}
    }
