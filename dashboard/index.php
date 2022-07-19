<?php
    require './sidbar.php';
    if(isset($_GET['user']) && isset($_GET['userl'])){
        $sql = "DELETE FROM orders WHERE user_f='".$_GET['user']."' and user_l='".$_GET['user']."'";
        $con->query($sql);
    }
?>
    <div class="home container-fluid m-4 p-4 active" id='main'>
        <h1>
        #main
        </h1>
        <hr>
        <div class="row  gy-4 py-4">
            <div class="col-md-3 col-10  mx-2 h-100 bg-primary rounded-2">
                <h4  class='py-4' style="text-align:center; color: white;">
                    nombre de produit
                </h4>
                <h1  class='py-5' style="display: grid; justify-items:center; color: white;  ">
                <?php 
                $sql = 'SELECT * FROM produit';
                $result = $con->query($sql);
                echo count($result->fetch_all());
                ?>
                </h1>
                <h4 class='py-4' style="text-align:center">
                    <a href="" class='btn btn-outline-light'>See All</a> 
                </h4>
            </div>
            <div class="col-md-3 mx-2 col-10 bg-success rounded-2">
                <h4  class='py-4' style="text-align:center; color: white;">
                nombre de ventes
                </h4>
                <h1  class='py-5' style="display: grid; justify-items:center; color: white;  ">
                    <?php 
                    $sql = "SELECT * FROM orders where status = 'livré'";
                    $result = $con->query($sql);
                    echo count($result->fetch_all());
                    ?>
                </h1>
                <h4 class='py-4' style="text-align:center">
                    <a href="" class='btn btn-outline-light'>See All</a> 
                </h4>
            </div>
            <div class="col-md-3 mx-2 col-10 bg-warning rounded-2">
                <h4  class='py-4' style="text-align:center; color: white;">
                nombre de commandes
                </h4>
                <h1  class='py-5' style="display: grid; justify-items:center; color: white;  ">
                <?php 
                $sql = 'SELECT distinct user_f,user_l FROM orders';
                $result = $con->query($sql);
                echo count($result->fetch_all());
                ?>
                </h1>
                <h4 class='py-4' style="text-align:center">
                    <a href="" class='btn btn-outline-light'>See All</a> 
                </h4>
            </div>
            </div>
        </div>
    </div>
    <?php
    require './footer.php';
?>