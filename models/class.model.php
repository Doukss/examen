<?php
require_once __DIR__.'/../data/db.php';

function getAllClasses(int $limit = 6, int $offset = 0) {  
    $pdo = connectDB();
    
    try {
        $stmt = $pdo->prepare("
            SELECT 
                c.*,  
                f.libelle AS filiere,  
                n.libelle AS niveau  
            FROM classe c
            LEFT JOIN filiere f ON c.filiere_id = f.id
            LEFT JOIN niveau n ON c.niveau_id = n.id
            LIMIT :limit OFFSET :offset
        ");
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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



