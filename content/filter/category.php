<?php
$addCatFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $addCatFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST['add_to_cart'])){
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
        $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
        $cartRetriveResult = $conn->query($cartRetrive);
        if($cartRetriveResult->num_rows>0){
            while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                $qty = $rowCartRetrive['qty'] + 1;
                $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                $sqlAddResult = $conn->query($sqlAdd);
            }
        }
        else{
            $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
            $cartresult =$conn->query($cartsql);
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&cat=ring">';

}
if(isset($_POST['add_bracelet_to_cart'])){
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
        $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
        $cartRetriveResult = $conn->query($cartRetrive);
        if($cartRetriveResult->num_rows>0){
            while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                $qty = $rowCartRetrive['qty'] + 1;
                $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                $sqlAddResult = $conn->query($sqlAdd);
            }
        }
        else{
            $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
            $cartresult =$conn->query($cartsql);
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&cat=bracelet">';

}
if(isset($_POST['add_necklace_to_cart'])){
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
        $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
        $cartRetriveResult = $conn->query($cartRetrive);
        if($cartRetriveResult->num_rows>0){
            while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                $qty = $rowCartRetrive['qty'] + 1;
                $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                $sqlAddResult = $conn->query($sqlAdd);
            }
        }
        else{
            $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
            $cartresult =$conn->query($cartsql);
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&cat=necklace">';

}
if(isset($_POST['add_earring_to_cart'])){
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
        $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
        $cartRetriveResult = $conn->query($cartRetrive);
        if($cartRetriveResult->num_rows>0){
            while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                $qty = $rowCartRetrive['qty'] + 1;
                $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                $sqlAddResult = $conn->query($sqlAdd);
            }
        }
        else{
            $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
            $cartresult =$conn->query($cartsql);
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&cat=earring">';

}
if(isset($_POST['add_set_to_cart'])){
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
        $cartRetrive = "SELECT * FROM cart WHERE prodId = '$id' ";
        $cartRetriveResult = $conn->query($cartRetrive);
        if($cartRetriveResult->num_rows>0){
            while($rowCartRetrive=mysqli_fetch_assoc($cartRetriveResult)){
                $qty = $rowCartRetrive['qty'] + 1;
                $sqlAdd="UPDATE cart SET qty = '$qty' WHERE prodId = $id ";
                $sqlAddResult = $conn->query($sqlAdd);
            }
        }
        else{
            $cartsql = "INSERT INTO cart (prodId, qty, userID) VALUES ('$id', 1, '$userID')";
            $cartresult =$conn->query($cartsql);
        }
        
    }
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&cat=set">';

}



if(isset($_GET['cat']) && !isset($_POST["filter"])){
    if($_GET['cat'] == 'earring'){
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Earrings' OR parentID = 2 AND qty > 0)";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $id=$rows['prodID'];
            ?>
            <div class="row align-items-start">
            <?php
            while($rows=mysqli_fetch_assoc($result)){
                ?>
                <div class="col-md-3 text-center mt-5">
                    <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
                        <div class="card">
                            <img src="<?php echo $rows['prodImg']; ?>"  class="card-img-top" alt="">
                            <div class="card-body">
                                <h6><?php echo $rows['prodTitle']; ?></h6>
                                <?php
                                for($i=0; $i<$rows['Rank']; $i++){
                                    ?>
                                    <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                    <?php
                                }
                                ?>
                                <p class="price"><?php echo $rows['prodPrice']; ?></p>
                                <form action="<?php echo $addFromAction; ?>" name="addForm21" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                    <input type="submit" value="Add To Cart" name="add_earring_to_cart">
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                

            }?>
            </div>
            <?php
        }
    }
    elseif($_GET['cat'] == 'necklace'){
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Necklaces' OR parentID = 3 AND qty > 0)";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            ?>
            <div class="row align-items-start">
            <?php
            while($rows=mysqli_fetch_assoc($result)){
                ?>
                <div class="col-md-3 text-center mt-5">
                    <div class="card">
                        <img src="<?php echo $rows['prodImg']; ?>"  class="card-img-top" alt="">
                        <div class="card-body">
                            <h6><?php echo $rows['prodTitle']; ?></h6>
                            <?php
                            for($i=0; $i<$rows['Rank'];$i++){
                                ?>
                                <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                <?php
                            }
                            ?>
                            <p class="price"><?php echo $rows['prodPrice']; ?></p>
                            <form action="<?php echo $addCatFromAction; ?>" name="addFor" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                <input type="submit" value="Add To Cart" name="add_necklace_to_cart">
                            </form>
                        </div>
                    </div>
                </div>
                <?php

            }?>
            </div>
            <?php
        }
    }
    elseif($_GET['cat'] == 'bracelet'){
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Bracelet' OR parentID = 4 AND qty > 0)";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            ?>
            <div class="row align-items-start">
            <?php
            while($rows=mysqli_fetch_assoc($result)){
                $id=$rows['prodID'];
                ?>
                <div class="col-md-3 text-center mt-5">
                    <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
                        <div class="card">
                            <img src="<?php echo $rows['prodImg']; ?>"  class="card-img-top" alt="">
                            <div class="card-body">
                                <h6><?php echo $rows['prodTitle']; ?></h6>
                                <?php
                                for($i=0; $i<$rows['Rank'];$i++){
                                    ?>
                                    <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                    <?php
                                }
                                ?>
                                <p class="price"><?php echo $rows['prodPrice']; ?></p>
                                <form action="<?php echo $addCatFromAction; ?>" name="addForm3" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                    <input type="submit" value="Add To Cart" name="add_bracelet_to_cart">
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
                <?php

            }?>
            </div>
            <?php
        }
    }
    elseif($_GET['cat'] == "ring"){
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Rings' OR parentID = 1 AND qty > 0)";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            ?>
            <div class="row align-items-start">
            <?php
            while($rows=mysqli_fetch_assoc($result)){
                $id=$rows['prodID'];
                ?>
                <div class="col-md-3 text-center mt-5">
                    <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
                        <div class="card">
                            <img src="<?php echo $rows['prodImg']; ?>"  class="card-img-top" alt="">
                            <div class="card-body">
                                <h6><?php echo $rows['prodTitle']; ?></h6>
                                <?php
                                for($i=0; $i<$rows['Rank'];$i++){
                                    ?>
                                    <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                    <?php
                                }
                                ?>
                                <p class="price"><?php echo $rows['prodPrice']; ?></p>
                                <form action="<?php echo $addCatFromAction; ?>" name="addForm3" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                    <input type="submit" value="Add To Cart" name="add_to_cart">
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
                <?php

            }?>
            </div>
            <?php
        }
    }
    else{
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Jewelry_Set' OR parentID = 17 AND qty > 0)";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            ?>
            <div class="row align-items-start">
            <?php
            while($rows=mysqli_fetch_assoc($result)){
                $id=$rows['prodID'];
                ?>
                <div class="col-md-3 text-center mt-5">
                    <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
                        <div class="card">
                            <img src="<?php echo $rows['prodImg']; ?>"  class="card-img-top" alt="">
                            <div class="card-body">
                                <h6><?php echo $rows['prodTitle']; ?></h6>
                                <?php
                                for($i=0; $i<$rows['Rank'];$i++){
                                    ?>
                                    <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                    <?php
                                }
                                ?>
                                <p class="price"><?php echo $rows['prodPrice']; ?></p>
                                <form action="<?php echo $addCatFromAction; ?>" name="addForm24" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                    <input type="submit" value="Add To Cart" name="add_set_to_cart">
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
                <?php

            }?>
            </div>
            <?php
        }
    }
}
?>