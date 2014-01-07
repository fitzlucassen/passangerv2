<?php
    class App {
	private $_routeUrl = null;
	private $_rewrittingUrl = null;
	private $_routeUrlRepository = null;
	private $_rewrittingUrlRepository = null;
	private $_langRepository = null;
	private $_url = "";
	private $_page = "";
	private $_pdo = null;
	private $_lang = "";
	private $_controllerName = "";
	private $_actionName = "";
	private $_controller = null;
	private $_session = null;
	private $_errorManager = null;
	private $_isOnMobile = false;
	private $_userAgent = "";
	private $_isValidUrl = false;
	private $_isDebugMode = false;
	
	public function __construct() {
	    $this->_errorManager = new Error("");
	    
	    // Initialisation de la session
	    $this->_session = new Session("");
	    if(!$this->_session->ContainsKey("lang"))
		$this->_session->Write("lang", "fr");
	    
	    // Initialisation base de données
	    if(!isset($this->_pdo)){
		try{
		    $this->_pdo = new Sql();
		}
		catch(ConnexionException $e){
		    $this->_errorManager->noConnexionAvailable();
		    die();
		}
	    }
	    
	    // Pour gérer les différents devices
	    $this->_userAgent = $_SERVER['HTTP_USER_AGENT'];
	    $this->_isOnMobile = (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$this->_userAgent) || 
				    preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($this->_userAgent,0,4)));
	}
	
	/**
	 * run -> initialisation de l'app
	 */
	public function run(){
	    $this->_page = $_SERVER['REQUEST_URI'];

	    // On ajoute toutes les routes présentes en base de données au router
	    $this->_langRepository = new LangRepository($this->_pdo);
	    $langInUrl = false;
	    
	    // Insertion des routes en cache
	    if(!$langs = Cache::read("lang")){
		$langs = $this->_langRepository->getAll();
		Cache::write("lang", $langs);
	    }
	    foreach($langs as $thisLang){
		if(!$routes = Cache::read("routeurl")){
		    $routes = RouteUrlRepository::getAll($this->_pdo);
		    Cache::write("routeurl", $routes);
		}
		Router::AddRange($routes, $thisLang['code'], $this->_pdo);
		if(strpos($this->_page, "/" . $thisLang['code'] . "/") === 0){
		    $this->_session->Write("lang", $thisLang['code']);
		    $langInUrl = true;
		}
	    }
	    // Fin route

	    if(!$langInUrl)
		$this->_session->Write("lang", "fr");
	    
	    $this->_lang = $this->_session->Read("lang");
	    
	    $this->_rewrittingUrlRepository = new RewrittingUrlRepository($this->_pdo, $this->_lang);
	    $this->_url = $this->_rewrittingUrlRepository->getByUrlMatched($this->_page);
	}
	
	/**
	 * Manage404Route -> gère le routing vers la page 404 si la page n'existe pas
	 */
	public function Manage404Route(){
	    $c = $this->_routeUrl->getController() . 'Controller';
	    $c2 = __controller_directory__ . '/' . $c . '.php';
	    
	    if($this->_isDebugMode)
		$this->_isValidUrl = file_exists($c2) && class_exists($c);
	    else
		$this->_isValidUrl = $c != 'Controller' && file_exists($c2) && class_exists($c);

	    
	    // Si l'url n'existe pas on redirige vers la page 404
	    if((!$this->_isValidUrl && $this->_routeUrl->getId() == 0) || ($this->_url["debug"] == "default" && $this->_page != '/')){
		Logger::write("Redirection vers la page 404 sur l'url : " . $this->_page);
		
		$this->_routeUrl = $this->_routeUrlRepository->getByRouteName('error404');
		$this->_rewrittingUrl = $this->_rewrittingUrlRepository->getByIdRouteUrl($this->_routeUrl->getId());

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
		$this->_rewrittingUrl = $this->_rewrittingUrlRepository->getByIdRouteUrl($this->_routeUrl->getId());
		
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
	    if($this->_isValidUrl && $this->_routeUrl->getId() == 0)
		$this->_controllerName = $this->_url['controller'] . "Controller";
	    else
		$this->_controllerName = $this->_routeUrl->getController() . 'Controller';
	    
	    try {
		// On vérifie que le fichier de la classe de ce controller existe bien
		$controllerFile = __controller_directory__ . '/' . $this->getControllerName() . '.php';
		if(!file_exists($controllerFile))
		    throw new ControllerException(ControllerException::NOT_FOUND, array('file' => $controllerFile));

		// On vérifie que la classe existe bien
		if(!class_exists($this->getControllerName()))
		    throw new ControllerException(ControllerException::INSTANCE_FAIL, array('controller' => $this->_controllerName));
	    }
	    catch(ControllerException $e){
		// On gère les erreur de façon personnalisée
		if($e->getType() == ControllerException::INSTANCE_FAIL){
		    Logger::write(ControllerException::INSTANCE_FAIL . " : controllerInstanceFailed " . implode(' ', $e->getParams()));
		    $this->_errorManager->controllerInstanceFailed($e->getParams());
		    die();
		}
		else{
		    Logger::write(ControllerException::NOT_FOUND . " : controllerClassDoesntExist " . implode(' ', $e->getParams()));
		    $this->_errorManager->controllerClassDoesntExist($e->getParams());
		    die();
		}
	    }
	}
	
	/**
	 * ManageAction -> set le nom de l'action et instancie un nouveau controller
	 */
	public function ManageAction(){
	    // On instancie le controller
	    if($this->_isValidUrl && $this->_routeUrl->getId() == 0)
		$this->_actionName = $this->_url['action'];
	    else
		$this->_actionName = $this->_routeUrl->getAction();
	    
	    $this->_controller = new $this->_controllerName($this->_pdo, $this->_lang, $this->_actionName);
	    
	    // On exécute l'action cible du controller et on affiche la vue avec le modèle renvoyé
	    try{
		$this->ExecuteAction();
	    }
	    catch(ControllerException $e){
		Logger::write(ControllerException::ACTION_NOT_FOUND . " : actionDoesntExist " . implode(' ', $e->getParams()));
		$this->_errorManager->actionDoesntExist($e->getParams());
		die();
	    }
	    catch(ViewException $ex){
		Logger::write("ViewException : noModelProvided " . implode(' ', $e->getParams()));
		$this->_errorManager->noModelProvided($ex->getParams());
		die();
	    }
	}
	
	/**
	 * ExecuteAction -> exécute l'action du controller instancié
	 */
	public function ExecuteAction(){
	    $actionName = $this->_actionName;
	    
	    if(!method_exists($this->_controllerName, $this->_actionName))
		throw new ControllerException(ControllerException::ACTION_NOT_FOUND, array("controller" => $this->_url['controller'], "action" => $this->_url['action']));
	    
	    // Si on a des paramètres dans l'url
	    if(isset($this->_url["params"])){
		$this->_controller->$actionName($this->_url["params"]);
	    }
	    else{
		$this->_controller->$actionName();
	    }
	}
	
	/**
	 * ManageAutoload -> gère l'autoload des class
	 * @param string $class
	 */
	public static function ManageAutoload($class){
	    $file = __entity_directory__ . '/' .trim(str_replace(array('\\', '_'), '/', $class), '/').'.php';
	    if(file_exists($file))
		require_once $file;
	    else {
		$file = __repository_directory__ . '/' .trim(str_replace(array('\\', '_'), '/', $class), '/').'.php';
		if(file_exists($file))
		    require_once $file;
		else {
		    $file = __helper_directory__ . '/' . strtolower(trim(str_replace(array('\\', '_'), '/', $class), '/')) . '.class.php';
		    if(file_exists($file))
			require_once $file;
		    else{
			$file = __component_directory__ . '/' . strtolower(trim(str_replace(array('\\', '_'), '/', $class), '/')) . '.class.php';
			if(file_exists($file))
			    require_once $file;
			else {
			    $file = __controller_directory__ . '/' . strtolower(trim(str_replace(array('\\', '_'), '/', $class), '/')) . '.php';
			    if(file_exists($file))
				require_once $file;
			}
		    }
		}
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
	public function getIsDebugMode(){
	    return $this->_isDebugMode;
	}
	public function getPdo(){
	    return $this->_pdo;
	}
	
	/***********
	 * SETTERS *
	 ***********/
	public function setIsDebugMode($arg){
	    $this->_isDebugMode = $arg;
	}
    }