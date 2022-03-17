<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<?php require '../_navbar.php'; ?>
<body>
    <h1>Exercice 1 : Identité</h1>
    <p>A l'aide d'un formulaire HTML et de PHP, affichez les données qu'un utilisateur aura rempli dans un formulaire
        via une requête POST SUR LA MEME PAGE</p>
    <small>Ne pas oublier de préparer le cas où les données sont non renseignées et/ou n'ont pas encore pu être
        remplies</small>
    <ul>
        <li>Nom</li>
        <li>Prénom</li>
        <li>Genre</li>
        <li>Adresse</li>
        <li>Ville</li>
        <li>Code Postal</li>
    </ul>

    <form action="index.php" method="POST">
        <label for="name">Votre nom</label>
        <input type="text" name="name" id="name" required>

        <label for="firstname">Votre prenom</label>
        <input type="text" name="firstname" id="firstname" required>

        <label for="gender">Votre genre</label>
        <select name="gender" id="gender" required>
            <option value="">-Choisir un genre-</option>
            <option value="femme">Femme</option>
            <option value="homme">Homme</option>
            <option value="autre">Autre</option>
        </select>

        <label for="adress">Votre adresse</label>
        <input type="text" name="adress" id="adress" required>

        <label for="city">Votre ville</label>
        <input type="text" name="city" id="city" required>

        <label for="postalCode">Votre code postal</label>
        <input type="number" name="postalCode" id="postalCode" required>

        <button>Envoyer.</button>
    </form>
    <?php 
    if(isset($_POST) && !empty($_POST)){
        if(in_array('', $_POST)){
            echo'<h2 id="error">Veuillez remplir tous les champs.</h2>';
        }else{
            $name = trim(htmlspecialchars($_POST['name']));
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $gender = trim(htmlspecialchars($_POST['gender']));
            $adress = trim(htmlspecialchars($_POST['adress']));
            $city = trim(htmlspecialchars($_POST['city']));
            $postalCode = intval(trim(htmlspecialchars($_POST['postalCode'])));
            ?>
    <h2>Vos Informations :</h2>
    <ul>
        <li>Nom : <?= $name?></li>
        <li>Prenom : <?= $firstname ?></li>
        <li>Genre : <?= $gender ?></li>
        <li>Adresse : <?= $adress ?></li>
        <li>Ville : <?= $city ?></li>
        <li>Code postal : <?= $postalCode ?></li>
    </ul>
    <?php }
    } ?>
</body>

</html>