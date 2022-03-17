<?php
require '../config.php';
try{
    $sqlSelect = 'SELECT * FROM lignes';
    $reqSelect = $db->query($sqlSelect);
    $fetchAll = $reqSelect->fetchAll();
}catch(PDOException $e){
    echo 'erreur : '.$e;
}

if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:index.php?error=empty');
    }else{
        $lineName = trim(htmlspecialchars($_POST['lineName']));
        $terminus_a = trim(htmlspecialchars($_POST['terminus_a']));
        $terminus_b = trim(htmlspecialchars($_POST['terminus_b']));

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

        foreach($fetchAll as $line){
            if(strtolower($line['nom']) == strtolower($lineName)){
                header('location:index.php?error=dupeLine');
                exit(); 
            }
        }

        try{
            $sql = "INSERT INTO lignes (nom, terminus_a, terminus_b) VALUES (:nom, :terminus_a, :terminus_b)";
            $req = $db->prepare($sql);
            $req->execute(array(
                'nom'=>$lineName,
                'terminus_a'=>$terminus_a,
                'terminus_b'=>$terminus_b
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