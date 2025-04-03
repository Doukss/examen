<?php

function validateDataLogin($data)
{
    if (empty($data["email"])) {
        $_SESSION["error"]["email"] = "L'email est requis";
    }
    if (empty($data["password"])) {
        $_SESSION["error"]["mot_de_passe"] = "Le mot de passe est requis";
    }
    return empty($_SESSION["error"]);
}
