<?php

include_once "tools.php";

$srv = new Server(Server::loadConfig());

function server() { global $srv; return $srv;}

session_start();
server()->saveParametres();

include_once "routes.php";

if(!$app->found()){
	if(empty($_GET['route']))
		$_GET['route'] = "default";
	else
		$_GET['route'] = "error";
}

include_once "special_routes.php";
