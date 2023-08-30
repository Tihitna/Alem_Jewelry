<?php
$editFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $editFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST["plus"])){
    $id = $_POST['id'];
    $prodID = $_POST['prodID'];
    $prodsql = "SELECT * FROM product WHERE prodID = '$prodID' AND qty > 0 ";
    $prodresult = $conn->query($prodsql);
    if($prodresult->num_rows>0){
        while($prodRows = mysqli_fetch_assoc($prodresult)){
            $prodQty = $prodRows['qty'] - 1;
            $qty = $_POST['qty']+1;
            $sqlAdd="UPDATE cart SET qty = '$qty' WHERE cartID = $id ";
            $sqlAddResult = $conn->query($sqlAdd);
            $updateProd = "UPDATE product SET qty = '$prodQty' WHERE prodID = $prodID ";
            $updateProdResult = $conn->query($updateProd);
        }
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=cart">';
}
if(isset($_POST["minus"])){
    $id = $_POST['id'];
    $prodID = $_POST['prodID'];
    $prodsql = "SELECT * FROM product WHERE prodID = '$prodID'";
    $prodresult = $conn->query($prodsql);
    if($prodresult->num_rows>0){
        while($prodRows = mysqli_fetch_assoc($prodresult)){
            $prodQty = $prodRows['qty'] + 1;
            $qty = $_POST['qty']-1;
            $sqlAdd="UPDATE cart SET qty = '$qty' WHERE cartID = $id ";
            $sqlAddResult = $conn->query($sqlAdd);
            $updateProd = "UPDATE product SET qty = '$prodQty' WHERE prodID = $prodID ";
            $updateProdResult = $conn->query($updateProd);
        }
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=cart">';
}
if(isset($_POST["removing"])){
    $id = $_POST['id'];
    $prodID = $_POST['prodID'];
    $qty = $_POST['qty'];
    $prodsql = "SELECT * FROM product WHERE prodID = '$prodID'";
    $prodresult = $conn->query($prodsql);
    if($prodresult->num_rows>0){
        while($prodRows = mysqli_fetch_assoc($prodresult)){
            $qty += $prodRows['qty'];
            $sqlAdd="DELETE FROM cart WHERE cartID = $id ";
            $sqlAddResult = $conn->query($sqlAdd);
            $updateProd = "UPDATE product SET qty = '$qty' WHERE prodID = $prodID ";
            $updateProdResult = $conn->query($updateProd);
        }
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=cart">';
}

?>
<div class="container cart-container">
  <div class="row align-items-start mt-3">
  <h2 class="text-center mb-5">Shopping Cart</h2>
    <div class="col-md-8">
      <?php
        $cart = "SELECT * FROM cart";
        $result = $conn->query($cart);
        $total = 0;
        if($result->num_rows>0){
            while($row=mysqli_fetch_assoc($result)){
                $prodId = $row['prodId'];
                $prods = "SELECT * FROM product WHERE prodID = '$prodId' AND qty > 0";
                $prodResult = $conn->query($prods);
                if($prodResult->num_rows>0){
                    while($prodrows=mysqli_fetch_assoc($prodResult)){
                        $total += $prodrows['prodPrice'] * $row['qty'];
                        ?>
                        <div class="card mt-1">
                            <div class="row align-items-start">
                                <div class="col-md-6">
                                    <img src="<?php echo $prodrows['prodImg']; ?>" alt="">
                                </div>
                                <div class="col-md-4">
                                    <p><?php echo $prodrows['prodTitle'];?></p>
                                    <div class="row row2 align-items-start">
                                        <div class="col">
                                        <form action="<?php echo $editFromAction; ?>" name="addForm" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $row['cartID'];?>">
                                            <input type="hidden" name="qty" value="<?php echo $row['qty'];?>">
                                            <input type="hidden" name="prodID" value="<?php echo $prodrows['prodID'];?>">
                                            <button name="plus">
                                                <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                            </button>
                                            </div>
                                            <div class="col">
                                                <p><?php echo $row['qty'];?></p>
                                            </div>
                                            <div class="col">
                                                <button name="minus">
                                                    <i class="fa-solid fa-minus" style="color: #ffffff;"></i>
                                                </button>
                                                
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <p><?php echo $prodrows['prodPrice'] * $row['qty'];?></p>
                                    <form action="<?php echo $editFromAction; ?>" name="addForm" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['cartID'];?>">
                                        <input type="hidden" name="qty" value="<?php echo $row['qty'];?>">
                                        <input type="hidden" name="prodID" value="<?php echo $prodrows['prodID'];?>">
                                        <button name="removing">
                                            <a>Remove</a>
                                        </button>
                                    </form>
                                </div>
                            
                            </div>
                        </div>
                    <?php
                }
                }
            }

        }
    ?>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <h3>Summary</h3>
            <p>Total: <?php echo $total; ?></p>
            <a href="index.php?page=checkout" class="checkout">Go To Checkout</a>
            <a href="index.php?page=shop" class="align-items-start">
                <i class="fa-solid fa-arrow-left" style="color:gray;"></i>
                Return to shopping
            </a>
        </div>
    </div>
    
  </div>
</div>