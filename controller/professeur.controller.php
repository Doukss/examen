<?php
verifyUserAuth();

$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";

switch ($page) {
    case 'dashboard':
        renderView("professeur/dashboard");
        break;
    default:
        redirection("notFound", "error");
        break;
}
