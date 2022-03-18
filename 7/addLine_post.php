<?php
require '../config.php';
if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:index.php?error=empty');
        exit();
    }else{
        $lineName = trim(htmlspecialchars($_POST['lineName']));
        $terminus_a = trim(htmlspecialchars($_POST['terminus_a']));
        $terminus_b = trim(htmlspecialchars($_POST['terminus_b']));
        $typeLabel = trim(htmlspecialchars($_POST['type']));
        if(strlen($lineName) > 255){
            header('location:index.php?error=lineNameLength');
            exit();
        }
        if(strlen($terminus_a) < 6 || $terminus_a < 255){
            header('location:index.php?error=terminusALength');
            exit();
        }
        if(strlen($terminus_b) < 6 || $terminus_b < 255){
            header('location:index.php?error=terminusBLength');
            exit();
        }

        try{
            $sqlSelectLabel = "SELECT nom FROM lignes WHERE nom = :nom";
            $reqSelectLabel = $db->prepare($sqlSelectLabel);
            $reqSelectLabel->execute(array(
                'nom'=>$lineName
            ));
            $resultFetchLineName = $reqSelectLabel->fetch();
        }catch(PDOException $e){
            echo 'erreur : '.$e;
        }

        if($resultFetchLineName){
            header('location:index.php?error=dupeLine&id='.$lineId.'');
            exit(); 
        }

        try{
            $sqlSelectLabel = "SELECT * FROM type WHERE label = :label";
            $reqSelectLabel = $db->prepare($sqlSelectLabel);
            $reqSelectLabel->execute(array(
                'label'=>$typeLabel
            ));
            $resultLabel = $reqSelectLabel->fetch();
        }catch(PDOException $e){
            echo 'erreur : '.$e;
        }

        if(!$resultLabel){
            header('location:index.php?error=type');
            exit();
        }

        try{
            $sql = "INSERT INTO lignes (nom, terminus_a, terminus_b, type_transport_id) VALUES (:nom, :terminus_a, :terminus_b, :type_transport_id)";
            $req = $db->prepare($sql);
            $req->execute(array(
                'nom'=>$lineName,
                'terminus_a'=>$terminus_a,
                'terminus_b'=>$terminus_b,
                'type_transport_id'=>$resultLabel['type_id']
            ));
            header('location:index.php?success=lineAdded');
            exit();
        }catch(PDOException $e){
            echo 'erreur : '.$e;
        }
        header('location:index.php?error=unknown');
        exit();
    }
}

?>