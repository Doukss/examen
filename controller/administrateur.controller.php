<?php
verifyUserAuth();
require_once "../models/rp.model.php";
require_once "../models/class.model.php";
$page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";
$role = $_SESSION["user"]["role_name"];
$data = ["role" => $role, "page" => $page];

switch ($page) {
    case 'dashboard':
        $data += [
            "profs" => getCountAllProfesseur(),
            "class" => getCountAllClass(),
            "inscrit" => getCountAllInscrit()
        ];
        renderView("administrateur/dashboard", $data, "dashboard");
        break;
    
    case 'professeurs':
        renderView("administrateur/professeur", $data, "dashboard");
        break;
    case 'classes':
        $classe = getAllClasses(); 
        // dd($classe); 

        $data = [
            "role" => $role,
            "page" => $page,
            "classe" => is_array($classe) ? $classe : []
        ];
        // Définition du nombre d'éléments par page
        $limit = 6;

    // Récupérer la page actuelle de la pagination depuis l'URL (`p`)
    $currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if ($currentPage < 1) $currentPage = 1;

    // Calcul de l'offset
    $offset = ($currentPage - 1) * $limit;

    $classe = getAllClasses($limit, $offset);

    $totalClasses = countClasses();
    $totalPages = ceil($totalClasses / $limit);

    $data = [
        "role" => $role,
        "page" => $page,  
        "currentPage" => $currentPage, 
        "totalPages" => $totalPages,
        "classe" => is_array($classe) ? $classe : []
    ];
    renderView("administrateur/classe", $data, "dashboard");
    break;
    case 'cours':
        renderView("administrateur/cours", $data, "dashboard");
        break;
    case 'filieres':
        renderView("administrateur/filiere", $data, "dashboard");
        break;
    case 'niveau':
        renderView("administrateur/niveau", $data, "dashboard");
        break;
    case 'ajout_classe':
        renderView("administrateur/add_classe", $data, "dashboard");
        break;
    case 'ajout_cours':
        renderView("administrateur/add_cours", $data, "dashboard");
        break;
    case 'ajout_professeurs':
        renderView("administrateur/add_professeur", $data, "dashboard");
        break;
    default:
        redirection("notFound", "error");
        break;
}
