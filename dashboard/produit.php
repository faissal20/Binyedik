<?php
    require 'sidbar.php';
    
?>
<div class="home container-fluid m-4 p-4" id='produit'>
        <h1>
        #Produit
        </h1>
        <hr>
        <div class="row pt-4 d-flex justify-content-center">
            <div class="col-2">
            <strong> Id</strong>
            </div>
            <div class="col-2">
            <strong>Categorie</strong>
            </div>
            <div class="col-2">
            <strong>Quantity</strong>
            </div>
            <div class="col-2">
            <strong>Price</strong>
            </div>
            <div class="col-2">
                <strong>delivery</strong> 
            </div>
            <div class="col-2">
                <a href="./addPro.php" class="btn btn-success btn-sm">Add</a>
            </div>
        </div>
        <hr>
        <?php 
            $query = "SELECT P.id,P.name,P.prix,P.livraison,C.c_namee FROM produit AS P, categorie AS C WHERE C.id = P.categorie";
            $produit = $con->query($query);
            while($row1  = $produit->fetch_assoc()){
            ?>
            <div class="row pt-4 d-flex justify-content-center">
            <div class="col-2">
            <strong><?php echo $row1['id']?></strong>
            </div>
            <div class="col-2">
            <strong><?php echo $row1['name']?></strong>
            </div>
            <div class="col-2">
            <strong><?php echo $row1['c_namee']?></strong>
            </div>
            <div class="col-2">
            <strong><?php echo $row1['prix']?></strong>
            </div>
            <div class="col-2">
            <strong><?php echo $row1['livraison']?></strong>
            </div>
            <div class="col-2">
                <a href="RemovePro.php?id=<?php echo $row1['id']?>" class="btn btn-danger btn-sm ">Delete</a>
                <a href="updatePro.php?id=<?php echo $row1['id']?>" class="btn btn-sm btn-info ">Update</a>
            </div>
            </div>
        <?php
                }
        ?>
    </div>
    <?php
    require 'footer.php';
?>