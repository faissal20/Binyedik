<?php
    require 'sidbar.php';
  
?>
<div class="home container-fluid m-4 p-4" id='orders'>
        <h1>
        #Orders
        </h1>
        <hr>
        <div class="row pt-4 d-flex ">
            <div class="col-2">
            <strong> User</strong>
            </div>
            <div class="col-2">
            <strong>User email</strong>
            </div>
          	<div class="col-2">
            <strong>User Address</strong>
            </div>
            <div class="col-2">
            <strong>User phone</strong>
            </div>
          	<div class="col-2">
            <strong>Status</strong>
            </div>
            <div class="col-2">
            </div>
        </div>
        <hr>
        <div class="row d-flex justify-content-center">
    <?php
        $sql = 'SELECT DISTINCT user_f,user_l,phone,email,status,address FROM orders ORDER BY order_date DESC';
        $result = $con->query($sql);
        if( $result->num_rows > 0){
            while ($row  = $result->fetch_assoc() ){
            ?>
            <div class="col-2 my-2">
            <strong><?php echo $row['user_f']. ' ' .$row['user_l'] ?></strong>
            </div>
            <div class="col-2 my-2">
            <strong><?php echo $row['email']?></strong>
            </div>
          	<div class="col-2 my-2">
            <strong><?php echo $row['address']?></strong>
            </div>
            <div class="col-2 my-2">
            <strong><?php echo $row['phone']?></strong>
            </div>
          	<div class="col-2 my-2">
            <?php if($row['status'] == NULL || $row['status'] == '0' )  {
              echo 
                'en cours de livraison';
            	}
              else { 
                echo 'livré';
              }
              ?>
            </div>
            <div class="col-2 my-2 d-flex align-items-center ">
                <a href="orders.php?user=<?php echo $row['user_f']?>&userl=<?php echo $row['user_l']?>" class="btn btn-sm btn-success rounded-none">carte</a>
                <a href="deleteOrd.php?user=<?php echo $row['user_f']?>&userl=<?php echo $row['user_l']?>" class="btn btn-sm btn-danger rounded-none">Delete</a>
              <?php if($row['status'] == NULL || $row['status'] == '0')  {
              ?> 
              <a href="changeStatus.php?user=<?php echo $row['user_f']?>&userl=<?php echo $row['user_l']?>" class="btn btn-sm btn-info rounded-none">livré</a>
                <?php
            	}
              else { 
                echo ' ';
              }
              ?>
            </div>
        
        <?php
        }
        ?>
        </div>
        <?php  }else{ ?>
            <div class="alert alert-lg alert-danger">
                    there are no <strong>orders</strong>  right now ! 
            </div>
        <?php } ?>
    </div>
    <?php
    require './footer.php';
?>