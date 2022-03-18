<?php
require '../config.php';
echo"<a href='index.php' class='return'>Retour</a>";
if(!empty($_POST['search'])){
    $lineName = trim(htmlspecialchars($_POST['search']));
    try{
        $sqlSelect = 'SELECT * FROM lignes INNER JOIN type ON lignes.type_transport_id = type.type_id WHERE nom LIKE "%":nom"%"';
        $reqSelect = $db->prepare($sqlSelect);
        $reqSelect->execute(array(
            'nom'=>$lineName
        ));
        $fetchAll = $reqSelect->fetchAll();
    }catch(PDOException $e){
        echo 'erreur : '.$e;
    } 
    if(!empty($fetchAll)){
        displayTable($fetchAll);
    } else{
        echo "<tr><td colspan='5' style='text-transform:none'><h3>Nothing match to your research : '".$_POST['search']."'</h3></td></tr>";
    } 
}else{
        echo "<tr><td colspan='5' style='text-transform:none'><h3>Invalid search.".$_POST['search']."</h3></td></tr>";
    }
?>