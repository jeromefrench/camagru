<?php
<<<<<<< HEAD
=======

>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
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
<<<<<<< HEAD
		foreach ($this->_routes as $route) {
=======
		foreach ($this->_routes as $route)
		{
			/* print $route; */
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
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
