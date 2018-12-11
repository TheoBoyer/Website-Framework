<?php

class Category extends Model {
	protected $tableName = "category";
	protected $primaryKey = "idcategory";
	protected $fields = [
		"name"
	];
}