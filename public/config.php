<?php
// Informations de connexion à la base de données
        $host = "localhost";
        $db_name = "anniv";
        $username = "root";
        $password = "";

try {
    // Créer une instance de la classe PDO et se connecter à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

    // Activer les exceptions PDO pour les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
