<?php
require_once __DIR__.'/../data/db.php';

function getAllCours() {
    try {
        $sql = "SELECT 
                c.id, 
                DATE_FORMAT(c.date_cours, '%d/%m/%Y') AS date_formatee,
                c.date_cours,
                TIME_FORMAT(c.heure_debut, '%H:%i') AS heure_debut,
                TIME_FORMAT(c.heure_fin, '%H:%i') AS heure_fin,
                c.nbr_heure, 
                c.module,
                c.professeur_id,
                CONCAT(p.nom, ' ', p.prenom) AS professeur_nom,
                c.classe_id,
                cl.libelle AS classe_nom
            FROM cours c
            LEFT JOIN professeur p ON c.professeur_id = p.id
            LEFT JOIN classe cl ON c.classe_id = cl.id
            ORDER BY c.date_cours DESC, c.heure_debut DESC";
        
        return fetchResult($sql);
    } catch (PDOException $e) {
        die("Erreur dans getAllCours: " . $e->getMessage());
    }
}

function addCours(array $data): array
{
    // Validation des données
    $errors = [];
    
    if (empty($data['date_cours'])) {
        $errors['date_cours'] = "La date du cours est requise";
    }
    
    if (empty($data['heure_debut']) || empty($data['heure_fin'])) {
        $errors['heure'] = "Les heures de début et fin sont requises";
    } elseif ($data['heure_debut'] >= $data['heure_fin']) {
        $errors['heure'] = "L'heure de fin doit être après l'heure de début";
    }
    
    if (empty($data['module'])) {
        $errors['module'] = "Le module est requis";
    }
    
    if (empty($data['professeur_id'])) {
        $errors['professeur'] = "Le professeur est requis";
    }
    
    if (empty($data['classe_id'])) {
        $errors['classe'] = "La classe est requise";
    }
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Calcul du nombre d'heures
    $debut = new DateTime($data['heure_debut']);
    $fin = new DateTime($data['heure_fin']);
    $nbr_heures = $debut->diff($fin)->h;
    
    try {
        $sql = "INSERT INTO cours 
                (date_cours, heure_debut, heure_fin, nbr_heure, module, professeur_id, classe_id)
                VALUES (:date_cours, :heure_debut, :heure_fin, :nbr_heure, :module, :professeur_id, :classe_id)";
        
        $params = [
            ':date_cours' => $data['date_cours'],
            ':heure_debut' => $data['heure_debut'],
            ':heure_fin' => $data['heure_fin'],
            ':nbr_heure' => $nbr_heures,
            ':module' => htmlspecialchars(trim($data['module'])),
            ':professeur_id' => (int)$data['professeur_id'],
            ':classe_id' => (int)$data['classe_id']
        ];
        
        $lastInsertId = executeQuery($sql, $params, true);
        
        return $lastInsertId
            ? ['success' => true, 'message' => "Cours ajouté avec succès"]
            : ['success' => false, 'message' => "Erreur lors de l'ajout du cours"];
            
    } catch (PDOException $e) {
        return ['success' => false, 'message' => "Erreur technique: " . $e->getMessage()];
    }
}
