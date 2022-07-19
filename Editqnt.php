
<?php
session_start();
require 'dbcon.php';
if(isset($_GET['qnt']) && isset($_GET['id'])){
        $id =$_GET['id'];
        $qnt = mysqli_escape_string($con,$_GET['qnt']);
        $_SESSION['panier'][$id]['qnt'] = $qnt;
        echo $_SESSION['panier'][$id]['qnt'];
    }
?>