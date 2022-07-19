<?php
    require './../dbcon.php';
    require 'sidbar.php';

    $sql = 'SELECT * FROM categorie ';
    $res = $con->query($sql);
    $msg = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $deleviry = $_POST['del'];
        $categorie = $_POST['categorie'];
        $image = $_FILES['image']['name'];
        if(empty($name) || empty($price) || empty($deleviry) || empty($categorie) || empty($image)){
            $msg = 'all the boxes are required';
        }else{
                $path = './../produit/';  
                $tmp = $_FILES['image']['tmp_name'];
                $target_file =  $path . basename($_FILES["image"]["name"]);
                $check = getimagesize($tmp);
                if(!$check){
                    $msg  = 'please enter a valid product image';
                }
                else if(file_exists($target_file)){
                    $msg =  'image exist';
                }else if(move_uploaded_file($tmp, $target_file)) {

                    $sql = 'INSERT INTO produit ( name, prix, livraison, categorie, image )values ("'.$name.'","'.$price.'","'.$deleviry.'","'.$categorie.'","'.$target_file.'")';
                    if($con->query($sql)){
                        $msg = 'your operation done succussfuly';
                    }else{
                        $msg = 'error : ' . mysqli_error($con);
                    }
                }else{
                    $msg = 'error';
                }
        }
        }
    ?>
    <div class="container-fluid home  active">
        <div class="row mt-5">
            <h1 class="d-flex justify-content-center">
                Add Produit
            </h1>
            <h6 class="d-flex justify-content-center">
                add a product by insert it image,name,price,delivery price,categorie.
            </h6>
        </div>
        <div class="row p-2 ">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" style="display: flex; flex-direction: column; align-items: center;" enctype="multipart/form-data">
                <div class="col-md-6 col-12" >
                    <label for="name" class="my-2">insert name or quantity</label>
                    <input type="text" class='form-control form-control-lg' name="name" id="name" placeholder='produit + Kg or Litre' >      
                </div>
                <div class="col-md-6 col-12 ">
                    <label for="price" class="my-2">insert price</label>
                    <input type="text" class='form-control form-control-lg' name="price" id="price" placeholder='price ' >      
                </div>
                <div class="col-md-6 col-12">
                    <label for="price" class="my-2">insert price</label>
                    <input type="text" class='form-control form-control-lg' name="del" id="del" placeholder='delivery price' >      
                </div>
                <div class="col-md-6 col-12">
                    <label for="categorie" class="my-2">insert price</label>
                    <select type="text" class='form-select form-select-lg' name="categorie" id="categorie" >
                        <option value="" selected>Select a categorie</option>
                        <?php
                        while($row = $res->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id'] ?>" ><?php echo $row['c_namee'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>      
                </div>
                <div class="col-md-6 col-12 my-2">
                    <p>insert image</p>
                    <label for="image"><p class="btn btn-light btn-lg">upload image</p></label>
                    <input type="file" name="image" id="image" class="d-none">
                </div>
                <div class="col-md-6 col-12  d-flex justify-content-end">
                    <input type="submit" value="insert" class="btn btn-success btn-lg m-1 ">
                    <input type="reset" value="reset" class=" m-1 btn btn-warning btn-lg">
                </div>
                <div class="col-md-6 col-12 alert alert-info m-2">
                   message :  <?php echo  $msg ?>
                </div>
            </form>
        </div>
    </div>
    <?php
        require 'footer.php'
?>