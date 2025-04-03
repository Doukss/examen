<?php

function credentialUser(string $email, string $mot_de_passe): ?array
{
    $sql = "SELECT u.*, r.nom AS role_name 
            FROM utilisateurs u
            JOIN roles r ON u.role_id = r.id
            WHERE u.email = :email AND u.mot_de_passe = :password AND u.est_actif = 1";
    $params = [
        ':email' => $email,
        ':password' => $mot_de_passe
    ];
    $user = fetchResult($sql, $params, false);
    if ($user) {
        return $user;
    }
    return null;
}
