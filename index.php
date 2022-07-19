<?php
    require 'header.php';
?>  
<!-- accuiel section -->
    <section class="container-fluid ">
        <div class="container accuiel" >
            <div class="row " >
                <div class="col-md-8 col-12 title">
                    <br>
                    <h4>Haute qualité et prix raisonnable</h4>
                    <h1>
                        Les meilleurs produits naturels
                    </h1>
                    <hr class="bg-dark"> 
                    <button class="btn" id="discover">
                        <a href="produit.php" style='color: black; text-decoration: none'>Decouvrire</a> 
                    </button>
                    <i class='bx bxs-chevrons-down'></i>
                </div>
            </div>
        </div>
    </section>
<!-- Product section -->
    <?php
        require 'produits.php';
        require 'about.php';
        require 'contact.php';
    ?>
<?php
    require 'footer.php'
?>
