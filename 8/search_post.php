<?php
require '../config.php';
echo"<a href='index.php' class='return'>Retour</a>";
if(!empty($_POST['search'])){
    $lineName = trim(htmlspecialchars($_POST['search']));
    try{
        $sqlSelect = 'SELECT * FROM lignes WHERE nom LIKE "%":nom"%"';
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
        echo "<tr><td colspan='4'><h3>Nothing match to your research : '".$_POST['search']."'</h3></td></tr>";
    } 
}else{
        echo "<tr><td colspan='4'><h3>Invalid search.".$_POST['search']."'</h3></td></tr>";
    }
?>