<?php
require_once __DIR__.'/../data/db.php';

function getAllCours() {  
    $pdo = connectDB();
    
    try {
        $stmt = $pdo->prepare("
            SELECT 
                c.id, 
                c.date_cours,  
                c.heure_debut, 
                c.heure_fin, 
                c.nbr_heure, 
                c.module, 
                c.professeur_id, 
                c.classe_id
            FROM cours c
        ");
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur dans getAllCours: " . $e->getMessage());
    }
}


