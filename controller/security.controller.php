<?php

$page = isset($_GET["page"]) ? $_GET["page"] : "connexion";

switch ($page) {
    case 'connexion':
        $_SESSION["error"] = [];
        if (isPost()) {
            if (validateDataLogin($_POST)) {
                $email = $_POST["email"] ?? "";
                $mot_de_passe = $_POST["password"] ?? "";
                $user = credentialUser($email, $mot_de_passe);
                if ($user) {
                    $_SESSION["user"] = $user;
                    redirectByRole($user["role_name"]);
                } else {
                    $_SESSION["error"]["email"]  = "Email ou mot de passe incorrect";
                }
            }
            renderView("security/connexion", [], "security");
        }
        if (isGet()) {
            renderView("security/connexion", [], "security");
        }
        break;
    case 'deconnexion':
        session_unset();
        session_destroy();
        redirection("security", "connexion");
        break;
    default:
        redirection("notfound", "error");
        break;
}
