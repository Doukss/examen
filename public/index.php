<?php

require_once "../boostrap/required.php";
startSession();
define("WEBROOT", "http://malick.mbodji.ecole221.sn:8000/?");
$controller = $_REQUEST["controller"] ?? "security";
handleController($controller);
