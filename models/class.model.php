<?php
require_once __DIR__.'/../data/db.php';

function getAllClasses() {      
    try {
        $sql = "
            SELECT 
                c.*,  
                f.libelle AS filiere,  
                n.libelle AS niveau  
            FROM classe c
            LEFT JOIN filiere f ON c.filiere_id = f.id
            LEFT JOIN niveau n ON c.niveau_id = n.id;
        ";
        
        return fetchResult($sql); // Ici, on garde l'ordre correct
        
    } catch (PDOException $e) {
        error_log("Erreur dans getAllClasses: " . $e->getMessage());
        return [];
    }
}

function countClasses() {
    $pdo = connectDB();
    
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM classe");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    } catch (PDOException $e) {
        error_log("Erreur dans countClasses: " . $e->getMessage());
        return 0;
    }
}

function searchClasses($searchTerm) {
    
    $sql = "SELECT 
                c.*,  
                f.libelle AS filiere,  
                n.libelle AS niveau  
            FROM classe c
             JOIN filiere f ON c.filiere_id = f.id
             JOIN niveau n ON c.niveau_id = n.id
            WHERE C.libelle LIKE ?";
    
    $params = [
        '%' . $searchTerm . '%',
    ];
    
    try {
        return fetchResult($sql,[$searchTerm]);
    } catch (PDOException $e) {
        error_log("Erreur de recherche: " . $e->getMessage());
        return [];
    }
}

function deleteClass($id) {
    $sql = "DELETE FROM cours WHERE classe_id = ?";
    $isdelete = executeQuery($sql,[$id]);
    if ($isdelete) {
        $sql1= "DELETE FROM classe WHERE id = ?";
        return executeQuery($sql1,[$id]);
    }
}

function handleajoutClassePage() {
    $classes = getAllElements("classes");
    $errors = [];

    // Vérifier si c'est une modification
    $isEdit = isset($_GET['id_classe']);
    $classe = null;

    if ($isEdit) {
        $id_classe = $_GET['id_classe'];
        $classe = getElementById("classes", $id_classe, "id_classe");

        if (!$classe) {
            $_SESSION['error'] = "Classe introuvable.";
            header('Location: index.php?controller=rp&page=classes');
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $libelle = trim($_POST['libelle']);
        $niveau = trim($_POST['niveau']);
        $filliere = trim($_POST['filliere']);
        $created_at = date('Y-m-d H:i:s');

        // Validation
        if (empty($libelle)) $errors['libelle'] = "Veuillez entrer un libellé.";
        if (empty($niveau)) $errors['niveau'] = "Veuillez sélectionner un niveau.";
        if (empty($filliere)) $errors['filliere'] = "Veuillez sélectionner une filière.";

        if (empty($errors)) {
            // Données à enregistrer
            $classeData = [
                "libelle" => $libelle,
                "niveau" => $niveau,
                "filiere" => $filliere
            ];

            if (isset($_POST['id_classe'])) {
                // Mise à jour de la classe existante
                updateElement("classes", $classeData, "id_classe", $_POST['id_classe']);
                $_SESSION['success'] = "Classe mise à jour avec succès.";
            } else {
                // Ajout d'une nouvelle classe
                $classeData["created_at"] = $created_at;
                insertElement("classes", $classeData);
                $_SESSION['success'] = "Classe ajoutée avec succès.";
            }

            header("Location: index.php?controller=rp&page=classes");
            exit;
        }
    }

    require_once ROOT_PATH . "/views/rp/ajoutClasse.html.php";
}


function createClasse(array $data): array
{
    $sql = "INSERT INTO classe (libelle, filiere_id, niveau_id) 
            VALUES (?, ?, ?)";
    
    $params = [$data['libelle'],$data['filliere'],$data['niveau']];
    
    $lastInsertId = executeQuery($sql, $params, true);
    
    return $lastInsertId 
        ? ['success' => true, 'message' => "Classe créée avec succès", 'id_classe' => $lastInsertId]
        : ['success' => false, 'message' => "Échec de la création"];
}

function updateClasse(array $data, int $id): array
{
    $sql = "UPDATE classe 
            SET libelle = :libelle, 
                filiere = :filiere, 
                niveau = :niveau 
            WHERE id = :id";  // Changé id_classe en id
    
    $params = [
        ':libelle' => $data['libelle'],
        ':filiere' => $data['filliere'],
        ':niveau' => $data['niveau'],
        ':id' => $id  // Changé id_classe en id
    ];
    

    $result = executeQuery($sql, $params);
    
    return $result 
        ? ['success' => true, 'message' => "Classe mise à jour avec succès"]
        : ['success' => false, 'message' => "Échec de la mise à jour"];
}

function getClasseById(int $id): array
{
    $sql = "SELECT * FROM classe WHERE id = :id";
    $params = [':id' => $id];
    
    try {
        $stmt = executeQuery($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        error_log("Erreur SQL [getClasseById]: " . $e->getMessage() . 
                 "\nRequête: $sql\nParams: " . print_r($params, true));
        return [];
    }
}

function getAllFilieres(): array
{
    $sql = "SELECT id, libelle FROM filiere";
    return fetchResult($sql) ?: [];
}

function getAllNiveaux(): array
{
    $sql = "SELECT id, libelle FROM niveau";
    return fetchResult($sql) ?: [];
}

function saveClasse(array $data, ?int $id_classe = null): array
{
    try {
        return $id_classe
            ? updateClasse($cleanData, $id_classe)
            : createClasse($data);
    } catch (Exception $e) {
        return ['success' => false, 'message' => "Erreur technique: " . $e->getMessage()];
    }
}

