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
            <div class="page col-m-12 center" >
                <div class="row zoneRow"> <!-- div qui englobe l'espace de jeu environnementTable-->
                    <div class="col-sm-7">
                        <table class="tableJeu">
                        <?php
 
                            if(!isset($_SESSION['grille']) || $_GET['case'] == 0){
                                $_SESSION['grille'] =array(
                                    0,0,0,
                                    0,0,0,
                                    0,0,0);
                                    $_SESSION['scoreJoueur'] = 0;
                                    $_SESSION['scoreBot'] = 0;
                                    $randInt = rand(1,2);
                                    if ($randInt == 1){
                                        $_SESSION['tourJoueur'] = true;
                                        define($joueurCommence, "C'est toi qui commence");
                                    }
                                    else {
                                        $_SESSION['tourJoueur'] = false;
                                        define($botCommence, "C'est le bot qui commence");
                                    }        
                            }
                
                            $joueur1= 1;
                            $bot = 2;
                            $click = $_GET['case'];     

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
                                        if($_SESSION['tourJoueur'] == true){
                                            echo '<img class="imgPions" src="Images/croix.png" alt="Croix">';
                                            $_SESSION['grille'][$rang - 1] = 1;
                                            checkVictory();
                                            $_SESSION['tourJoueur'] = false;
                                        }
                                        else{
                                            echo '<img class="imgPions" src="Images/rond.png" alt="Cercle"';
                                            $_SESSION['grille'][$rang - 1 ] = 2;
                                            checkVictory();
                                            $_SESSION['tourJoueur'] = true;
                                        }
                                        
                                    }
                                    elseif ($_SESSION['grille'][$rang - 1] != 0 ) {
            
                                        if($_SESSION['grille'][$rang - 1] == 1){
                                            
                                            echo '<img class="imgPions" src="Images/croix.png" alt="Croix">';
                                            
                                        }
                                        else{

                                            echo '<img class="imgPions" src="Images/rond.png" alt="Cercle">';                      
                                        }
                                    }
                                }
                            }

                            checkVictory();
                            
                            //endPopUp(); 

                            function checkVictory(){                
                                if($_SESSION['grille'][0] == $_SESSION['grille'][1] and $_SESSION['grille'][1]  ==  $_SESSION['grille'][2]){
                                    if($_SESSION['grille'][1] == 1){
                                        win();    
                                        exit;                  
                                    }
                                    elseif($_SESSION['grille'][1]== 2) {
                                        lose();
                                        exit; 
                                    }
                                }
                                //detection de victoire 2eme ligne horizontale
                                elseif($_SESSION['grille'][3] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][5]){
                                    if($_SESSION['grille'][4] == 1){
                                        win(); 
                                        exit;                           
                                    }
                                    elseif($_SESSION['grille'][4]== 2) {
                                        lose();
                                        exit; 
                                    }
            
                                }
                                //detection de victoire 3 eme ligne horizontale
                                elseif($_SESSION['grille'][6] == $_SESSION['grille'][7] and $_SESSION['grille'][7]  ==  $_SESSION['grille'][8]){
                                    if($_SESSION['grille'][7] == 1){
                                        win();   
                                        exit;                        
                                    }
                                    elseif($_SESSION['grille'][7]== 2) {
                                        lose();
                                        exit; 
                                    }
            
                                }
                                //detection de victoire premiere ligne verticale
                                elseif($_SESSION['grille'][0] == $_SESSION['grille'][3] and $_SESSION['grille'][3]  ==  $_SESSION['grille'][6]){
                                    if($_SESSION['grille'][3] == 1){
                                        win();  
                                        exit;                     
                                    }
                                    elseif($_SESSION['grille'][3]== 2) {
                                        lose();
                                        exit; 
                                    }
                                }
                                //detection de victoire deuxieme ligne verticale
                                elseif($_SESSION['grille'][1] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][7]){
                                    if($_SESSION['grille'][4] == 1){
                                        win();  
                                        exit;                        
                                    }
                                    elseif($_SESSION['grille'][4]== 2) {
                                        lose();
                                        exit; 
                                    }
                                }
                                //detection de victoire troisieme ligne verticale
                                elseif($_SESSION['grille'][2] == $_SESSION['grille'][5] and $_SESSION['grille'][5]  ==  $_SESSION['grille'][8]){
                                    if($_SESSION['grille'][5] == 1){
                                        win();   
                                        exit;                         
                                    }
                                    elseif($_SESSION['grille'][5]== 2) {
                                        lose();
                                        exit; 
                                    }
                                }
                                
                                //detection de victoire diagonale gauche -> droite
                                elseif($_SESSION['grille'][0] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][8]){
                                    if($_SESSION['grille'][4] == 1){
                                        win(); 
                                        exit;                         
                                    }
                                    elseif($_SESSION['grille'][4]== 2) {
                                        lose();
                                        exit; 
                                    }
            
                                }
                                //detection de victoire diagonale droite -> gauche
                                elseif($_SESSION['grille'][2] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][6]){
                                    if($_SESSION['grille'][4] == 1){
                                        win(); 
                                        exit;                          
                                    }
                                    elseif($_SESSION['grille'][4]== 2) {
                                        lose();
                                        exit; 
                                    }
                                }
                                //header('Location:morpion.php?case=0');
                            } 

                            function win(){ //<script>alert('Vous avez gagné ! 1 point est attribué à votre compte.');</script>     
                                ?> 
                                <div class="endPopup">
                                    <h3>Bravo vous avez gagné !</h3>
                                    <h4>1 point est attribué à votre compte.</h4>
                                    <br>
                                    <h4>Voulez vous recommencer ?</h4>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form action="morpion.php?case=0">
                                                    <button class="btnRejouer">Oui</button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="accueil.php">
                                                    <button class="btnRejouer">Non</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                                       
                                </div>  
                                <?php    
                            }

                            function lose(){
                                ?> 
                                
                                <div class="endPopup">
                                    <h3>Dommage, vous avez perdu !</h3>
                                    <h4>1 point est retiré de votre compte.</h4>
                                    <br>
                                    <h4>Voulez vous recommencer ?</h4>
                                    
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <form action="morpion.php?case=0">
                                                    <button class="btnRejouer">Oui</button>
                                                </form>
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="accueil.php">
                                                    <button class="btnRejouer">Non</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <?php 
                            }
                            ?> 
                        </table>
                    </div>



                    <!-- Implementation coté texte -->
                    <div id="cotetexte" class="col-sm-5 text-center">

                        <div id="texttopmorpion">
                            
                            <h2>Jeu du morpion</h2>  
                            <div class="boutonFermer">
                                <a href="accueil.php"><img src="Images/boutonfermer.png" alt=""></a>
                            </div>

                            <h4 class="quiCommence"><u><?php 
                            if(isset($joueurCommence)){
                                echo("greg");
                            } 
                            ?></u></h4>
                            
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
                            <a href="morpion.php?case=0" onclick="alert('Vous êtes sur le point de rejouer et de remettre un point en jeu.');">
                                <img src="Images/boutonrejouer.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>