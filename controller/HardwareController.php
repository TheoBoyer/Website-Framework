<?php

class HardwareController extends Controller{

	function index() {
		$this->render('home', [
			"title"=>'Accueil'
		]);
	}

	function displayHardware() {
		$this->render('hardware-list', [
			"title"=>'Materiel',
			"hardware"=>Hardware::all()
		]);
	}

	function addForm() {
		$cats = Category::all();
		$cats_arr = array();
		foreach($cats as $c) {
			$cats_arr[sizeof($cats_arr)] = [
				"value"=>$c->idcategory,
				"content"=>$c->name
			];
		}
		$brands = Brand::all();
		$brands_arr = array();
		foreach($brands as $b) {
			$brands_arr[sizeof($brands_arr)] = [
				"value"=>$b->idbrand,
				"content"=>$b->name
			];
		}
		$this->render('hardware-addForm', [
			"title"=>'Ajouter du materiel',
			"categories"=>$cats_arr,
			"brands"=>$brands_arr
		]);
	}

	function save() {
		$hw = new Hardware;
		$hw->name = $_POST["hard_name"];
		$hw->idcategory = $_POST["cat_id"];
		$hw->idbrand = $_POST["brand_id"];
		$hw->save();
		$this->render('hardware-list', [
			"title"=>'Materiel',
			"hardware"=>Hardware::all()
		]);
	}
}