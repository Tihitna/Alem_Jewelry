<?php
$addTypeFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $addTypeFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST['add_diamond_to_cart'])){
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
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&type=diamond">';

}
if(isset($_POST['add_gold_to_cart'])){
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
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&type=gold">';

}
if(isset($_POST['add_silver_to_cart'])){
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
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop&type=silver">';

}



    if($_GET['type'] == 'diamond'){
        $sqlType = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Diamond' AND qty > 0)";
        $resultType = $conn->query($sqlType);
        if($resultType->num_rows>0){
            ?>
            <div class="row align-items-start">
            <?php
            while($rowsType=mysqli_fetch_assoc($resultType)){
                ?>
                <div class="col-md-3 text-center mt-5">
                    <div class="card">
                        <img src="<?php echo $rowsType['prodImg']; ?>"  class="card-img-top" alt="">
                        <div class="card-body">
                            <h6><?php echo $rowsType['prodTitle']; ?></h6>
                            <?php
                            for($i=0; $i<$rowsType['Rank'];$i++){
                                ?>
                                <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                                <?php
                            }
                            ?>
                            <p class="price"><?php echo $rowsType['prodPrice']; ?></p>
                            <form action="<?php echo $addTypeFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                <input type="submit" value="Add To Cart" name="add_diamond_to_cart">
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
    elseif ($_GET['type'] == 'gold'){
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Gold')";
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
                            <form action="<?php echo $addTypeFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                <input type="submit" value="Add To Cart" name="add_gold_to_cart">
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
    else{
        $sql = "SELECT * FROM product WHERE categoryID IN (SELECT categoryID FROM category WHERE category = 'Silver')";
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
                            <form action="<?php echo $addTypeFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                <input type="submit" value="Add To Cart" name="add_silver_to_cart">
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
?>