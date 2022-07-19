<?php
    session_start();
    require 'dbcon.php';
    $qnt = 1;
    if(isset($_GET['product'])){
        $id = $_GET['product'];
        $sql = "SELECT * FROM produit WHERE id='".$id."'";
        $result = $con->query($sql);
        while($value = $result->fetch_assoc()){
            $_SESSION['panier'][$id] = array('id' => $value['id'],'name' => $value['name'], 'prix' => $value['prix'], 'livraison' => $value['livraison'], 'image' => $value['image'],'qnt' => $qnt);
        }
        header('location: panier.php');
    }
?>