<?php
    require 'auth.php';
    unset($_SESSION['user']);
    header('location: login.php');
?>