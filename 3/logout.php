<?php 
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
    header("location:index.php?success=logout");
    exit();
}
header('location:index.php?error=logout');
exit();
?>