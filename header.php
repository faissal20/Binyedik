<?php
    session_start();
    require 'dbcon.php';
    $total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="icon" href="media/logo.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>   
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="./jquery.nice-number.css">
    <title>Binyedik</title>
  
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-xm  navbar-light">
            <div class="container">
                
                <a class="btn shop-card" >
                    <i class='bx bx-shopping-bag'></i>
                </a>
                <a href="" class="navbar-brand"><img src='media/logo.jpeg' width='50px' style='border-radius: 10px; box-shadow: 0px 0px 50px white;'/></a>
            <button class="navbar-toggler">
                <span class="toggler-icon icon-top"></span>
                <span class="toggler-icon icon-med"></span>
                <span class="toggler-icon icon-bottom"></span>
            </button>
            </div>
                <div class="navbar-nav">
                    
                        <li class='nav-item'>
                            <a href="index.php" class="nav-link">Accueill</a>
                        </li>
                    
                    
                        <li class='nav-item'>
                            <a href="produit.php" class="nav-link">Produits</a>
                        </li>
                   
                    
                        <li class='nav-item'>
                            <a href="contact_Nous.php" class="nav-link">Contact</a>
                        </li>
                
                    
                        <li class='nav-item'>
                            <a href="Nous.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item"  id='close'>
                            <i class='bx bx-x' role="button"></i>
                        </li>
                </div>
        </nav>
    </header>
    <!-- panier section -->
    <div class="panier">
        <?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){ ?>
        <div class="panier-header bg-light"> 
            <div class="head m-2">
            <h6><strong>Votre Panier</strong></h6>     
            <h6> <?php echo count($_SESSION['panier']); ?> articles ajouté </h6>
            </div>
            <a class="btn btn-success m-2"  data-bs-toggle='modal' data-bs-target='#Modal' id='modal-toggle' >Demander</a>
        </div>
        <div class="items">
        <?php foreach($_SESSION['panier'] as $key => $value){ 
             $total = $total + $value['prix'] * $value['qnt'];
             ?>
            <div class="item">
                <img src="<?php echo str_replace('./.','',$value['image'])?>"  alt="">
                <div class="disc">
                <h5> <?php echo $value['name']; ?></h5>
                <h4>Quantité: <strong><?php echo $value['qnt']; ?></strong></h4>
                </div>
                <h2><strong><?php echo $value['prix'] * $value['qnt']; ?></strong></h2>
            </div>

            <?php } ?>
        </div>
        <div class="panier-footer">
            <h2>
            Prix total: 
            <?php echo $total ?>
            DH
            </h2>
            <a href='./panier.php' class="btn btn-info">
                Edit
            </a>
        </div>
        <?php }else{ ?>
        <div class="panier-header bg-light "> 
          <img src="./media/undraw_empty_cart_co35.svg" class="p-4" width="100%" alt="">
          </div>
          <div class="panier-footer d-felx justify-content-center">
              <h4>Votre Panier est vide maintenemt </h4>
          </div>
        <?php } ?>
        
    </div>
    <!-- modal section -->
    <div class="modal fade" id='Modal' tabindex="-1" aria-labelledby="Modellabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" id='saveForm'>
                <div class="modal-header">
                        <h1>Demander</h1>
                         
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="form-control  border-0">
                            <div class="row msg">
                            </div>
                            <div class="row gx-2 my-2">
                               
                                <div class="col-6">
                                    <input type="text" name='fname' id="fname" class="form-control form-control-lg" placeholder="First name">
                                    <div id="fnameErr" class="invalid-feedback">
                                        champ oblegatou
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" name='lname' id="lname" class="form-control form-control-lg" placeholder="last name">
                                    <div id="lnameErr" class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="row  my-2">
                                <div class="col-12">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Votre Email">
                                </div>
                            </div>
                          <div class="row my-2">
                                <div class="col-12">
                                    <input type="text" name="city" id="city" class="form-control form-control-lg" placeholder="city">
                                </div>
                            </div>
                          <div class="row my-2">
                                <div class="col-12">
                                    <input type="text" name="postal" id="postal" class="form-control form-control-lg" placeholder="Code postal">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-12">
                                    <input type="address" name="address" id="address" class="form-control form-control-lg" placeholder="Votre Address">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-12">
                                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Votre  telephone">
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn-primary btn"   id='send-demande' value="Envoyer Votre demande" data-anijs="if: click, do: tada animated" >
                    </div>
                    
            </form>
            </div>
        </div>
    </div>