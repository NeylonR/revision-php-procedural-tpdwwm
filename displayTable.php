<?php 
require 'config.php';
try{
    $sqlSelect = 'SELECT * FROM lignes';
    $reqSelect = $db->query($sqlSelect);
    $fetchAll = $reqSelect->fetchAll();
}catch(PDOException $e){
    echo 'erreur : '.$e;
} 
if(empty($fetchAll)){
    echo '<tr><td colspan="4"><h2>The databse is empty.</h2></td></tr>';
}
displayTable($fetchAll);
?>