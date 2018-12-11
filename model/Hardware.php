<?php

class Hardware extends Model {
	protected $tableName = "hardware";
	protected $primaryKey = "idhardware";
	protected $fields = ["name","idcategory","idbrand"];
}