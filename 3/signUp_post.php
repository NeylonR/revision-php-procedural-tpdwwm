<?php
session_start();
if(isset($_POST) && !empty($_POST)){
    if(in_array('', $_POST)){
        header('location:index.php?error=empty');
    }else{
        $userName = trim(htmlspecialchars($_POST['userName']));
        $password = trim(htmlspecialchars($_POST['password']));

        if(strlen($userName) < 3){
            header('location:index.php?error=nameLength');
            exit();
        }
        if(strlen($password) < 6){
            header('location:index.php?error=passLength');
            exit();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['user']=$userName;
        header('location:index.php?success=login');
        exit();
    }
}

?>