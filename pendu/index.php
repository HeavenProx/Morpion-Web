<?php
    session_start();
    $nb_vie = 1;

    if (!isset($_SESSION['nb_vie'])) {
        $resultat = null;
        $badLetter = null;
        $goodLetter = "Cliquer sur une difficulté";
        $mot_a_deviner = null;

        $_SESSION['nb_vie'] = $nb_vie;
        $_SESSION['resultat'] = $resultat;
        $_SESSION['badLetter'] = $badLetter;
        $_SESSION['goodLetter'] = $goodLetter;
        $_SESSION['mot_a_deviner'] = $mot_a_deviner;
        
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
    
    }
    if (isset($_POST['test']))  $_SESSION['lettres'][$_POST['test']] = 1;

    if (isset($_POST['difficulte'])) {
        include 'traitement.php';
        include 'start.php';
    }
?>

<?php
    include 'BddConnect.php';
?>


<!doctype html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jeu du pendu</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center custom-line">
                <div class="col-10 txtTitre fs-1 mb-5">Le Pendu</div>
            </div>

            <div class="row justify-content-center custom-line mt-5">
                <div class="col-6">
                    <div class="  border-5 block">
                        <div class='row justify-content-around '>

                            <!-- Bouton de difficulté -->
                            <form action="index.php" method="post">
                                <input type="submit" class="btn success button" name="difficulte" value="Facile"<?php if ($_SESSION['bouton'] == '1') echo "disabled"; ?>>
                                <input type="submit" class="btn warning button" name="difficulte" value="Moyen"<?php if ($_SESSION['bouton'] == '1') echo "disabled"; ?>>
                                <input type="submit" class="btn danger button" name="difficulte" value="Difficile"<?php if ($_SESSION['bouton'] == '1') echo "disabled"; ?>>
                            </form>
                            <!-- Fin bouton de difficulté -->

                            <div class="container text-center">
                                <form action="" method="post" class="form-example">
                                    <!-- clavier virtuel -->
                                    <div class="row justify-content-center">

                                        <!-- Première ligne du clavier virtuel -->
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="a" class="btn marj " <?php if ($_SESSION['lettres']['a'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="z" class="btn marj " <?php if ($_SESSION['lettres']['z'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="e" class="btn marj " <?php if ($_SESSION['lettres']['e'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="r" class="btn marj " <?php if ($_SESSION['lettres']['r'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="t" class="btn marj " <?php if ($_SESSION['lettres']['t'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="y" class="btn marj " <?php if ($_SESSION['lettres']['y'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="u" class="btn marj " <?php if ($_SESSION['lettres']['u'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="i" class="btn marj " <?php if ($_SESSION['lettres']['i'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="o" class="btn marj " <?php if ($_SESSION['lettres']['o'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="p" class="btn marj " <?php if ($_SESSION['lettres']['p'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <!-- Fin de la première ligne du clavier virtuel -->
                                    </div>

                                    <div class="row justify-content-center">

                                        <!-- Seconde ligne du clavier virtuel -->
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="q" class="btn marj " <?php if ($_SESSION['lettres']['q'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="s" class="btn marj " <?php if ($_SESSION['lettres']['s'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="d" class="btn marj " <?php if ($_SESSION['lettres']['d'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="f" class="btn marj " <?php if ($_SESSION['lettres']['f'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="g" class="btn marj " <?php if ($_SESSION['lettres']['g'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="h" class="btn marj " <?php if ($_SESSION['lettres']['h'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="j" class="btn marj " <?php if ($_SESSION['lettres']['j'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="k" class="btn marj " <?php if ($_SESSION['lettres']['k'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="l" class="btn marj " <?php if ($_SESSION['lettres']['l'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="m" class="btn marj " <?php if ($_SESSION['lettres']['m'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <!-- Fin de la seconde ligne du clavier virtuel -->
                                    </div>

                                    <div class="row justify-content-center">

                                        <!-- Troisième ligne du clavier virtuel -->
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="w" class="btn bg" <?php if ($_SESSION['lettres']['w'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="x" class="btn bg" <?php if ($_SESSION['lettres']['x'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="c" class="btn bg" <?php if ($_SESSION['lettres']['c'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="v" class="btn bg" <?php if ($_SESSION['lettres']['v'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="b" class="btn bg" <?php if ($_SESSION['lettres']['b'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <div class="col-1 px-0">
                                            <input type="submit" name="test" id="test" value="n" class="btn bg" <?php if ($_SESSION['lettres']['n'] == '1') echo "disabled"; ?>>
                                        </div>
                                        <!-- Fin de la troisième ligne du clavier virtuel -->

                                    </div>
                                    <!-- Fin du clavier virtuel -->

                                    <!-- Boutton reset -->
                                    <!-- <a class="btn marj " href="deconnexion.php" role="button">Deconnexion</a> -->
                                
                                    <!-- Ajout des lettres utilisés dans $_SESSION['resultat'] -->
                                    <?php
                                        if (isset($_POST['test'])) {
                                            if (isset($_POST['historique'])) {
                                                $_SESSION['resultat'] = $_POST['historique'] . $_POST['test'];
                                            } else {
                                                $_SESSION['resultat'] = $_POST['test'];
                                            }

                                        ?>
                                            <input type="hidden" name="historique" value="<?= $_SESSION['resultat']; ?>" />
                                        <?php
                                        }
                                    ?>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    if (isset($_SESSION['mot_a_deviner']) == false)
                    {
                        $_SESSION['goodLetter'] = "Cliquer sur une difficulté";
                    }
                    else 
                    {
                        $_SESSION['bouton'] = 1;
                        $findLetter = $_SESSION['mot_a_deviner'];
                        $find = false;
                        
                        // Initialisation de la variable qui contiendra les bonnes lettres
                        if ($_SESSION['goodLetter'] == "Cliquer sur une difficulté") {
                            if (strlen($_SESSION['goodLetter']) != strlen($findLetter)) {
                                $_SESSION['goodLetter'] = null;
                                for ($i = 0; $i < strlen($findLetter); $i++) {
                                    $_SESSION['goodLetter'] = $_SESSION['goodLetter'] . "-";
                                }
                            }
                        }

                        if (isset($_SESSION['resultat'])) {

                            // Verification de la lettre choisie
                            for ($i = 0; $i < strlen($findLetter); $i++) {
                                if ($findLetter[$i] == $_SESSION['resultat'][strlen($_SESSION['resultat']) - 1]) {
                                    $find = true;
                                }
                            }

                            // Evènement en cas de mauvaise lettre choisie
                            if ($find == false) {
                                $_SESSION['nb_vie'] = $_SESSION['nb_vie'] + 1;
                            }

                            // Evènement en cas de bonne lettre choisie
                            elseif ($find == true) {
                                for ($i = 0; $i < strlen($findLetter); $i++) {

                                    if ($_SESSION['resultat'][strlen($_SESSION['resultat']) - 1] == $findLetter[$i]) {

                                        $_SESSION['goodLetter'] = substr_replace($_SESSION['goodLetter'], $_SESSION['resultat'][strlen($_SESSION['resultat']) - 1], $i, 1);
                                    }
                                }
                            }
                        }
                    }
                ?>   

                <!-- Affichage de l'image du pendu -->
                <div class="col-6">
                    <img src="Images/pendu/LePendu<?php echo $_SESSION['nb_vie']; ?>V.png" />
                </div>
            </div>
        </div>

        <div class="row justify-content-center custom-line">
            <div class="col-sm-10 txtTitre border border-1">
                    <!-- Affichage des lettres trouvés -->
                    <?php
                    if (isset($_SESSION['goodLetter'])) {
                        ?>
                        <p class="fs-1 mx-auto"><?php echo $_SESSION['goodLetter'];?></p>
                        <?php
                    }
                    ?>

                <?php
                
                if (isset($findLetter)){
                    // Evenement en cas de partie gagné
                    if ($_SESSION['goodLetter'] == $findLetter) {
                    ?>
                        <!-- Pop-up fin de partie win -->
                        <script>
                            window.onload = function() {
                                var overlay = document.createElement('div');
                                overlay.setAttribute('id', 'overlay');
                                document.body.appendChild(overlay);

                                var popup = document.createElement('div');
                                popup.setAttribute('id', 'popup');
                                overlay.appendChild(popup);

                                var message = document.createElement('p');
                                message.innerText = 'Bravo, vous avez gagné !';
                                popup.appendChild(message);

                                var relancerButton = document.createElement('button');
                                relancerButton.innerText = 'Relancer le jeu';
                                popup.appendChild(relancerButton);

                                var quitterButton = document.createElement('button');
                                quitterButton.innerText = 'Quitter le jeu';
                                popup.appendChild(quitterButton);

                                relancerButton.addEventListener('click', function() {
                                    document.location.href = 'deconnexion.php';
                                });

                                quitterButton.addEventListener('click', function() {
                                    document.location.href = 'https://google.fr';
                                });

                                overlay.style.display = 'block';
                                popup.style.display = 'block';
                            };
                        </script>
                    <?php
                    }

                    // Evenement en cas de partie perdu
                    if ($_SESSION['nb_vie'] == 10) {
                    ?>
                        <!-- Pop-up fin de partie perdu -->
                        <script>
                            window.onload = function() {
                                var overlay = document.createElement('div');
                                overlay.setAttribute('id', 'overlay');
                                document.body.appendChild(overlay);

                                var popup = document.createElement('div');
                                popup.setAttribute('id', 'popup');
                                overlay.appendChild(popup);

                                var message = document.createElement('p');
                                message.innerText = 'Ta perdu gros noobs !';
                                popup.appendChild(message);

                                var relancerButton = document.createElement('button');
                                relancerButton.innerText = 'Relancer le jeu';
                                popup.appendChild(relancerButton);

                                var quitterButton = document.createElement('button');
                                quitterButton.innerText = 'Quitter le jeu';
                                popup.appendChild(quitterButton);

                                relancerButton.addEventListener('click', function() {
                                    document.location.href = 'deconnexion.php';
                                });

                                quitterButton.addEventListener('click', function() {
                                    document.location.href = 'https://google.fr';
                                });

                                overlay.style.display = 'block';
                                popup.style.display = 'block';
                            };
                        </script>
                    <?php
                    }
                }
                ?>

            </div>
        </div>
    </body>
</html>