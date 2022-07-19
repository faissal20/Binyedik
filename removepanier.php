<?php 
    session_start();
    if(isset($_GET['id'])){
       $idToRemove = $_GET['id'];
       unset($_SESSION['panier'][$idToRemove]);
       echo 'hi';
    }
    else{
        echo 'error';
    }

?>