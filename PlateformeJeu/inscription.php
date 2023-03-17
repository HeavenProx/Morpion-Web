<!-- Ouverture et fermeture du header Ajout de bootstrap et de la feuille de style et ouverture de la balise Body --> 
<?php
    include 'bootstrapOuverture.php';
?>



<!-- Formulaire Inscription -->

<div class="container">
    <form method="post" action="inscription.php">
    <div>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required/>
    </div>
    <div>
            <input type="email" id="mail" name="mail" placeholder="Email"required/>
    </div>
    <div>
            <input type="password" id="password" name="password" placeholder="Mot De Passe"required/>
    </div>
    <div>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmation MDP"required/>
    </div>
    <div>
            <input type="submit" name="inscription" value="S'inscrire">
    </div>
    </form> 
    <?php
        // Récupération des données du formulaire
        if(isset($_POST['inscription'])){
            /* récupération des valeurs */
            $pseudo = $_POST['pseudo'];
            
            $email = $_POST['mail'];
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Veuillez entrer une adresse email valide";
                exit;
            }
            
            $piecesTotal = 10;
            $piecesMax = 10;
            $scoreTotal = 0;
            $scoreMax = 0;
            $derniereConnexion = date('d/m/y h:i:s');
            $nbPartieJouer = 0;
            $nbPartieGagnee = 0;
            $nbSuiteVictoires = 0;
            $statue = "Membre";
            $dateInscription = date('d/m/y h:i:s');
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];


            // Compare les mots de passe encodés
            if ($password != $password_confirm) {
                echo "Les mots de passe ne correspondent pas";
                exit;
            }

            // Connexion à la base de données
            include 'bdd.php';
            
            $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE pseudo = ? or mail = ?");
            $stmt->bindParam(1, $pseudo);
            $stmt->bindParam(2, $email);
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
                echo "Cette adresse email ou ce nom d'utilisateur est déjà utilisé.";
                exit;
            }
            
            else{
                // Cryptage du mot de passe
                $options = ['cost' => 12,];
                $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

                // Préparation de la requête d'insertion des données
                $data = array($pseudo, $email, $password_hashed, $piecesTotal, $piecesMax, $scoreTotal, $scoreMax, $derniereConnexion, $nbPartieJouer, $nbPartieGagnee, $nbSuiteVictoires, $statue, $dateInscription); 
                $stmt = $conn->prepare("INSERT INTO utilisateur (pseudo, mail, motDePasse, piecesTotal, piecesMax, scoreTotal, scoreMax, derniereConnexion, nbPartiesJouees, nbPartiesGagnees, nbSuiteVictoires, statut, dateInscription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute($data);
                echo "Merci de votre inscription";
            }
        }
    ?>
</div>


<!-- Fermeture des balise Body et HTML -->
<?php
    include 'bootstrapFermeture.php';
?>