<?php

// Connexion à MySQL
$bdd = mysqli_connect("localhost", "root", "");

// Vérification sur la connexion
if($bdd == false) {
    echo "Erreur. Revenez plus tard.";
    exit();
}

// Sélectionner la BDD
mysqli_select_db($bdd, "pwd_cours7");

// Requête écrite
$sql = "SELECT * 
        FROM etudiants";


// Requête envoyée 
$resultat = mysqli_query($bdd, $sql);

// Vérification des résultats
if( ! $resultat) {
    echo mysqli_error($bdd);
    exit();
}

$nb_resultats = mysqli_num_rows($resultat);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours 9 | PWD</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        if($nb_resultats > 0){
            while($entree = mysqli_fetch_assoc($resultat)){
                echo "<p>L'étudiant " .
                    $entree["prenom"] . 
                    " a " .
                    $entree["age"] .
                    " ans </p>";
            }
        }
    ?>
</body>
</html>

