<?php 
require 'config.php';
try{
    $sqlSelect = 'SELECT * FROM lignes LEFT JOIN type ON lignes.type_transport_id = type.type_id';
    $reqSelect = $db->query($sqlSelect);
    $fetchAll = $reqSelect->fetchAll();
}catch(PDOException $e){
    echo 'erreur : '.$e;
} 
if(empty($fetchAll)){
    echo '<tr><td colspan="5"><h2>The databse is empty.</h2></td></tr>';
}
displayTable($fetchAll);
?>