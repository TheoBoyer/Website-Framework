<?php

class ErrorController extends Controller{

	function index() {
		$this->render('error', [
			"title"=>'Erreur 404'
		]);
	}
}