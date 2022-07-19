
<?php
    require 'sidbar.php';
    
?>
    <div class="home active container-fluide pt-5 bg-light">
    <div class="row d-flex px-5 " style="justify-content: start">
     <a href="index.php" style='text-decoration: none;border: none; border-radius: 12px !important;box-shadow: 0px 0px 5px #0003;width: 40px;height: 40px;' class="col-2 mb-4 d-flex justify-content-center align-items-center" ><i class='bx bx-arrow-back'></i></a>
        <h1 class="col-2 mx-4">
            Orders
        </h1>
    </div>

    <div class="row px-2 py-4  " style=''>
        <div class="col-3 d-flex justify-content-center">
            produit
        </div>
        <div class="col-3 d-flex justify-content-center">
            qantite
        </div>
        <div class="col-3 d-flex justify-content-center">
               prix
        </div> 
        <div class="col-3 d-flex justify-content-center">
            total prix
        </div>
    </div>
    <?php
    if(isset($_GET['user']) && isset($_GET['userl'])){
         $sql = "SELECT qnt,produt_id,name,c_namee,prix,livraison,address from orders as o, produit as p, categorie as c    where o.user_f='".$_GET['user']."' and o.user_l = '".$_GET['userl']."' and c.id = p.categorie and p.id = o.produt_id";
         $result = $con->query($sql);  
      	
         $totalprix = 0;
         $maxLiv = 0;
         if($result->num_rows > 0){
             while($row = $result->fetch_assoc() ){
               	$address = $row['address'];
                 $totalprix = $totalprix +( $row['qnt'] * $row['prix']);
                 if($row['livraison'] > $maxLiv){
                     $maxLiv = $row['livraison'];
                 }
                ?>
                <div class="row p-4 " style=''>

                <div class="col-3 d-flex justify-content-center">
                <?php echo $row['name'].' '.$row['c_namee'];  ?>
                </div> 
                <div class="col-3 d-flex justify-content-center">
                <?php echo $row['qnt']; ?>
                </div> 
                <div class="col-3 d-flex justify-content-center">
                <?php echo $row['prix']; ?>
                </div> 
                  
                <div class="col-3 d-flex justify-content-center"> 
                <?php  echo '<strong>'.$row['qnt'] * $row['prix'] .' </strong>  DH'; ?>
                </div>
                </div>
                <hr class="m-0 bg-info">
                <?php
             }
         ?>
         <div class="row  py-4"  >
             <div class="col-9 d-flex px5" > 
				
             </div>
             
             <div class="col-3 d-flex justify-content-center">
              <stronge><?php echo $totalprix.' DH'; ?></stronge>
             </div>
         </div>
        <?php
         }
    }
   
?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');
        let search  = document.querySelector('.bx-search-alt-2');
        btn.onclick = function(){
            sidebar.classList.toggle('active')
        }
        search.onclick = function(){
            sidebar.classList.toggle('active')
        }
        let slide = document.getElementById('slide_btn');
        let imgs = document.getElementsByTagName('img');
        slide.onclick = function (){
           imgs[0].classList.add('act') 
        }
    </script>
</body>
</html>
