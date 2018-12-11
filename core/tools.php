<?php

function __autoload($name) {
	$dir = "model";
	$file = $name.".php";
	if(file_exists("core/".$file))
		$dir = "core";
	else if (strpos($name,"Controller") !== FALSE)
		$dir = "controller";
	include_once $dir."/".$file;

}