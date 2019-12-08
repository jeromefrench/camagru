<?php

class Route{
	public $_methode;
	public $_path;
	public $_target;
	public $_name;
	static public $verbos = false;
	public $_id;
	public $_slug;

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
		$path = str_replace("/", " ", $this->_path);
		$path = trim($path);
		$url = str_replace("/", " ", $url);
		$url = trim($url);

		$regex1 = "/^{$path}\$/i";
		$regex2 =  "/^({$path}) ([0-9]+)\$/i";
		$regex3 =  "/^({$path}) ([^\s]+) ([0-9]+)\$/i";

		if (preg_match($regex2, $url, $match)) {
			$this->_id = $match[2];
			return true;
		} else if (preg_match($regex3, $url, $match)) {
			$this->_slug = $match[2];
			$this->_id = $match[3];
			return true;
		} else if (preg_match($regex1, $url))  // pattern,  input string
		{
			return true;
		} else {
			return false;
		}
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
