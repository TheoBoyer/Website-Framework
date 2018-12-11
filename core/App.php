<?php


class App {
	private $found;
	public function __construct() {
		$this->found = false;
	}

	public function route($url, $c, $m) {
		if(empty($_GET['route'])||$_GET['route']!==$url||$this->found())
			return;
		$ctrl = new $c;
		$ctrl->$m();
		$this->found = true;
	}
	public function found() {
		return $this->found;
	}
}