<?php
    include 'BddConnect.php'
?>
<?php
    // Vérification si un bouton a été cliqué
    if(isset($_POST['difficulte'])) {
        // Récupération de la valeur du bouton soumis
        $difficulte = $_POST['difficulte'];

        // Modification de la variable de mot à deviner en fonction du bouton cliqué
        if($difficulte == "Facile") {
            $sql = "SELECT mot FROM facile ORDER BY RAND() LIMIT 1";
            $resultat = $conn->query($sql);
            $row = $resultat->fetch(PDO::FETCH_ASSOC);
            $mot_a_deviner = $row['mot'];
            
        } elseif($difficulte == "Moyen") {
            // Code pour le niveau moyen
            $sql = "SELECT mot FROM moyen ORDER BY RAND() LIMIT 1";
            $resultat = $conn->query($sql);
            $row = $resultat->fetch(PDO::FETCH_ASSOC);
            $mot_a_deviner = $row['mot'];
        } elseif($difficulte == "Difficile") {
            // Code pour le niveau difficile
            $sql = "SELECT mot FROM difficile ORDER BY RAND() LIMIT 1";
            $resultat = $conn->query($sql);
            $row = $resultat->fetch(PDO::FETCH_ASSOC);
            $mot_a_deviner = $row['mot'];
        }

        $_SESSION['bouton'] == 1;
        $_SESSION['mot_a_deviner'] = strtolower($mot_a_deviner);
    }

?>
