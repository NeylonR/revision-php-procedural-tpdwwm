<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7</title>

</head>
<?php require '../_navbar.php';
require '../config.php'; ?>
<body>
    <h1>Exercice 7 : Ajout simple à la BDD</h1>
    <p>A partir de la connexion réalisée à l'exercice 6 et des apprentissages des exercices précédents, utilisez un
        formulaire pour ajouter des nouvelles lignes de transport dans la base de données. Vous pourrez vous inspirer du
        réseau de transports de votre choix.</p>
    <small>Utilisez un système de bloc try/catch afin de réaliser vos opérations SQL.Sécurisez le tout avec des requêtes
        préparées.</small>
    <p><b>Bonus : Ajoutez des messages d'erreur dans le système pour renforcer l'expérience utilisateur</b></p>

    <?php 
    require '../getMessage.php';
    if($alert){?>
    <h4 class="<?= $type ?>"><?= $message ?></h4>
    <?php } ?>
    
    <form action="addLine_post.php" method="POST">
        <label for="lineName">Nom de la ligne</label>
        <input type="text" name="lineName" id="lineName" maxlength="255" >

        <label for="terminus_a">Départ</label>
        <input type="text" name="terminus_a" id="terminus_a" maxlength="255" required>

        <label for="terminus_b">Arrivée</label>
        <input type="text" name="terminus_b" id="terminus_b" maxlength="255" required>

        <button>Envoyer.</button>
    </form>
</body>

</html>