<?php 
require 'config.php';
$lineId = intval(htmlspecialchars($_GET['id']));
if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:8/lineEdit.php?error=empty&id='.$lineId.'');
        exit();
    }else{
        $terminus_a = htmlspecialchars($_POST['terminus_a']);
        $terminus_b = htmlspecialchars($_POST['terminus_b']);
        $lineName = htmlspecialchars($_POST['lineName']);
        $lineType = htmlspecialchars($_POST['type']);
        if(strlen($lineName) > 255){
            header('location:8/lineEdit.php?error=lineNameLength&id='.$lineId.'');
            exit();
        }
        if(strlen($terminus_a) < 6 || $terminus_a < 255){
            header('location:8/lineEdit.php?error=terminusALength&id='.$lineId.'');
            exit();
        }
        if(strlen($terminus_b) < 6 || $terminus_b < 255){
            header('location:8/lineEdit.php?error=terminusBLength&id='.$lineId.'');
            exit();
        }

        try{
            $sqlSelectVerif = "SELECT nom FROM lignes WHERE nom = :nom AND id != :id";
            $reqSelectVerif = $db->prepare($sqlSelectVerif);
            $reqSelectVerif->execute(array(
                'nom'=>$lineName,
                'id'=>$lineId
            ));
            $resultFetchLineName = $reqSelectVerif->fetch();
        }catch(PDOException $e){
            echo 'erreur : '.$e;
        }

        if($resultFetchLineName){
            header('location:8/lineEdit.php?error=dupeLine&id='.$lineId.'');
            exit(); 
        }

        try{
            $sqlSelectLabel = "SELECT * FROM type WHERE label = :label";
            $reqSelectLabel = $db->prepare($sqlSelectLabel);
            $reqSelectLabel->execute(array(
                'label'=>$lineType
            ));
            $resultLabel = $reqSelectLabel->fetch();
        }catch(PDOException $e){
            echo 'erreur : '.$e;
        }

        try{
            $sqlUpdate = 'UPDATE lignes SET nom = :nom, terminus_a = :terminus_a, terminus_b = :terminus_b, type_transport_id = :type_transport_id WHERE id = :id';
            $reqUpdate = $db->prepare($sqlUpdate);
            $reqUpdate->execute(array(
                'nom'=>$lineName,
                'id'=>$lineId,
                'terminus_a'=>$terminus_a,
                'terminus_b'=>$terminus_b,
                'type_transport_id'=>$resultLabel['type_id']
            ));
            header('location:8/index.php?success=modification');
            exit();
        } catch(PDOException $e){
            echo "Erreur à l'insertion : " .$e;
        }
        header('location:8/lineEdit.php?error=unknown&id='.$lineId.'');
        exit();
    }
}
?>