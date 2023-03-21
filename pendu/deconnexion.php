<?php
    session_start();

    $_SESSION['nb_vie'] = 1 ;
    $_SESSION['resultat'] = null;
    $_SESSION['badLetter'] = null;
    $_SESSION['goodLetter'] = null;
    $_SESSION['mot_a_deviner'] = null;


    $_SESSION['lettres']['a'] = 1;
    $_SESSION['lettres']['b'] = 1;
    $_SESSION['lettres']['c'] = 1;
    $_SESSION['lettres']['d'] = 1;
    $_SESSION['lettres']['e'] = 1;
    $_SESSION['lettres']['f'] = 1;
    $_SESSION['lettres']['g'] = 1;
    $_SESSION['lettres']['h'] = 1;
    $_SESSION['lettres']['i'] = 1;
    $_SESSION['lettres']['j'] = 1;
    $_SESSION['lettres']['k'] = 1;
    $_SESSION['lettres']['l'] = 1;
    $_SESSION['lettres']['m'] = 1;
    $_SESSION['lettres']['n'] = 1;
    $_SESSION['lettres']['o'] = 1;
    $_SESSION['lettres']['p'] = 1;
    $_SESSION['lettres']['q'] = 1;
    $_SESSION['lettres']['r'] = 1;
    $_SESSION['lettres']['s'] = 1;
    $_SESSION['lettres']['t'] = 1;
    $_SESSION['lettres']['u'] = 1;
    $_SESSION['lettres']['v'] = 1;
    $_SESSION['lettres']['w'] = 1;
    $_SESSION['lettres']['x'] = 1;
    $_SESSION['lettres']['y'] = 1;
    $_SESSION['lettres']['z'] = 1;

    $_SESSION['bouton'] = 0;


    header('Location: index.php');
?>