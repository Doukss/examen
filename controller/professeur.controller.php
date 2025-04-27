<?php
verifyUserAuth();
require_once "../boostrap/required.php";

$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";

switch ($page) {
    case 'dashboard':
        renderView("professeur/dashboard");
        break;
    default:
        redirection("notFound", "error");
        break;
}
