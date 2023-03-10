<?php
if(!isset($_SESSION['grille']) || $_GET['case'] == 0){
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
            if($_SESSION['tourJoueur'] == true){
                echo '<img class="imgPions" src="Images/cross.png" alt="Croix">';
                $_SESSION['grille'][$rang - 1] = 1;
                checkVictory();
                $_SESSION['tourJoueur'] = false;
            }
            else{
                echo '<img class="imgPions" src="Images/circle.png" alt="Cercle"';
                $_SESSION['grille'][$rang - 1 ] = 2;
                checkVictory();
                $_SESSION['tourJoueur'] = true;
            }
            
        }
        elseif ($_SESSION['grille'][$rang - 1] != 0 ) {

            if($_SESSION['grille'][$rang - 1] == 1){
                
                echo '<img class="imgPions" src="Images/cross.png" alt="Croix">';
                
            }
            else{

                echo '<img class="imgPions" src="Images/circle.png" alt="Cercle">';                      
            }
        }       
        echo '</tr>';
        echo '</td>'; 
    }
}