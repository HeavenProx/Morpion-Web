<!-- Ouverture et fermeture du header Ajout de bootstrap et de la feuille de style et ouverture de la balise Body --> 
<?php

    session_start();
    include 'bootstrapOuverture.php';
?>

<!-- Formulaire Connexion -->

<div class="container">
    <form method="post" action="connexion.php">
        <p>Connectez-vous à votre compte</p>
        
        <div>
            <input type="text" name="identifiant" placeholder="Pseudo ou Adresse Mail" required/>
        </div>

        <div>
            <input type="password" name="password" placeholder="Mot de Passe"required/>
        </div>

        <div>
            <input type="submit" name="connexion"  value="Connexion">
        </div>
    </form>
    <?php
        if(isset($_POST['connexion'])){
            // Récupération des données du formulaire
            $mailOuPseudo = $_POST['identifiant'];
            $password = $_POST['password'];

            // Connexion à la base de données
        include  'bdd.php';
            $data = array($mailOuPseudo, $mailOuPseudo);
            $query = "SELECT * FROM utilisateur WHERE pseudo = ? or mail = ?";
            // Préparation de la requête pour récupérer les informations de l'utilisateur
            $stmt = $conn->prepare($query);
            // Exécution de la requête
            $stmt->execute($data);
            // Récupération des résultats
            $utilisateur = $stmt->fetch();
            
            if (count($utilisateur) > 0) {
                // Vérification du mot de passe
                if (password_verify($password, $utilisateur['motDePasse'])) {
                    // Connexion réussie
                    $_SESSION['pseudo'] = $utilisateur['pseudo'];
                    $_SESSION['pieces'] = $utilisateur['piecesTotal'];
                    $_SESSION['statut'] = $utilisateur['statut'];
                    $_SESSION['piecesMax'] = $utilisateur['piecesMax'];
                    $_SESSION['scoreTotal'] = $utilisateur['scoreTotal'];
                    $_SESSION['scoreMax'] = $utilisateur['scoreMax'];
                    $_SESSION['derniereConnexion'] = $utilisateur['derniereConnexion'];
                    $_SESSION['nbPartiesJouees'] = $utilisateur['nbPartiesJouees'];
                    $_SESSION['npPartiesGagnees'] = $utilisateur['nbPartiesGagnees'];
                    $_SESSION['nbSuiteVictoires'] = $utilisateur['nbSuiteVictoires'];
                    header("Location: test.php");
                } else {
                    echo "Adresse email ou mot de passe incorrect";
                }
            }
            else{
                echo "Compte non-existant";
            }
            echo " bienvenue ".$_SESSION['pseudo']." Vous disposez de ".$_SESSION['pieces']." Pieces et vous êtes un ".$_SESSION['statut']." de se site".$_SESSION['piecesMax']." ".$_SESSION['scoreTotal']
            ." ".$_SESSION['scoreMax']
            ." ".$_SESSION['derniereConnexion']
            ." ".$_SESSION['nbPartiesJouees']
            ." ".$_SESSION['npPartiesGagnees']
            ." ".$_SESSION['nbSuiteVictoires']
            ;
        }       
    ?>
</div>

<!-- Fermeture des balise Body et HTML -->
<?php
    include 'bootstrapFermeture.php';
?>