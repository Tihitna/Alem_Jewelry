<?php
$addAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $addAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
$id= $_GET['id'];
if(isset($_POST['addToCartbtn'])){
    $id = $_POST['id'];
    $uniqueID = uniqid();
    $prodsql = "SELECT * FROM product WHERE prodID = '$id' ";
    $prodresult = $conn->query($prodsql);
    if($prodresult->num_rows>0){
        $usersql = "INSERT INTO unique_identifiers (uniqueID) VALUES ('$uniqueID') ";
        $userresult = $conn ->query($usersql);
        $selectuser = "SELECT * FROM unique_identifiers WHERE uniqueID='$uniqueID' ";
        $selectUserResult = $conn->query($selectuser);
        if($selectUserResult->num_rows>0){
            while($rowsuser=mysqli_fetch_assoc($selectUserResult))
                $userID = $rowsuser['userID'];
        }
        
        while($prodRows = mysqli_fetch_assoc($prodresult)){
            $prodQty = $prodRows['qty'] - 1;
            $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
            $cartRetriveResult = $conn->query($cartRetrive);
            if($cartRetriveResult->num_rows>0){
                while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                    $qty = $rowCartRetrive['qty'] + 1;
                    $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                    $sqlAddResult = $conn->query($sqlAdd);
                    $updateProd = "UPDATE product SET qty = '$prodQty' WHERE prodId = $id ";
                    $updateProdResult = $conn->query($updateProd);
                }
            }
            else{
                $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
                $cartresult =$conn->query($cartsql);
                $updateProd = "UPDATE product SET qty = '$prodQty' WHERE prodId = $id ";
                $updateProdResult = $conn->query($updateProd);
            }
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=product_detail&id='.$id.' ">>';

}


$prdDetailSql= "SELECT * FROM product WHERE qty > 0 AND prodID = '$id' ";
$result = $conn->query($prdDetailSql);
if($result->num_rows>0){
    while($rows=mysqli_fetch_assoc($result)){
?>
<div class="productDetail mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- carousel image -->
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $rows['prodImg']; ?>" alt="...">
                        </div>
                        <?php
                        $sql = "SELECT * FROM product_images WHERE product_id ='$id' LIMIT 4";
                        $imagesResult = $conn->query($sql);
                        if($imagesResult->num_rows>0){
                            while($imageRows=mysqli_fetch_assoc($imagesResult)){
                                ?>
                                 <div class="carousel-item">
                                    <img src="<?php echo $imageRows['image_name']; ?>" class="d-block w-100" alt="...">
                                </div>
                                <?php
                            }
                        }
                        ?>
                       
                       
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>



                <!-- other product images -->
                <div class="images mt-3">
                    <div class="row">
                        <?php
                        $sqlsecond = "SELECT * FROM product_images WHERE product_id ='$id' LIMIT 4";
                        $imagessResult = $conn->query($sqlsecond);
                        if($imagessResult->num_rows>0){
                            while($imageRowss=mysqli_fetch_assoc($imagessResult)){
                                ?>
                                                        
                                <div class="col-md-3">
                                    <img src="<?php echo $imageRowss['image_name']; ?>" alt="">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <h3><?php echo $rows['prodTitle'];?></h3>
                    <?php
                    for($i=0; $i<$rows['Rank']; $i++){
                        ?>
                        <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                        <?php
                    }
                    ?>
                    <p><?php echo $rows['prodPrice'];?></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Available Size</h4>
                        <div class="row mt-4 mb-4">
                            <div class="col">
                                <a href="">S</a>
                                <a href="">S</a>
                                <a href="">S</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Available Color</h4>
                        <div class="row mt-4 mb-4 color">
                            <div class="col">
                                <a href=""></a>
                                <a href=""></a>
                                <a href=""></a>
                                <a href=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <p class="left">Last <?php echo $rows['qty'];?> left.</p>
                    <div class="col">
                        
                        <form action="<?php echo $addAction; ?>" name="addF" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                            <input type="submit" name="addToCartbtn" class="btn" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail mt-5">
            <h5>Detail</h5>
            <p><?php echo $rows['prodDes']; ?></p>
        </div>
    </div>
</div>

<div class="related mt-5">
    <div class="container text-center">
        <h2>Related Products</h2>
        <div class="row align-items-start mt-5">
            <?php
            $cat = $rows["categoryID"];
            $sql = "SELECT * FROM product WHERE categoryID = '$cat' AND prodID != '$id' LIMIT 4";
            $res = $conn->query($sql);
            if($res->num_rows>0){
                while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo $row['prodImg'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6><?php echo $row['prodTitle']; ?></h6>
                                        <?php
                                        for($i=0; $i<$row['Rank'];$i++){
                                            ?>
                                            <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                            <?php
                                        }
                                        ?>
                                        <p class="price"><?php echo $row['prodPrice']; ?></p>
                                        <form action="<?php echo $addAction; ?>" name="addF" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                                    <input type="submit" name="addToCartbtn" value="Add To Cart" class="btn">
                                        </form>
                        </div>
                    </div>
                    </div>
                    <?php
                }
            }
            ?>
            
    
         </div>
    </div>
</div>
<?php
    }
}
?>
