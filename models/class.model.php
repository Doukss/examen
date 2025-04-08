<?php
require_once __DIR__.'/../data/db.php';

function getAllClasses(int $limit = 6, int $offset = 0) {      
    try {
        $sql = "
            SELECT 
                c.*,  
                f.libelle AS filiere,  
                n.libelle AS niveau  
            FROM classe c
            LEFT JOIN filiere f ON c.filiere_id = f.id
            LEFT JOIN niveau n ON c.niveau_id = n.id
            LIMIT ? OFFSET ?;
        ";
        
        return fetchResult($sql,[$limit,$offset]); // Ici, on garde l'ordre correct
        
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

