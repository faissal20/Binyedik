<?php
    require 'dbcon.php';
    require 'header.php';
    
    ?>
<section class="pt-5 pb-4 ">
    
        <div class="full-panier container mt-5 pt-2 ">
        <?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){
            $totalPrix = 0;
            $maxLiv = 0;
        ?>
        <h1 class='d-flex justify-content-start align-item-center m-4'>
            Votre Panier
        </h1>
        <a href="produit.php" class="m-4">retourner à la page produit</a>
        
        <div class="row content  gy-2  my-4">
        <?php 
            foreach($_SESSION['panier'] as $key => $value){ 
                $totalPrix = $totalPrix + $value['prix'] * $value['qnt'];
                if($value['livraison'] > $maxLiv ){
                    $maxLiv = $value['livraison'];
                }
            ?>
            <div class="row">
                <div class="col-md-6 col-12 d-flex  my-2 ">
                    <img src="<?php echo str_replace('./.','',$value['image'])?>" alt="">
                    <div class="disc">
                        <h5><?php echo $value['name'] ?> <br>
                        description de la produit
                        
                    </h5>
                        
                    </div>
                    
                </div>
                <div class="col-md-2 col-12 d-sm-flex d-xm-block ">
                    <input type="number" class="form-control qnt" name="quantite"  value="<?php echo $value['qnt']?>" min='1' max="10">
                </div>
                <div class="col-md-2 col-12 d-flex justify-content-center  ">  
                    <h5 class="bg-info p-2"> <?php echo $value['prix'] * $value['qnt'] ?> DH</h5>
                </div>
                
                <div class="col-md-2 col-12  d-flex justify-content-center align-items-center rem">
                    <button class="btn remove" >
                        <input type="hidden" name="id" class='idrem' value ='<?php echo $value['id'] ?>'>
                        <i class='bx bx-x'></i>
                    </button>
                </div>
                <hr class="container w-50 my-4">
            </div>
            <?php } ?>
        </div>
        <div class="footer container ">
                <div class="row p-4 ">
                    <div class="col-md-4 col-6 p-4 ">
                        <h4>Produit:</h4>
                        <h4>Livraison: </h4>
                        <hr>
                        <h2>Total:</h2>
                    </div>
                    <div class="col-md-4 col-6 p-4 d-block">
                        <h4><?php echo $totalPrix ?> DH</h4>
                        <h4><?php echo $maxLiv; ?> DH</h4>
                        <hr>
                        <?php $total = $totalPrix + $maxLiv ?>
                        <h2><?php echo $total ?> DH</h2>
                    </div>
                    <div class="col-md-4 col-12 p-4 d-flex justify-content-center align-items-end">
                        <button class="btn btn-lg btn-success rounded-0 " data-bs-toggle='modal' data-bs-target='#Modal' id='modal-toggle'>demander</button>
                    </div>
                   
                </div>
        </div>
        <?php
            }
            else{
                ?>
                <div class="row">
                    <div class="col-12 pb-5">
                        <img src=""  class="empty" alt="">
                        <h5>
                            Votre panier est vide. <a href="produit.php">Notre produits ici !</a>
                        </h5>
                    </div> 
                </div>
            <?php
            } ?>
    </div>
    
    </section>
<?php
    require 'footer.php';
?>