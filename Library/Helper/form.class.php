<?php
    class Form extends Helper{
	
	public function __construct($controller, $params = null) {
	    parent::__construct($controller, $params);
	}
	
	/**
	 * IsPost
	 * @return boolean
	 */
	public function IsPost(){
	    return isset($_POST) && !empty($_POST);
	}
	
	/**
	 * IsGet
	 * @return boolean
	 */
	public function IsGet(){
	    return isset($_GET) && !empty($_GET);
	}
	
	/**
	 * CleanPost
	 * @return array
	 */
	public function CleanPost(){
	    $params = array();
	    $vars = $this->IsPost() ? $_POST : $_GET;
	    
	    foreach($vars as $key => $value){
		if(gettype($value) == "string"){
		    $params[$key] = htmlspecialchars($value);
		}
		else if(in_array(gettype($value), array('integer', 'double'))){
		    $params[$key] = intval($value);
		}
	    }
	    
	    return $params;
	}
	
	/**
	 * CreateForm -> créée un formulaire complet contenant les champs passés en paramètres
	 * @param type $fields -> sous la forme : array('name' => array('wording', 'type', 'class', 'value', 'placeholder', 'rows', 'cols', 'options')) (tous les paramètres ne sont pas obligatoire)
	 * @param type $withLabel -> si on veut afficher les labels à côté des champs ou pas
	 * @param type $withBr -> si on doit sauter une ligne entre chaque champ
	 * @param type $action -> l'action vers laquelle rediriger lors de la validation du formulaire
	 * @param type $method -> la méthode par laquelle passer les paramètres
	 * @param type $enctype -> l'encodage pour les médias
	 * @return string -> le formulaire
	 */
	/*
	 * EXEMPLE :
	 * echo $FormHelper->CreateForm(array( 'name' => array('wording' => 'Nom', 'type' => 'varchar', 'options' => 'required', 'placeholder' => 'votre nom'),
					    'surname' => array('wording' => 'Prénom', 'type' => 'varchar', 'options' => 'required', 'placeholder' => 'votre prénom'),
					    'email' => array('wording' => 'E-mail', 'type' => 'email', 'options' => 'required', 'placeholder' => 'votre e-mail'),
					    'message' => array('wording' => 'Message', 'type' => 'text', 'options' => 'required', 'placeholder' => 'votre message', 'rows' => 10, 'cols' => 10)), true)
	 */
	public function CreateForm($fields, $withLabel = true, $withBr = true, $action = "", $method = "post", $enctype = "multipart/form-data"){
	    $form = "";
	    $form .= '<form action="' . $action . '" method="' . $method . '" enctype="' . $enctype . '">';
	    
	    foreach($fields as $key => $value){
		if($withLabel){
		    $form .= '<label class="label" for="' . $key . 'Field">' . $value['wording'] . '</label>';
		}
		
		if(!isset($value['value'])){
		    $value['value'] = "";
		}
		if(!isset($value['class'])){
		    $value['class'] = "";
		}
		
		if(in_array($value['type'], array('varchar', 'number'))){
		    $form .= '<input type="text" value="' . $value['value'] . '" name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . ' placeholder="' . $value['placeholder'] . '" />';
		}
		else if($value['type'] == 'text'){
		    $form .= '<textarea rows="' . $value['rows'] . '" cols="' . $value['cols'] . '" name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . ' placeholder="' . $value['placeholder'] . '">' . $value['value'] . '</textarea>';
		}
		else if($value['type'] == 'multivalue'){
		    $form .= '<select name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . '>';
		    
		    foreach($value as $thisValueKey => $thisValueValue){
			$form .= '<option value="' . $thisValueValue . '">' . $thisValueKey . '</option>';
		    }
		    
		    $form .= '</select>';
		}
		else if($value['type'] == 'password'){
		    $form .= '<input type="password" value="' . $value['value'] . '" name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . ' placeholder="' . $value['placeholder'] . '" />';
		}
		else if($value['type'] == 'image'){
		    $form .= '<input type="file" value="' . $value['value'] . '" name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . ' placeholder="' . $value['placeholder'] . '" />';
		}
		else {
		    $form .= '<input type="' . $value['type'] . '" value="' . $value['value'] . '" name="' . $key . '" class="' . $value['class'] . '" id="' . $key . 'Field" ' . $value['options'] . ' placeholder="' . $value['placeholder'] . '" />';
		}
		
		if($withBr){
		    $form .= '<br/>';
		}
	    }
	    
	    $form .= '<input type="submit" name="submitBtn" class="submitBtn" />';
	    
	    $form .= '</form>';
	    return $form;
	}
    }