<?php
require_once __DIR__.'/../data/db.php';

function getAllProfesseurs(int $limit = 6, int $offset = 0) {  
    $pdo = connectDB();
    // dd($professeur);

    try {
        $stmt = $pdo->prepare("
            SELECT 
                nom, 
                prenom, 
                specialite, 
                grade  
            FROM professeur
            LIMIT :limit OFFSET :offset
        ");
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Erreur dans getAllProfesseurs: " . $e->getMessage());
        return [];
    }
}

function countProfesseurs() {
    $pdo = connectDB();
    
    try {
        $stmt = $pdo->query("SELECT COUNT(*) AS total FROM professeur");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    } catch (PDOException $e) {
        error_log("Erreur dans countProfesseurs: " . $e->getMessage());
        return 0;
    }
}

function saveProfs(array $data, ?int $id_professeur = null): array
{
    try {
        return $id_professeur
            ? updateProfesseur($cleanData, $id_professeur)
            : createProfesseur($data);
    } catch (Exception $e) {
        return ['success' => false, 'message' => "Erreur technique: " . $e->getMessage()];
    }
}

function deleteProfesseur($id) {
    $sql = "DELETE FROM cours WHERE professeur_id = ?";
    $isdelete = executeQuery($sql,[$id]);
    if ($isdelete) {
        $sql1= "DELETE FROM professeur WHERE id = ?";
        return executeQuery($sql1,[$id]);
    }
}