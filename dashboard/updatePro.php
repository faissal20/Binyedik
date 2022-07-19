<?php
    require './../dbcon.php';
    require 'auth.php';
    $msg = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['del']) && isset($_POST['id']) && isset($_POST['image'])){
        $newprice = $_POST['price'];
        $newdelivery = $_POST['del'];
        $newname = $_POST['name'];
        $id = $_POST['id'];
        $previmage = $_POST['image'];
        // image manepelation 
        $path = './../produit/'; 
        if(!empty($_FILES['image']['name']))
        {   
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $target_file =  $path . basename($_FILES["image"]["name"]);
            if(!getimagesize($tmp)){
                $msg = 'please enter a valid product image';
            }
            else if(file_exists($target_file)){
                $msg =  'this image  exist';
            }
            else if( move_uploaded_file($tmp, $target_file)){
                $sql = 'UPDATE produit SET name = "'.$newname.'", prix = "'.$newprice.'", livraison = "'.$newdelivery.'", image = "'.$target_file.'" WHERE id ="'.$id.'"';
                if( $con->query($sql)){
                    $msg = 'Your operation done successfully ';
                }
                else{
                    $msg = 'error1' . mysqli_error($con);
                }
            }else $msg = 'Error';
            
        }else {
            $sql = 'UPDATE produit SET name = "'.$newname.'" , prix = "'.$newprice.'" , livraison ="'.$newdelivery.'" WHERE id ="'.$id.'" ';
            if( $con->query($sql)){
                $msg = 'Your operation done successfully ';
            }
            else{
                $msg =  'error2 : '. mysqli_error($con);
            }
        }
    }
}
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'SELECT * FROM produit as p WHERE p.id = "'.$id.'" ';
        $resulte = $con->query($sql);
        if($resulte->num_rows > 0){
            $product = $resulte->fetch_assoc();
        require_once './sidbar.php';
            ?> 
            <div class="container home active">
                <div class="row  pt-4 ">
                    <h1>Update</h1>
                    <h2>
                        you can update name, price, delivery price, and product image
                    </h2>
                </div>
                <form class="row  px-5 " action="<?php  echo $_SERVER['PHP_SELF'].'?id='.$id ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-12 p-4">
                        <div class="d-flex justify-content-center mt-4">
                            <img src="<?php  echo $product['image'] ?>" id='product-img' width="400px" height="400px" alt="" style="object-fit: cover;">
                        </div>
                        <input type="file" name='image' id='image' class="btn btn-primary btn-larg form-control my-4" accept="image/gif, image/jpeg, image/png" style="object-fit: cover;">
                    </div>
                    <div class="col-md-6 col-12 px-2 mt-4 mb-5">
                        <div class="row my-4 ">
                            <h2> update product information</h2>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="my-2">change name</label>
                            <input type="text" class='form-control form-control-lg' name="name" id="name" value=" <?php  echo $product['name'] ?>" placeholder='new name or quanity'>
                        </div>
                        <div class="row mb-4 ">
                        <label for="pricee" class="my-2">change price</label>
                        <input type="text" class='form-control form-control-lg' name="price" id="price" value=" <?php  echo $product['prix'] ?>" placeholder='new price' >
                        </div>
                        
                        <div class="row mb-4">
                        <label for="del" class="my-2">change delivery price</label>
                        <input type="text" class='form-control form-control-lg' name="del" id="del" value="<?php  echo $product['livraison'] ?>" placeholder='new delivery price' >
                        </div>
                        <input type="hidden" name='image' value="<?php  echo $product['image'] ?>">
                        <input type="hidden" name="id" id="id" value="<?php  echo $id ?>">
                        <div class="row">
                            <div class="col-4">
                                <input type="submit" value='update' class="btn btn-lg btn-success" id="submit">
                            </div>
                            <div class="col-4">
                                <input type="reset" value='reset' class="btn btn-lg btn-warning" id="reset">
                            </div>
                            <div class="col-10  alert alert-warning m-4">
                                <?php echo  $msg ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                let image = document.getElementById('image');
                let handler = document.getElementById('product-img');
                image.addEventListener('change' , (event) => { 
                    handler.src = URL.createObjectURL(event.target.files[0]);
                    
                })
            </script>
            <?php
        }else {
             echo 'there is an error';
        }
    }
    require './footer.php';
?>
