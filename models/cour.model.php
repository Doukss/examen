<?php
require_once __DIR__.'/../data/db.php';

function getAllCours() {  
    
    try {
        $sql = "SELECT 
                c.id, 
                c.date_cours,  
                c.heure_debut, 
                c.heure_fin, 
                c.nbr_heure, 
                c.module, 
                c.professeur_id, 
                c.classe_id
            FROM cours c
        ";
        
        
        return fetchResult($sql);
    } catch (PDOException $e) {
        die("Erreur dans getAllCours: " . $e->getMessage());
    }
}


