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
            // Traitement des formulaires (ajout et modification)
            if(!empty($_POST)){
                if(isset($_POST['id_prof']) && !empty($_POST['id_prof'])) {
                    // Mise à jour d'un professeur existant
                    $result = updateProfesseur($_POST, $_POST['id_prof']);
                } else {
                    // Création d'un nouveau professeur
                    $result = saveProfs($_POST);
                }
                
                if($result['success']) {
                    header("Location: ?controller=rp&page=professeurs");
                    exit();
                }
            }
        
            // Gestion de la suppression
            if(isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["id"])){
                deleteProfesseur($_GET["id"]);
                header("Location: ?controller=rp&page=professeurs");
                exit();
            }
        
            // Récupération d'un professeur à modifier
            $profToEdit = [];
            if(isset($_GET["action"]) && $_GET["action"] == "edit" && isset($_GET["id"])){
                $profToEdit = getProfesseurById($_GET["id"]);
            }
        
            // Recherche et pagination
            $searchTerm = $_GET['search'] ?? '';
            $currentPage = $_GET['p'] ?? 1;
            $limit = 10;
            $offset = ($currentPage - 1) * $limit;
        
            if (!empty($searchTerm)) {
                $professeur = searchProfesseurs($searchTerm, $limit, $offset);
                $totalProfesseurs = count(searchProfesseurs($searchTerm));
            } else {
                $professeur = getAllProfesseurs($limit, $offset);
                $totalProfesseurs = countProfesseurs();
            }
        
            $totalPages = ceil($totalProfesseurs / $limit);
        
            // Préparation des données pour la vue
            $data = [
                "role" => $role,
                "page" => $page,
                "professeur" => is_array($professeur) ? $professeur : [],
                "searchTerm" => $searchTerm,
                "profToEdit" => $profToEdit,
                "currentPage" => $currentPage,
                "totalPages" => $totalPages,
                "showModal" => isset($_GET['showModal']) || isset($_GET['action'])
            ];
        
            renderView("administrateur/professeur", $data, "dashboard");
            break;
        
            case 'classes':
                // Traitement du formulaire (ajout et modification)
                if(!empty($_POST)) {
                    if(isset($_POST['id_classe']) && !empty($_POST['id_classe'])) {
                        // Mise à jour d'une classe existante
                        $result = updateClasse($_POST, $_POST['id_classe']);
                    } else {
                        // Création d'une nouvelle classe
                        $result = saveClasse($_POST);
                    }
                    
                    if($result['success']) {
                        header("Location: ?controller=rp&page=classes");
                        exit();
                    }
                }
            
                // Gestion de la suppression
                if(isset($_GET["action"]) && $_GET["action"] == "delete") {
                    deleteClass($_GET["id"]);
                    header("Location: ?controller=rp&page=classes");
                    exit();
                }
            
                // Récupération de la classe à modifier
                $classeToEdit = [];
                if(isset($_GET["action"]) && $_GET["action"] == "edit" && isset($_GET["id"])) {
                    $classeToEdit = getClasseById($_GET["id"]); // Assurez-vous que cette fonction existe
                }
            
                // Récupération des données pour l'affichage
                $searchTerm = $_GET['search'] ?? '';
                $classe = !empty($searchTerm) ? searchClasses($searchTerm) : getAllClasses();
            
                // Préparation des données pour la vue
                $data = [
                    "role" => $role,
                    "page" => $page,
                    "classe" => is_array($classe) ? $classe : [],
                    "searchTerm" => $searchTerm,
                    "classeToEdit" => $classeToEdit,
                    "showModal" => isset($_GET['showModal']) || isset($_GET['action'])
                ];
            
                renderView("administrateur/classe", $data, "dashboard");
                break;
    case 'cours':
        // Récupérer les données nécessaires pour les selects
        $professeur = getAllProfesseurs();
        $classe = getAllClasses();
        $modules = ['Algèbre', 'Programmation', 'Réseaux', 'Base de données']; // À remplacer par votre liste réelle
        
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date_cours'])) {
            $result = addCours($_POST);
            
            if ($result['success']) {
                $_SESSION['flash_message'] = $result['message'];
                $_SESSION['flash_type'] = 'success';
                header("Location: ?controller=rp&page=cours");
                exit();
            } else {
                $data['errors'] = $result['errors'] ?? [];
                $data['form_data'] = $_POST;
            }
        }
        
        // Récupérer la liste des cours
        $cours = getAllCours();
        
        // Préparer les données pour la vue
        $data = [
            "role" => $role,
            "page" => $page,
            "cours" => $cours,
            "professeur" => $professeur,
            "classe" => $classe,
            "modules" => $modules,
            "errors" => $data['errors'] ?? [],
            "form_data" => $data['form_data'] ?? []
        ];
        
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

