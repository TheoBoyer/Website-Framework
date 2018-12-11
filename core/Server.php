<?php
class Server {
	private $db;
	public function __construct($cfg) {
		$dbCfg = $cfg["db"];
		$this->db = new PDO($dbCfg["sgbd"].":host=localhost;dbname=".$dbCfg["dbname"].";port=5433",$dbCfg["dblogin"],$dbCfg["dbpass"]);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$this->db->query("SET search_path TO tp_note;");
	}
	public function db() {
		return $this->db;
	}

	public static function loadConfig() {
		return json_decode(file_get_contents('config.json'), TRUE);
	}

	public static function saveParametres() {
		if (isset($_POST)) {
			$_SESSION["old"] = array();
			foreach($_POST as $k=>$v)
				$_SESSION["old"][$k] = $v;
		}
	}
}