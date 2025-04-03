<?php

$mesControllers = [
    "security" => "../controller/security.controller.php",
    "attache" => "../controller/attache.controller.php",
    "etudiant" => "../controller/etudiant.controller.php",
    "rp" => "../controller/administrateur.controller.php",
    "professeur" => "../controller/professeur.controller.php",
    "notfound" => "../controller/notfound.controller.php",
];

function handleController(string $controller = "security")
{
    global $mesControllers;
    if (array_key_exists($controller, $mesControllers)) {
        if (file_exists($mesControllers[$controller])) {
            require_once $mesControllers[$controller];
        } else {
            redirection("notfound", "error");
        }
    } else {
        redirection("notfound", "error");
    }
}
