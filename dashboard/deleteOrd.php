<?php
    require './../dbcon.php';
    require 'auth.php';
    if(isset($_GET['user']) && isset($_GET['userl'])){
        $sql = "DELETE FROM orders WHERE user_f ='".$_GET['user']."' AND user_l='".$_GET['userl']."'";
        if($con->query($sql)){
           header('location: ./index.php'); 
        }else{
           echo  $con->error;
        }
        
    }
?>