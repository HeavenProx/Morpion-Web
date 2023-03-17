<?php 
    session_start();
     
?>
<form method="post" action="test.php">
    <p>Test Victoire</p>
    <div>
        <input type="submit" name="victoire"  value="Victoire">
    </div>
</form>

<form method="post" action="test.php">
    <p>Test Null</p>
    <div>
        <input type="submit" name="null"  value="Null">
    </div>
</form>

<form method="post" action="test.php">
    <p>Test Défaite</p>
    <div>
        <input type="submit" name="defaite"  value="Défaite">
    </div>
</form>

<?php
    // Récupération des données du formulaire de victoire
    if(isset($_POST['victoire'])){
        
        $Victoire = $_SESSION['scoreTotal'];
        $Victoire = $Victoire + 1;
        $userName = $_SESSION['pseudo'];
        include 'bdd.php';
        // Préparation de la requête de mise a jour des données
        $data = array($Victoire, $userName);
        $stmt = $conn->prepare("UPDATE utilisateur SET scoreTotal = ? WHERE pseudo = ?");
        $stmt->execute($data);
        echo "Victoire vous avez maintenant ".$Victoire;

        // refresh score
        $data = array($userName);
        $stmt = $conn->prepare("SELECT scoreTotal FROM utilisateur WHERE pseudo = ?");
        $stmt->execute($data);
        $utilisateur = $stmt->fetch();
        $_SESSION['scoreTotal'] = $utilisateur['scoreTotal'];
    }

    
?>