<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Exercice 2</title>

</head>
<?php 
if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:index.php?error=empty');
    }else{
        $brand = trim(htmlspecialchars($_POST['brand']));
        $model = trim(htmlspecialchars($_POST['model']));
        $color = trim(htmlspecialchars($_POST['color']));
        $km = intval(trim(htmlspecialchars($_POST['km'])));
        $year = intval(trim(htmlspecialchars($_POST['year'])));
        $price = intval(trim(htmlspecialchars($_POST['price'])));
    }
}
?>
<body>
    <h1>Informations de votre voiture.</h1>

    <ul>
        <li>Marque : <?= $brand ?></li>
        <li>Modèle : <?= $model ?></li>
        <li>Couleur : <span id="colorCar" style="background-color:<?= $color ?>"></span></li>
        <li>Kilometrage : <?= $km ?></li>
        <li>Année : <?= $year ?></li>
        <li>Prix : <?= $price ?>Є</li>
    </ul>
</body>

</html>