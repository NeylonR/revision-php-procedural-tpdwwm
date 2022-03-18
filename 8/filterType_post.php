<?php
require '../config.php';
function fetchFilterSingle($db, $filterLabel){
    try{
    $sqlSelect = 'SELECT * FROM lignes INNER JOIN type ON lignes.type_transport_id = type.type_id WHERE label = :label';
    $reqSelect = $db->prepare($sqlSelect);
    $reqSelect->execute(array(
        'label'=>$filterLabel
    ));
    return $reqSelect->fetchAll();
    }catch(PDOException $e){
        echo 'erreur : '.$e;
    } 
}
echo"<a href='index.php' class='return'>Retour</a>";

if(!empty($_POST['bus']) || !empty($_POST['train']) || !empty($_POST['metro'])){
    if(!empty($_POST['bus'])){
        $typeBus = trim(htmlspecialchars($_POST['bus']));
        $fetchBus = fetchFilterSingle($db, $typeBus);
        displayTable($fetchBus);
    }
    if(!empty($_POST['train'])){
        $typeTrain = trim(htmlspecialchars($_POST['train']));
        $fetchTrain = fetchFilterSingle($db, $typeTrain);
        displayTable($fetchTrain);
    }
    if(!empty($_POST['metro'])){
        $typeMetro = trim(htmlspecialchars($_POST['metro']));
        $fetchMetro = fetchFilterSingle($db, $typeMetro);
        displayTable($fetchMetro);
    }
    if(isset($fetchBus) && !$fetchBus || isset($fetchTrain) &&  !$fetchTrain || isset($fetchMetro) &&  !$fetchMetro){
        echo "<tr><td colspan='6' style='text-transform:none'><h3>Invalid filter.</h3></td></tr>";
    }

}else{
        echo "<tr><td colspan='5' style='text-transform:none'><h3>You have to select atleast one filter.</h3></td></tr>";
    }
?>