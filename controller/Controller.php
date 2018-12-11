<?php

class Controller {
	function __constrcut() {
	}

	public function render($view, $d=array()) {
		global $data;

		$data = $d;

		if(empty($data["title"])){
			$data["title"] = "default";
		}

		include_once "view/partials/header.php";

		$data = $d;
		include_once "view/".$view.".php";

		include_once "view/partials/footer.php";
	}
}