<?php 
require 'config.php';
$lineId = intval(htmlspecialchars($_GET['id']));
if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:8/lineEdit.php?error=empty&id='.$lineId.'');
    }else{
        $terminus_a = htmlspecialchars($_POST['terminus_a']);
        $terminus_b = htmlspecialchars($_POST['terminus_b']);
        $lineName = htmlspecialchars($_POST['lineName']);

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

        foreach($fetchAll as $line){
            if(strtolower($line['nom']) == strtolower($lineName)){
                header('location:8/lineEdit.php?error=dupeLine&id='.$lineId.'');
                exit(); 
            }
        }

        try{
            $sqlUpdate = 'UPDATE lignes SET nom = :nom, terminus_a = :terminus_a, terminus_b = :terminus_b WHERE id = :id';
            $reqUpdate = $db->prepare($sqlUpdate);
            $reqUpdate->execute(array(
                'nom'=>$lineName,
                'id'=>$lineId,
                'terminus_a'=>$terminus_a,
                'terminus_b'=>$terminus_b
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