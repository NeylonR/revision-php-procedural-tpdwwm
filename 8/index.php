<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 8 à 11</title>
</head>
<?php require '../_navbar.php';?>
<body>
    <h1>Exercice 8 : Affichage des données de la BDD</h1>
    <p>A partir de la connexion réalisée à l'exercice 6 et des apprentissages des exercices précédents, affichez
    l'ensemble des lignes de transports disponibles dans votre base de données dans un tableau HTML. A chaque ligne
    de transport, il devra y avoir deux actions possibles dans le tableau, éditer et supprimer (Bien que non
    fonctionnelles).</p>
    <small>Il est peut-être temps de définir un mode de récupération par défaut des données par PDO afin d'éviter
    d'avoir un tableau doublé.</small>
    <p><b>Bonus : ajoutez un champ de recherche pour filtrer les résultats par leur nom (A l'aide de l'instruction LIKE
    %recherche% dans une requête SQL)</b></p>


    <form method="POST" action="index.php">
        <input type="text" name="search" id="search" placeholder="Recherche par nom de ligne.">
        
        <button type="submit">Rechercher</button>
    </form>

    <form method="POST" action="index.php">
        <div class="checkboxContainer">
            <fieldset>
                <h3>Filtrer par type de transport</h3>
                <div class="checkbox">
                    <label for="bus">Bus</label>
                    <input type="checkbox" name="bus" id="bus" value="bus">
                </div>
                <div class="checkbox">
                    <label for="metro">Metro</label>
                    <input type="checkbox" name="metro" id="metro" value="metro">
                </div>
                <div class="checkbox">
                    <label for="train">Train</label>
                    <input type="checkbox" name="train" id="train" value="train">
                </div>  
            </fieldset>
            <input type="hidden" name="filter" value="filter">
            <button type="submit">Filtrer</button>
        </div>
    </form>
    <?php 
    require '../getMessage.php';
    if($alert){?>
    <h4 class="<?= $type ?>"><?= $message ?></h4>
    <?php } ?>

    <table>
        <thead>
            <tr>
               <th>Nom de la ligne</th>
               <th>Ligne de départ</th>
               <th>Ligne d'arrivé</th>
               <th>Type de transport</th>
               <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($_POST['search'])){
                    require 'search_post.php';
                    }else if(isset($_POST['filter'])){
                        require 'filterType_post.php';
                    }else{
                        require '../displayTable.php';
                    } ?>
            <?php ;?>
        </tbody>
    </table>
</body>

</html>