<?php
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "pendu";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurer l'attribut PDO pour gérer les erreurs en mode exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {
        echo "Échec de la connexion à la base de données: " . $e->getMessage();
    }

?>
