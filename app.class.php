<?php
    class App {
	private $_routeUrl = null;
	private $_rewrittingUrl = null;
	private $_routeUrlRepository = null;
	private $_rewrittingUrlRepository = null;
	private $_url = "";
	private $_page = "";
	private $_pdo = null;
	private $_lang = "";
	private $_controllerName = "";
	private $_actionName = "";
	private $_controller = null;
	private $_isBrutUrl = false;
	
	public function __construct($pdo, $lang, $page) {
	    $this->_page = $page;
	    $this->_pdo = $pdo;
	    $this->_lang = $lang;
	    
	    $this->_rewrittingUrlRepository = new RewrittingUrlRepository($pdo, $lang);
	    $this->_url = $this->_rewrittingUrlRepository->getByUrlMatched($this->_page);
	}
	
	/**
	 * Manage404Route -> gère le routing vers la page 404 si la page n'existe pas
	 */
	public function Manage404Route(){
	    $wrongRoute = $this->_routeUrl->getId() == 0 || ($this->_url["debug"] == "default" && $this->_page != '/');
	    
	    if($wrongRoute){
		// On vérifie que le fichier de la classe de ce controller existe bien
		$controllerFile = __controller_directory__ . '/' . $this->_url["controller"] . 'Controller.php';
		if(file_exists($controllerFile))
		    include __controller_directory__ . '/' . $this->_url["controller"] . 'Controller.php';
	    
		$actionExist = class_exists($this->_url["controller"] . 'Controller') && method_exists($this->_url["controller"] . 'Controller', $this->_url["action"]);
		$this->_isBrutUrl = $actionExist;
	    }
	    // Si l'url n'existe pas on redirige vers la page 404
	    if(!$this->_isBrutUrl && $wrongRoute){
		$this->_routeUrl = $this->_routeUrlRepository->getByRouteName('error404');
		$this->_rewrittingUrl = $this->_rewrittingUrlRepository->getByIdRoute($this->_routeUrl->getId());

		header('location:' . Router::ReplacePattern($this->_rewrittingUrl->getUrlMatched(), $this->_page));
	    }
	}
	
	/**
	 * ManageRouting -> Renvoie false si on doit renvoyer vers la page par défaut. True sinon. Gère le routing de base
	 * @return boolean
	 */
	public function ManageRouting(){
	    // S'il n'y a aucune route en base matchant cette url, ou que l'url est '/'
	    $this->_routeUrlRepository = new RouteUrlRepository($this->_pdo, $this->_lang);
	    if(!isset($this->_url['controller']) || empty($this->_url['controller']) || ($this->_url["debug"] == "default" && $this->_page == '/')){
		// On récupère la route de la homepage et on en déduit l'objet rewritting
		$this->_routeUrl = $this->_routeUrlRepository->getByRouteName('Home');
		$this->_rewrittingUrl = $this->_rewrittingUrlRepository->getByIdRoute($this->_routeUrl->getId());
		
		return false;
	    }
	    // Sinon on récupère la route grâce à l'url rewritté
	    else {
		// Via cette url on récupère l'objet route correspondant
		$this->_routeUrl = $this->_routeUrlRepository->getByControllerAction($this->_url['controller'], $this->_url['action']);
		
		return true;
	    }
	}
	
	/**
	 * ManageController -> set le nom du controller
	 */
	public function ManageController(){
	    if($this->_isBrutUrl)
		$this->_controllerName = ucwords($this->_url['controller']) . 'Controller';
	    else
		$this->_controllerName = ucwords($this->_routeUrl->getController()) . 'Controller';
	}
	
	/**
	 * ManageAction -> set le nom de l'action et instancie un nouveau controller
	 */
	public function ManageAction(){
	    // On instancie le controller
	    if($this->_isBrutUrl)
		$this->_actionName = ucwords($this->_url['action']);
	    else
		$this->_actionName = $this->_routeUrl->getAction();
	    
	    $this->_controller = new $this->_controllerName($this->_pdo, $this->_lang, $this->_actionName);
	}
	
	/**
	 * ExecuteAction -> exécute l'action du controller instancié
	 */
	public function ExecuteAction(){
	    $actionName = $this->_actionName;
	    // Si on a des paramètres dans l'url
	    if(isset($this->_url["params"])){
		$this->_controller->$actionName($this->_url["params"]);
	    }
	    else{
		$this->_controller->$actionName();
	    }
	}
	
	/***********
	 * GETTERS *
	 ***********/
	public function getRewrittingUrl(){
	    return $this->_rewrittingUrl;
	}
	public function getRouteUrl(){
	    return $this->_rewrittingUrl;
	}
	public function getRouteUrlRepository(){
	    return $this->_rewrittingUrl;
	}
	public function getControllerName(){
	    return $this->_controllerName;
	}
	public function getActionName(){
	    return $this->_actionName;
	}
	public function isBrutUrl(){
	    return $this->_isBrutUrl;
	}
    }