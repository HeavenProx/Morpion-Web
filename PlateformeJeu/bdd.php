<?php
    $host = 'localhost';
    $dbname = 'plateformeJeu';
    $username = 'Admin';
    $password = 'BTSsio07100*';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
?>