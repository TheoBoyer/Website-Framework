<?php

class Model {
	private $id;
	private $values = [];
	function __construct() {
	}

	static function load($id) {
		$class = get_called_class();
		$inst = new $class;
		$st = server()->db()->prepare("select * from ".$inst->tableName." where ".$inst->primaryKey."=:id");
		$st->bindValue(":id", $id);
		$st->execute();
		if ($st->rowCount() == 0)
			return null;
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$inst->id = $row[$inst->primaryKey];
		$inst->values[$inst->primaryKey] = $row[$inst->primaryKey];
		foreach ($inst->fields as $a) {
			if (substr($a, 0,2) === "id") {
				$assoc = substr($a, 2);
				$newclassname = ucfirst($assoc);
				$inst->$assoc = $newclassname::load($row[$a]);
			}else
				$inst->$a = $row[$a];
		}
		return $inst;
	}

	static function all() {
		$class = get_called_class();
		$inst = new $class;
		$st = server()->db()->prepare("select ".$inst->primaryKey." from ".$inst->tableName);
		$st->execute();
		if ($st->rowCount() == 0)
			return null;
		$returns = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {			$returns[sizeof($returns)] = $class::load($row[$inst->primaryKey]);
		}
		return $returns;
	}

	function save() {
		if($this->id==null) {
			$st = server()->db()->prepare("insert into ".$this->tableName." default values returning ".$this->primaryKey);
			$st->execute();
			$row = $st->fetch();
			$this->id = $row[$this->primaryKey];
			$this->values[$this->primaryKey] = $this->id;
		}

		foreach ($this->fields as $f) {
			if(substr($f, 0,2) === "id") {
				$assoc = substr($f, 2);
				if(isset($this->$assoc)&&gettype($this->$assoc)=='object'&&$this->$assoc instanceof Model){
					$this->$assoc->save();
					$val = $this->$assoc->id;
				}else{
					$val = $this->$f;
				}
			} else {
				$val = $this->$f;
			}
			$st = server()->db()->prepare("update ".$this->tableName." set ".$f."=:value
				where ".$this->primaryKey."=:id");
			$st->bindValue(":value", $val);
			$st->bindValue(":id", $this->id);
			$st->execute();
		}
	}

	public function __get($attrname) {
		return $this->values[$attrname];
	}

	public function __set($attrname, $val) {
		$this->values[$attrname] = $val;
	}
}