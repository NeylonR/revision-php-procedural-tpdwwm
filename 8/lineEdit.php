<?php 
require '../_navbar.php';
require '../config.php';
$lineId = intval(htmlspecialchars($_GET['id']));

try{
    $sqlSelect = 'SELECT * FROM lignes WHERE id = :id';
    $reqSelect = $db->prepare($sqlSelect);
    $reqSelect->execute(array(
        'id'=>$lineId
    ));
    $fetch = $reqSelect->fetch();
}catch(PDOException $e){
    echo 'erreur : '.$e;
}
?>

<?php 
    require '../getMessage.php';
    if($alert){?>
    <h4 class="<?= $type ?>"><?= $message ?></h4>
    <?php } ?>
<form action="../lineEdit_post.php?id=<?php echo $lineId ?>" method="POST">
    <label for="lineName">Nom de ligne</label>
    <input required type="text" name="lineName" id="lineName" value="<?= $fetch['nom']?>">

    <label for="terminus_a">Ligne de départ</label>
    <input required type="text" name="terminus_a" id="terminus_a" value="<?= $fetch['terminus_a']?>">

    <label for="terminus_b">Ligne d'arrivée</label>
    <input required type="text" name="terminus_b" id="terminus_b" value="<?= $fetch['terminus_b']?>">

    <button type="submit">Modifier</button>
</form>