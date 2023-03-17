<!-- http://localhost/PlateformeJeux/Morpions/test.php -->
<?php session_start(); ?>
<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
        <title>test Morpion</title> 
    </head>  
    <body> 
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
                    echo 'joueur 1 commence';
                }
                else {
                    $_SESSION['tourJoueur'] = false;
                    echo 'le bot commence';
                }
            }

                $joueur1= 1;
                $bot = 2;
                $click = $_GET['case']            
        ?>
        <a class="btn btn-primary" href="duply.php?case=0">Reset</a>
        <section class="container">
            
            <div class="environnementTable"> <!-- div qui englobe l'espace de jeu -->
            <table class="tableJeu">


                <?php

                

                $rang = 0 ;
                echo '<br>RANG = '.$rang ;
                echo '<br>CLICK = '.$click ;
                

                //Action du joueur et du bot 
                //Si le joueur n'a pas eu la priorité alors un premier tour sera joué par le bot
                if ($_SESSION['tourJoueur']== false){
                    $_SESSION['grille'][moveBot($_SESSION['grille'])] = 2; 
                    var_dump($_SESSION);
                    $_SESSION['tourJoueur']= true;
                    var_dump($_SESSION);
                }
                //Le joueur joue d'abord son coup et le bot joue son coup immédiatement après 
                if ($_SESSION['grille'][$click-1]==0 && $_GET['case'] > 0){
                    
                    $_SESSION['grille'][$click-1] = 1;
                    checkVictory();
                    
                    $_SESSION['grille'][moveBot($_SESSION['grille'])] = 2; 
                    checkVictory();
                }
                
                for($ligne=0; $ligne <=2 ; $ligne++){
                    echo '<tr>';
                    for($colonne=0; $colonne <=2 ; $colonne++){

                        $rang++ ;
                        
                        echo ' <td class="case" > 
                        <a href="?case='.$rang.'">'; 

                    
                        if ($_SESSION['grille'][$rang - 1] != 0 ) {
                            if($_SESSION['grille'][$rang - 1] == 1)
                                echo '<img class="imgPions" src="Images/cross.png" alt="Croix">';                                
                            else
                                echo '<img class="imgPions" src="Images/circle.png" alt="Cercle">';

                        } 
                        
                        
                        /*if($_SESSION['grille'][0] == 1) echo '<img src="Images/cross.png" alt="Croix">';
                            elseif($_SESSION['grille'][0] == 2) echo '<img src="Images/circle.png" alt="Circle">';
                            else echo " "; */

                        echo '</a></td>';


                    }
                    
                    echo '</tr>';


                }
                echo '<pre>';
                //var_dump($_SESSION);
                echo '</pre>';

                function checkVictory(){                
                    //détéction de la victoire 1ère ligne horizontale
                    if($_SESSION['grille'][0] == $_SESSION['grille'][1] and $_SESSION['grille'][1]  ==  $_SESSION['grille'][2]){
                        if($_SESSION['grille'][1] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][1]== 2) {
                            echo "c'est perdu";
                        }
                    }
                    //detection de victoire 2eme ligne horizontale
                    elseif($_SESSION['grille'][3] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][5]){
                        if($_SESSION['grille'][4] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][4]== 2) {
                            echo "c'est perdu";
                        }

                    }
                    //detection de victoire 3 eme ligne horizontale
                    elseif($_SESSION['grille'][6] == $_SESSION['grille'][7] and $_SESSION['grille'][7]  ==  $_SESSION['grille'][8]){
                        if($_SESSION['grille'][7] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][7]== 2) {
                            echo "c'est perdu";
                        }

                    }
                    //detection de victoire premiere ligne verticale
                    elseif($_SESSION['grille'][0] == $_SESSION['grille'][3] and $_SESSION['grille'][3]  ==  $_SESSION['grille'][6]){
                        if($_SESSION['grille'][3] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][3]== 2) {
                            echo "c'est perdu";
                        }
                    }
                    //detection de victoire deuxieme ligne verticale
                    elseif($_SESSION['grille'][1] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][7]){
                        if($_SESSION['grille'][4] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][4]== 2) {
                            echo "c'est perdu" ;
                        }
                    }
                    //detection de victoire troisieme ligne verticale
                    elseif($_SESSION['grille'][2] == $_SESSION['grille'][5] and $_SESSION['grille'][5]  ==  $_SESSION['grille'][8]){
                        if($_SESSION['grille'][5] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][5]== 2) {
                            echo "c'est perdu";
                        }
                    }
                    
                    //detection de victoire diagonale gauche -> droite
                    elseif($_SESSION['grille'][0] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][8]){
                        if($_SESSION['grille'][4] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][4]== 2) {
                            echo "c'est perdu";
                        }

                    }
                    //detection de victoire diagonale droite -> gauche
                    elseif($_SESSION['grille'][2] == $_SESSION['grille'][4] and $_SESSION['grille'][4]  ==  $_SESSION['grille'][6]){
                        if($_SESSION['grille'][4] == 1){
                            echo "c'est gagné";                            
                        }
                        elseif($_SESSION['grille'][4]== 2) {
                            echo "c'est perdu";
                        }

                    }
                }                       
                
                function gameEnd(){
                    //fais apparaitre une petite fenetre -> joueur gagnant / point remportés / rejouer ou quitter 
                   echo '<script> alert("le joueur x a gagné") </script>';
                }

                function moveBot(){
                    $newArray = array();                                
                    for( $i = 0 ; $i < count($_SESSION['grille']); $i ++){
                        //echo $_SESSION['grille'][$i] .'-' ;
                        if($_SESSION['grille'][$i] == 0){                          
                            array_push($newArray, $i);
                            //echo 'Case '.$i.' dispo - ';
                        }
                    }
                    $rand = rand(0, count($newArray)-1);
                    //echo ($rand);
                    //var_dump($newArray);
                    $moveIndex = $newArray[$rand];
                    //echo $moveIndex;
                    return($moveIndex);
                

                }
                echo '<br>' .print_r($_SESSION['grille'] );
                    ?>
            </table>
            <p>Joueur <?php echo $_SESSION['tourJoueur']; ?> c'est ton tour</p>

            
            <?php
            /*
            //test de la grille
                if(empty($_SESSION['grille']))
                    $_SESSION['grille'] = array(
                        0,0,0,
                        0,0,0,
                        0,0,0);
            //test du joueur
                if(empty($_SESSION['scoreJoueur']))
                        $_SESSION['scoreJoueur'] = 0;
            //test du bot
                if(empty($_SESSION['scoreBot']))
                        $_SESSION['scoreBot'] = 0;
            //test du tour de jouer
                if(empty($_SESSION['tourJoueur']))
                        $_SESSION['tourJoueur'] = 0;

            //récupération de la case cliquée           
                if(!empty($_GET['case'])){
                    $caseAJouer = $_GET['case'] - 1; //décrémentation de 1 car le tableau commence à 0
                }
            //test case libre ou non ?
                if($_SESSION['grille'][$caseAJouer] == 0){
                    $_SESSION['grille'][$caseAJouer] = $_SESSION['tourJoueur'];                    
                }

            //test de condition de victoire à optimiser
                if(
                    ($_SESSION['grille'][0] == $_SESSION['grille'][1]) && 
	                ($_SESSION['grille'][1] == $_SESSION['grille'][2]) && 
	                ($_SESSION['grille'][2] == $tourJoueur)){
		                ++$_SESSION[$score];

                        //réinitialisation du tableau
                        $_SESSION['grille'] = array(
                            0,0,0,
                            0,0,0,
                            0,0,0);
                        $_SESSION['tourJoueur'] = 1;

                    } elseif(
                        ($_SESSION['grille'][3] == $_SESSION['grille'][4]) && 
                        ($_SESSION['grille'][4] == $_SESSION['grille'][5]) && 
                        ($_SESSION['grille'][5] == $tourJoueur)){
		                    ++$_SESSION[$score];

                            //réinitialisation du tableau
                        $_SESSION['grille'] = array(
                            0,0,0,
                            0,0,0,
                            0,0,0);
                            $_SESSION['tourJoueur'] = 1;
                    }

                    */

            ?>

                
    </body>