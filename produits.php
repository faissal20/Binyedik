
         
<section>
        <div class="container products mt-5x " >
            <div class="row my-5 section-title">
                <div class="col-12 d-flex justify-content-center  entry">
                    <h1>
                        Notre Produits 
                    </h1>
                </div>
            </div>
            <div class="row entry">
            <?php
            $sql = "SELECT * FROM produit WHERE id IN ( 29, 33, 38, 36 )";
            $result = $con->query($sql);
                while($row = $result->fetch_assoc()){
            ?>
                <div class="col-lg-4 col-sm-6 col-12 product ">
                <div class="img-handel"  ><img src="<?php echo str_replace('./.','',$row['image'])?>" download='lazy' width="100%" alt=""></div>   
                <div class="details pt-3">
                    <h2 style='height: 60px; text-align: center;'>
                    
                        <?php
                        $sql = "SELECT c_namee FROM categorie WHERE id ='".$row['categorie']."'";
                        $cat = $con->query($sql);
                        $res = $cat->fetch_assoc();
                  	if($res['c_namee'] == 'Miel naturel'){
                        echo $res['c_namee'].' - '. $row['desc'];
                    	}
                  	else{
                    	echo $res['c_namee'];
                  	}
                    ?>
                            
                    </h2>
                    <p>
                    <?php
                    echo $row['name'];
                    ?>
                    </p>
                    <h2>
                        <?php
                            echo floatval($row['prix']).'DH';
                        ?>
                    </h2>
                    <?php
                    $id = $row['id'];
                    if(isset($_SESSION['panier'][$id])){
                    ?>
                    <a class='btn disabled' role="button" href="addPanier.php?product=<?php echo $id;?>"> deja ou panier</a>
                    <?php
                    } else {
                    ?>
                    <a class='btn' role="button" href="addPanier.php?product=<?php echo $id;?>">Ajouter au panier</a>
                    <?php
                    }
                    ?>
                </div>
                </div>
                <?php
                }
                mysqli_free_result($result);
                ?>
 
                
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    <h4 style="color: white">
                    Découvrez plus de produits <a href="produit.php">ici</a> !
                    </h4>
                </div>
            
        </div>
        </div>
    </section>
