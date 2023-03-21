<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plateforme de jeu</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body id="background-index">

        <?php //include('PlateformeJeu/bdd.php'); ?>

        <div id="nav-plateforme">
            <nav class="navbar navbar-expand-sm"> 
                <div class="container-fluid">
                    <a class="navbar-brand"><i class="fa-solid fa-dragon font3em" style="color: rgba(182, 29, 29, 0.89);">Jeu.hessr</i></a>
                    <button class="navbar-toggler bg-light font2em" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto ">
                            <li class="nav-item dropdown font-et-decalage">
                                <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jeux
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="">oe</a></li>
                                    <li><a class="dropdown-item" href="">oe</a></li>
                                </ul>
                            </li>
                            <li class="nav-item font-et-decalage">
                                <a class="nav-link px-3 " href="">Contact</a>
                            </li>
                            <li class="nav-item dropdown font-et-decalage">
                                <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Info Profil</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href=""></a></li>
                                    <li><a class="dropdown-item" href=""></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Search Button-->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid "></i></button>
                </form>
            </nav>
        </div>

        <div class="choix-jeu row text-center" >
            <div class="col-m-12 center" >
                <div class="row"> 
                    <div class="col-sm-3">
                        <a href="morpion/morpion.php?case=0"><img src="Images/gameboyMorpion.png" class="gameboy" alt=""></a>
                    </div>
                    <div class="col-sm-3">
                        <a href="pendu/index.php"><img src="Images/gameboyPendu.png" class="gameboy" alt=""></a>
                    </div>
                    <div class="col-sm-3">
                        <a href=""><img src="Images/gameboyMastermind.png" class="gameboy" alt=""></a>
                    </div>
                    <div class="col-sm-3">
                        <a href=""><img src="Images/gameboyMemory.png" class="gameboy" alt=""></a>
                    </div>
                </div> 
            </div>
        </div>   


        <div id="center-button">
            <button id="bouton-connexion"><b>Se connecter pour jouer</b></button>
            <script>
                $('#bouton-connexion').click(function(){
                    $('#connexion-et-inscription').show();
                })
            </script> 
        </div>

        <div id="connexion-et-inscription">
            <div class="row text-center">
                <div class="col-m-12 center">
                    <button id="fermer-connexion">X</button>
                    <script>
                        $('#fermer-connexion').click(function(){
                            $('#connexion-et-inscription').hide();
                        })
                    </script> 
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="container">
                                <p>Inscris toi</p>
                                <form method="post" action="inscription.php">
                                <div class="champs-inscription">
                                        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required/>
                                </div>
                                <div class="champs-inscription">
                                        <input type="email" id="mail" name="mail" placeholder="Email"required/>
                                </div>
                                <div class="champs-inscription">
                                        <input type="password" id="password" name="password" placeholder="Mot De Passe"required/>
                                </div>
                                <div class="champs-inscription">
                                        <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmation MDP"required/>
                                </div>
                                <div class="champs-inscription">
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
                        </div>
                        <!--<hr id="separateur-connexion">-->
                        <div class="col-sm-6">
                            <div class="container">
                                <form method="post" action="connexion.php">
                                    <p>Connectez-vous !</p>
                                    
                                    <div class="champs-connexion">
                                        <input type="text" name="identifiant" placeholder="Pseudo ou Adresse Mail" required/>
                                    </div>

                                    <div class="champs-connexion">
                                        <input type="password" name="password" placeholder="Mot de Passe"required/>
                                    </div>

                                    <div class="champs-connexion">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>$('#connexion-et-inscription').hide();</script>
    </body>
</html>