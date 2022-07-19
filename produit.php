<?php
    require 'header.php';
    ?>
<div class="cat-nav mt-5 pt-5 px-5 categories"  >
        <a  data-target="#tous" class="nav-link active" style='color:white !important;'> tous </a>
    <?php
    $sql = 'SELECT id,c_namee FROM categorie';
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
    ?>
        <a data-target="#<?php echo 'cat-'.$row['id'] ?>" role="button" class="nav-link" style='color:white !important;' ><?php echo $row['c_namee'] ?> </a>
    <?php
    }
    ?>   
</div>
<hr class="container categories-pro">
<div class="container products categories-pro">
    <div class="row active" id='tous'>
        <?php
            $sql = "SELECT * FROM produit";
            $result = $con->query($sql);
            while($row = $result->fetch_assoc()){
            ?>
                <div class="col-lg-4 col-sm-6 col-12 product entry">
                <div class="img-handel"  ><img src="<?php echo str_replace('./.','',$row['image'])  ?>" download='lazy' width="100%" alt=""></div>   
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
                    <a class='btn disabled' role="button" href="addPanier.php?product=<?php echo $row['id'];?>"> deja ou panier</a>
                    <?php
                    } else {
                    ?>
                    <a class='btn' role="button" href="addPanier.php?product=<?php echo $row['id'];?>"> Ajouter au panier</a>
                    <?php
                    }
                    ?>
                </div>
                </div>
                <?php
                }
                ?>
    </div>
    
    <?php
    $sql = 'SELECT id,c_namee FROM categorie';
    $result = $con->query($sql);
     while($row = $result->fetch_assoc()){
    ?>
    <div class="row" role="tabpanel"  id="<?php echo 'cat-'.$row['id']?>">
    <?php
            $sql = "SELECT * FROM produit WHERE categorie='".$row['id']."'";
            $pro = $con->query($sql);
            while($rowpro = $pro->fetch_assoc()){
            ?>
                <div class="col-lg-4 col-sm-6 col-12 product entry">
                <div class="img-handel"  ><img src="<?php echo str_replace('./.','',$rowpro['image'])  ?>" download='lazy' width="100%" alt=""></div>   
                <div class="details pt-3">
                    <h2 style='height: 60px; text-align: center;'>
                    <?php
                     if($row['c_namee'] == 'Miel naturel'){
                        echo $row['c_namee'].' - '. $rowpro['desc'];
                    	}
                  	else{
                    	echo $row['c_namee'];
                  	}
                    ?>
                    </h2>
                    <p>
                    <?php
                    echo $rowpro['name'];
                    ?>
                    </p>
                    <h2>
                        <?php
                            
                            echo floatval($rowpro['prix']).'DH';
                        ?>
                    </h2>
                    <?php
                    $id = $rowpro['id'];
                    if(isset($_SESSION['panier'][$id])){
                    ?>
                    <a class='btn disabled' role="button" href="addPanier.php?product=<?php echo $id;?>"> deja ou panier</a>
                    <?php
                    } else {
                    ?>
                    <a class='btn' role="button" href="addPanier.php?product=<?php echo $id?>"> Ajouter au panier</a>
                    <?php
                    }
                    ?>
                </div>
                </div>
                
                <?php
                }
                ?>
               
    </div>
    
    <?php
    }
    ?>
    

</div>

<?php require 'footer.php' ?>     