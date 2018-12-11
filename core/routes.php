<?php

$app = new App();
$app->route("home", "HardwareController", "index");
$app->route("displayHardware", "HardwareController", "displayHardware");
$app->route("addHardware", "HardwareController", "addForm");
$app->route("saveHardware", "HardwareController", "save");