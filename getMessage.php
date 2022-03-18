<?php
$alert=false;
 if(isset($_GET['error'])){
    $type='error';
    $alert=true;
    if($_GET['error'] == 'nameLength'){
        $message= "Nom d'utilisateur trop court.";
    } else if($_GET['error'] == 'passLength'){
        $message= "Mot de passe trop court.";
    } else if($_GET['error'] == 'empty'){
        $message= 'Formulaire incomplet, recommencez.';
    } else if($_GET['error'] == 'logout'){
        $message= 'Erreur lors de la déconnection.';
    } else if($_GET['error'] == 'lineNameLength'){
        $message= "Nom de la ligne trop long.";
    } else if($_GET['error'] == 'terminusALength'){
        $message= "Nom de la ligne de départ trop court(6 minimum) ou trop long(255 maximum).";
    } else if($_GET['error'] == 'terminusBLength'){
        $message= "Nom de la ligne d'arrivée trop court(6 minimum) ou trop long(255 maximum).";
    } else if($_GET['error'] == 'unknown'){
        $message= "Erreur inconnu, contactez un membre de l'équipe.";
    } else if($_GET['error'] == 'dupeLine'){
        $message= "La ligne que vous essayez de créer éxiste déjà.";
    } else if($_GET['error'] == 'type'){
        $message= "Erreur avec le choix du type de transport.";
    }
}
if(isset($_GET['success'])){
    $type='success';
    $alert=true;
    if($_GET['success'] == 'login'){
        $message= "Bienvenue ".$_SESSION['user']." , vous êtes désormais inscrit.";
    } else if($_GET['success'] == 'logout'){
        $message= "Vous vous êtes déconnectés.";
    } else if($_GET['success'] == 'empty'){
        $message= 'Formulaire incomplet, recommencez.';
    } else if($_GET['success'] == 'lineAdded'){
        $message= "Ligne de train ajouté.";
    } else if($_GET['success'] == 'modification'){
        $message= "Votre modification a bien été enregistrer.";
    } else if($_GET['success'] == 'lineChanged'){
        $message= "Ligne de train.";
    } else if($_GET['success'] == 'delete'){
        $message= "Suppression effectué.";
    }
}
?>