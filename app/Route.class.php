<?php

class Route{
	public $_methode;
	public $_path;
	public $_target;
	public $_name;
	static public $verbos = false;

	public function __construct($methode, $path, $target, $name){
		$this->_methode = $methode;
		$this->_path = $path;
		$this->_target = $target;
		if (isset($name))
		{
			$this->_name = $name;
		}
	}
	public function match($url){
		$path = trim($this->_path, "/");
		$url = trim($url, "/");
		$regex = "/^{$path}\$/i";
		if (preg_match($regex, $url))  // pattern,  input string
			return true;
		else
			return false;
    }
	public function __toString(){
		return	"Instance route:</br>".
				"methode: ".$this->_methode."</br>".
				"path: ".$this->_path."</br>".
				"target: ".$this->_target."</br>".
				"name: ".$this->_name."</br></br>";

	}
}


?>
