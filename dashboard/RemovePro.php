<?php
    require './../dbcon.php';
    require 'auth.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'SELECT image FROM produit WHERE id = "'.$id.'"';
        $res = $con->query($sql);
        $file = $res->fetch_assoc();
        if(file_exists($file['image'])){
            unlink($file['image']);
        }
        $sql = 'DELETE FROM produit WHERE id = "'.$id.'"';
        echo $id;
        if($con->query($sql)){
            header('location: index.php');
        }
        else {
            echo 'error : '. mysqli_error($con);
        }
    }
?>