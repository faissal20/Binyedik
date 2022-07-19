<?php
    require './../dbcon.php';
    require 'auth.php';
    if(isset($_GET['user']) && isset($_GET['userl'])){
        $sql = "UPDATE orders SET status = 'livré' WHERE user_f ='".$_GET['user']."' AND user_l='".$_GET['userl']."'";
        if($con->query($sql)){
           header('location: ./order.php'); 
        }else{
           echo  $con->error;
        }
        
    }
?>