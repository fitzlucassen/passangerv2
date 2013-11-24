<?php
    class Router {
	public static $_routes = array();
	public static $_defaultController = "home";
	public static $_defaultAction = "index";
	public static $_regex = "A-Za-z0-9\-";

	
	public static function Add($lang, $controller, $action, $pattern) {
	    if (!isset(self::$_routes[$lang]))
		self::$_routes[$lang] = array();
	    array_push(self::$_routes[$lang], array("controller" => $controller, "action" => $action, "pattern" => $pattern));
	}
	
	public static function AddRange($routes, $lang, $pdo) {
	    foreach ($routes as $thisRoute){
		$url = RewritingUrl::GetByIdRouteStatic($thisRoute['id'], $lang,$pdo);
		self::Add($lang, $thisRoute['controller'], $thisRoute['action'], $url['urlMatched']);
	    }
	}
	
	public static function FindRoute($controller, $action, $lang) {
	    foreach (self::GetRoutes(null, $lang) as $key => $value) {
		if ($value["controller"] == $controller && $value["action"] == $action)
		    return self::GetRoutes($key, $lang);
	    }
	    return false;
	}
	public static function FindPattern($pattern, $method = false) { // method is for anonymous params
	    if (!$method) {
		foreach (self::GetRoutes() as $key => $value) {
		    if ($value["pattern"] == $pattern)
			return self::GetRoutes($key);
		}
	    }
	    else {
		foreach (self::GetRoutes() as $key => $value) {
		    $regex = "#" . preg_replace("#{([" . self::$_regex . "]+)}#i", "([" . self::$_regex . "]+)", $value["pattern"]) . "#i";

		    if (preg_match($regex, $pattern))
			return self::GetRoutes($key);
		}
	    }
	    return false;
	}
	
	/*
	 * Setters
	 */
	public static function SetDefaultsRoutes($defaultController, $defaultAction) {
	    self::$_defaultController = $defaultController;
	    self::$_defaultAction = $defaultAction;
	}
	public static function SetRegex($regex) {
	    self::$_regex = $regex;
	}

	/*
	 * Getters
	 */
	public static function GetRoutes($key = null, $lang = null) {
	    if ($lang === null)
		$lang = "fr";
	    return ($key === null) ?
		    ((isset(self::$_routes[$lang])) ? self::$_routes[$lang] : array() ) :
		    ((isset(self::$_routes[$lang][$key])) ? self::$_routes[$lang][$key] : false );
	}
	public static function GetUrl($controller, $action, $params = null, $lang = null) {
	    if ($lang === null)
		$lang = "fr";
	    if ($route = self::FindRoute($controller, $action, $lang)) {
		$url = $route["pattern"];
		if ($params !== null)
		    foreach ($params as $key => $value)
			$url = str_replace("{" . $key . "}", $value, $url);
		return "/" . $lang . $url;
	    }
	    else {

		$url = "/" . $controller . "/" . $action;
		if ($params !== null)
		    foreach ($params as $value)
			$url .= "/" . $value;
		return "/" . $lang . $url;
	    }
	}

	public static function GetRoute($pattern) {
	    $pattern = explode("?", $pattern);
	    $pattern = $pattern[0];

	    if ($route = self::FindPattern(preg_replace("#{([" . self::$_regex . "]+)}#i", "{}", $pattern), true)) {
		$tab = preg_split("#[{}]#i", $route["pattern"]);
		if (count($tab) > 1) {
		    foreach ($tab as $key => $value) {
			if ($key % 2 == 1)
			    $paramsName[] = $value;
			else
			    $pattern = str_replace($value, "%", $pattern);
		    }
		    $paramsValue = explode("%", $pattern);
		    foreach ($paramsName as $key => $value)
			$params[$value] = $paramsValue[$key + 1];
		}
		else
		    $params = array();
		return array("controller" => $route["controller"], "action" => $route["action"], "params" => $params);
	    }
	    else {
		$route = array_values(array_filter(explode("/", $pattern)));
		return array(
		    "controller" => (array_key_exists(0, $route)) ? $route[0] : self::$_defaultController,
		    "action" => (array_key_exists(1, $route)) ? $route[1] : self::$_defaultAction,
		    "params" => array_slice($route, 2),
		);
	    }
	}

    }