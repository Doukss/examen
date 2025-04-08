<?php
require_once __DIR__.'/../data/db.php';

function getAllFilieres() {  
    $pdo = connectDB(); // Assure-toi que cette fonction est bien définie

    try {
        $stmt = $pdo->prepare("SELECT id,libelle FROM filiere");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    } catch (PDOException $e) {
        die("Erreur dans getAllFilieres: " . $e->getMessage());
    }
}
