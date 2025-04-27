<?php

require_once "../data/db.php";

function prepareStatement(PDO $pdo, string $sql): PDOStatement
{
    $stmt = $pdo->prepare($sql);
    if (!$stmt) {
        throw new PDOException("Échec de la préparation de la requête");
    }
    return $stmt;
}

function determineParamType(mixed $value): int
{
    return match (true) {
        is_int($value) => PDO::PARAM_INT,
        is_bool($value) => PDO::PARAM_BOOL,
        is_null($value) => PDO::PARAM_NULL,
        default => PDO::PARAM_STR,
    };
}

function bindParams(PDOStatement $stmt, array $params): void
{
    $isNamed = false;

    // Vérifie si les clés sont nommées (ex: ":email")
    foreach (array_keys($params) as $key) {
        if (is_string($key)) {
            $isNamed = true;
            break;
        }
    }

    if ($isNamed) {
        // 🔗 Liaison des paramètres nommés
        foreach ($params as $key => $value) {
            $paramType = determineParamType($value);

            // S'assure que le paramètre commence par ":"
            if ($key[0] !== ':') {
                $key = ':' . $key;
            }

            $stmt->bindValue($key, $value, $paramType);
        }
    } else {
        // 🔗 Liaison des paramètres positionnels (?)
        $index = 1;
        foreach ($params as $value) {
            $paramType = determineParamType($value);
            $stmt->bindValue($index, $value, $paramType);
            $index++;
        }
    }
}

function logSqlError(PDOException $e, string $sql): void
{
    die("Erreur SQL: " . $e->getMessage() . "\nRequête: " . $sql);
}

function executeQuery(string $sql, array $params = [], bool $returnLastInsertId = false): PDOStatement|int|false
{
    try {
        $pdo = connectDB();
        $stmt = prepareStatement($pdo, $sql);
        bindParams($stmt, $params);
        $stmt->execute();

        if ($returnLastInsertId) {
            return $pdo->lastInsertId();
        }

        return $stmt;
    } catch (PDOException $e) {
        logSqlError($e, $sql);
        return false;
    }
}

function fetchResult(string $sql, array $params = [], bool $all = true): array | false
{
    $stmt = executeQuery($sql, $params);
    if ($stmt) {
        if ($all) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
    return false;
}
