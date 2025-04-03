<?php
verifyUserAuth();

$page = isset($_GET["page"]) ? $_GET["page"] : "error";

switch ($page) {
    case 'error':
        renderView("error/404", [], "error");
        break;
}
