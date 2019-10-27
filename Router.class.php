<?php

class Router {
	public $_routes = [];
	public $_uri;
	static public $verbos = false;

	public function __construct($uri){
		$this->_uri = $uri;
	}

	public function map($methode, $path, $target, $name)
	{
		$route = new Route($methode, $path, $target, $name);
		$this->_routes[] = $route;
		/* print $route; */
	}

	public function run(){
		foreach ($this->_routes as $route)
		{
			/* print $route; */
			$result = $route->match($this->_uri);
			if ($result != false)
				return $route;
		}
		return false;
	}
	public function __toString(){
		return	"Instance router:</br>".
				"uri: ".$this->_uri."</br>";
	}
}
?>
