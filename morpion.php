<?php session_start(); ?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">

        <div class="row text-center" >
            <div class="page col-m-12" >
                <section class="">
                    <div class="row"> <!-- div qui englobe l'espace de jeu environnementTable-->
                        <div class="col-sm-7">
                            <table class="tableJeu">
                            <?php

                                $_GET['reset'] == 1;
                
                                if(!isset($_SESSION['grille']) || $_GET['reset'] == 1){
                                    $_SESSION['grille'] =array(
                                        0,0,0,
                                        0,0,0,
                                        0,0,0);
                                }

                                $_SESSION['scoreJoueur'] = 0;
                                $_SESSION['scoreBot'] = 0;
                                $_SESSION['tourJoueur'] = 1;
                
                                $joueur1= 1;
                                $bot = 2;
                                $click = $_GET['case'];            

                                $rang = 0;

                                for($ligne=0; $ligne <=2 ; $ligne++){
                                    echo '<tr>';
                                    for($colonne=0; $colonne <=2 ; $colonne++){

                                        $rang++ ;

                                        echo ' <td class="case" > 
                                        <a href="?case='.$rang.'">';

                                        if ( $click == $rang and $_SESSION['grille'][$rang - 1]==0){
                                            echo '<img class="imgPions" src="Images/croix.png" alt="Croix">';
                                            $_SESSION['grille'][$rang - 1] = 1;
                                        }
                                        else if ($_SESSION['grille'][$rang - 1] != 0 ) {
                                            if($_SESSION['grille'][$rang - 1] == 1){
                                                echo '<img class="imgPions" src="Images/croix.png" alt="Croix">';
                                            }
                                                   
                                            else{
                                                echo '<img class="imgPions" src="Images/rond.png" alt="Croix">';
                                            }
                                                                                        }                  
                                        if($_SESSION['grille'][0] == 1){echo '<img src="Images/croix.png" alt="Croix">';}
                                            elseif($_SESSION['grille'][0] == 2){echo '<img src="Images/rond.png" alt="Circle">';} 
                                            else echo " "; 

                                        echo '</a></td>';
                                    }
                                    echo '</tr>';
                                }
                                var_dump($_SESSION['grille']);
                                ?> 
                            </table>
                        </div>

                        <!-- Implementation coté texte -->
                        <div id="cotetexte" class="col-sm-5 text-center">

                            <div id="texttopmorpion">
                               
                                <h3>Jeu du morpion</h3>  
                                <div class="boutonFermer">
                                    <a href="accueil.php"><img src="Images/boutonfermer.png" alt=""></a>
                                </div>

                                <p>Joueur <?php echo $_SESSION['tourJoueur']; ?> c'est ton tour</p>

                                <div class="principejeu borderAngle">
                                    <h5>Le principe : </h5>
                                    <p>Chaque joueur a son propre symbole, la croix ou le rond. Chaque joueur pose sont symbole tour à tour.</p>
                                </div>

                                <div class="gagnerjeu borderAngle">
                                    <h5>Comment gagner ?</h5>
                                    <p>Le premier joueur a aligner 3 symboles identiques gagne la partie et donc 1 point. Si égalité il garde le même nombre de point.</p>
                                </div>

                                <!-- Record et image sur le coté  -->
                                <div class="recordimg container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 text-center record">
                                            <div class="recordperso borderAngle">
                                                <h5>Record personnel :</h5>
                                                <p>23 win</p>
                                            </div>
                                            <div class="recordserveur borderAngle">
                                                <h5>Record sur le serveur</h5>
                                                <p>37 win - Hugo</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 exemplegagne">
                                            <img src="Images/exemplegagne.png" alt="">
                                        </div>                           
                                    </div>
                                </div>
                                <!-- Bouton rejouer -->
                                <a href="morpion.php"><img src="Images/boutonrejouer.png" alt=""></a>
                                <button type="button" 
                                    onclick="alert('Report generation has started.');">Réessayer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- <script>alert("Vous avez gagné ! 1 point est ajouté à votre solde.")</script>
                    <script>alert("Vous avez perdu ! 1 point est retiré de votre solde.")</script>-->
                </div>  
            </div>
        </div>
    </body>
</html>