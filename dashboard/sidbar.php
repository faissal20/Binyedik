<?php
    require './../dbcon.php';
    require 'auth.php';
?>
<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<link rel="stylesheet" href="./../media/logo.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Binyedik - dashboard</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-shield-alt-2'></i>
                <div class="logo_name">Sidebar</div>
            </div>
            <i class='bx bx-menu' id='btn' ></i>
        </div>
        <ul class="navlist">
            <li>
                <a href="index.php" class="link">
                <i class='bx bx-grid'></i>
                <span class="link_name">Main</span>
            </a>
            <span class="tooltip">Main</span>
            </li>
            <li>
                <a href="produit.php" class="link">
                <i class='bx bxs-store'></i>
                <span class="link_name">Produit</span>
                </a>
                <span class="tooltip">Produit</span>
            </li>
            <li>
                <a href="order.php" class="link">
                <i class='bx bx-user'></i>
                <span class="link_name">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <img src="./../media/unnamed.jpg" alt="profile_img">
                <div class="profile_details">
                    <div class="name_job">
                        <div class="name">Binydik</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
            </div>
            <a href="logout.php"><i class='bx bx-log-out' id="log_out" ></i></a>
        </div>
        <br>
    </div>
