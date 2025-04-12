<?php
verifyUserAuth();
require_once "../boostrap/required.php";





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
        $professeur = getAllProfesseurs(); 
        // dd($professeur);

        $data = [
            "role" => $role,
            "page" => $page,
            "professeur" => is_array($professeur) ? $professeur : []
        ];
            $searchTerm = $_GET['search'] ?? '';
    
    // Pagination
    $limit = 6;
    $currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    if ($currentPage < 1) $currentPage = 1;
    $offset = ($currentPage - 1) * $limit;
    
    // Récupérer les données
    if (!empty($searchTerm)) {
        $professeur = searchProfesseurs($searchTerm, $limit, $offset);
        $totalProfesseurs = count(searchProfesseurs($searchTerm)); // Total avec recherche
    } else {
        $professeur = getAllProfesseurs($limit, $offset);
        $totalProfesseurs = countProfesseurs();
    }
            $totalPages = ceil($totalProfesseurs / $limit);
        
            // Passer les données à la vue
            $data = [
                "role" => $role,
                "page" => $page,
                "currentPage" => $currentPage,
                "totalPages" => $totalPages,
                "professeur" => is_array($professeur) ? $professeur : [],
                "searchTerm" => $searchTerm // Ajout dans les données envoyées à la vue
            ];
        
            renderView("administrateur/professeur", $data, "dashboard");
            break;
        
    case 'classes':
        $classe = getAllClasses(); 

        $data = [
            "role" => $role,
            "page" => $page,
            "classe" => is_array($classe) ? $classe : []
        ];

        // Récupérer le terme de recherche
        $searchTerm = $_GET['search'] ?? '';
    
        // Pagination
          $limit = 6;
          $currentPage = isset($_GET['p']) ? (int)$_GET['p'] : 1;
          if ($currentPage < 1) $currentPage = 1;
          $offset = ($currentPage - 1) * $limit;
    
         // Récupérer les données
         if (!empty($searchTerm)) {
         $classe = searchClasses($searchTerm);
         $totalClasses = count(searchClasses($searchTerm)); // Total avec recherche
         } else {
         $classe = getAllClasses($limit, $offset);
         $totalClasses = countClasses();
         }

         if(isset($_GET["action"])){
            if($_GET["action"] == "delete"){
                deleteClass($_GET["id"]);
                header("Location: ?controller=rp&page=classes");
            }
         }
    
         $totalPages = ceil($totalClasses / $limit);
    
         $data = [
          "role" => $role,
          "page" => $page,
          "currentPage" => $currentPage,
          "totalPages" => $totalPages,
          "classe" => $classe,
         "searchTerm" => $searchTerm
         ];
    
    renderView("administrateur/classe", $data, "dashboard");
    break;
    case 'cours':
        $cours = getAllCours();
        $data = [
            "role" => $role,
            "page" => $page,
            "cours" =>  $cours
        ];
        // 
        renderView("administrateur/cours", $data, "dashboard");
        break;
    case 'filieres':
            // Récupération de la liste des filières avec un éventuel filtre
            $search = $_GET['search'] ?? '';
            $filiere = getAllFilieres($search);
        
            // Vérifier si un ID de modification est présent
            $filiereEdit = isset($_GET['edit']) ? getFiliereById($_GET['edit']) : null;
        
            // Envoyer les données à la vue
            $data = [
                "role" => $role,
                "page" => $page,
                "filiere" => $filiere,  // Liste complète
                "filiereEdit" => $filiereEdit // Données d'une filière en édition
            ];
        
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
