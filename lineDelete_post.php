<?php 
require 'config.php';
$lineId = intval(htmlspecialchars($_GET['id']));

try{
    $sqlSelect = 'DELETE FROM lignes WHERE id = :id';
    $reqSelect = $db->prepare($sqlSelect);
    $reqSelect->execute(array(
        'id'=>$lineId
    ));
}catch(PDOException $e){
    echo 'erreur : '.$e;
}
header('location:8/index.php?success=delete');
?>