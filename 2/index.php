<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Exercice 2</title>

</head>
<?php require '../_navbar.php'; ?>
<body>
    <h1>Exercice 2 : Voiture</h1>
    <h2>Formulaire</h2>

    <p>A l'aide d'un formulaire HTML et de PHP, affichez les données qu'un concessionnaire aura rempli dans un
        formulaire
        via une requête POST SUR UNE AUTRE PAGE : Ce formulaire contiendra un champ pour : la marque, le modèle, la
        couleur, le kilometrage, l'année et le prix. </p>
    <small>Vous appliquerez les vérifications nécessaires pour éviter les messages d'erreur</small>

    <?php 
    require '../getMessage.php';
    if($alert){?>
    <h4 class="<?= $type ?>"><?= $message ?></h4>
    <?php } ?>
    
    <form action="carInformation.php" method="POST">
        <label for="brand">Marque</label>
        <input type="text" name="brand" id="brand" required>

        <label for="model">Modèle</label>
        <input type="text" name="model" id="model" required>

        <label for="color">Couleur</label>
        <input type="color" name="color" id="color" required>

        <label for="km">Kilometrage</label>
        <input type="number" name="km" id="km" required min="1">

        <label for="year">Année</label>
        <input type="number" name="year" id="year" max="2022" min="1900" required>

        <label for="price">Prix</label>
        <input type="number" name="price" id="price" required min="1">

        <button>Envoyer.</button>
    </form>
</body>

</html>