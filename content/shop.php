<?php
$addFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $addFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST['addToCart'])){
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
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=shop">';

}
?>
<div class="container shop mt-5">
<div class="row align-items-start">
    <div class="col-md-2">
      <div class="sidebar">
        <h3 class="text-center">Filter</h3>
        <div class="color mt-4">
            <div class="title" id="color">
                <h4>Color</h4>
                <i class="fa-solid fa-plus" style="color: #000000;"></i>
            </div>
            <div class="titleContent" id="colorContent">
                <input type="checkbox" name="color" id="color"> Black <br>
                <input type="checkbox" name="color" id="color"> Red <br>
                <input type="checkbox" name="color" id="color"> Yellow <br>
                <input type="checkbox" name="color" id="color"> Blue <br>
                <input type="checkbox" name="color" id="color"> Green <br>
                <input type="checkbox" name="color" id="color"> Golden <br>
            </div>
        </div>
        <div class="color mt-4">

            <div class="title" id="category">
                <h4>Category</h4>
                <i class="fa-solid fa-plus" style="color: #000000;"></i>
            </div>
            <div class="titleContent" id="catList">
                <li><a href="index.php?page=shop&cat=ring">Rings</a></li>
                <li><a href="index.php?page=shop&cat=earring">Earrings</a></li>
                <li><a href="index.php?page=shop&cat=necklace">Necklaces</a></li>
                <li><a href="index.php?page=shop&cat=bracelet">Bracelets</a></li>
                <li><a href="index.php?page=shop&cat=set">Jewelry Set</a></li>
            </div>
        </div>
        <div class="color mt-4">

            <div class="title" id="type">
                <h4>Type</h4>
                <i class="fa-solid fa-plus" style="color: #000000;"></i>
            </div>
            <div class="titleContent" id="typeContent">
                <li><a href="index.php?page=shop&type=diamond">Diamond</a></li>
                <li><a href="index.php?page=shop&type=gold">Gold</a></li>
                <li><a href="index.php?page=shop&type=silver">Silver</a></li>
            </div>
        </div>
        <div class="price mt-4" id="price">
            <form action="<?php echo $addFromAction; ?>" name="addForm" method="POST" enctype="multipart/form-data">
                  <p>price</p>
                  <div class="" id="">
                    <div class="range-input-number"></div>
                    <input type="range" class="range-input-bar" id="price-range" min="0" max="200000" name="price" step="10">
                    <input type="submit" value="Filter" name="filter" class="filterbtn">
                  </div>
                </form>
</div>
      </div>
    </div>
    <div class="col-md-10">
        <div class="products">
            <?php
            if(isset($_POST["filter"])){
                include('content/filter/price.php');
            }
            if(!isset($_GET['cat']) && !isset($_GET['type']) &&!isset($_POST['filter'])){
                $sql = "SELECT * FROM product WHERE qty > 0";
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
                                        <form action="<?php echo $addFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $rows['prodID'];?>">
                                                    <input type="submit" name="addToCart" value="Add To Cart">
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
                include('content/filter/category.php');
            }
            if(isset($_GET['type']) && !isset($_POST["filter"])){
               include('content/filter/type.php');
            }
            ?>
        </div>
    </div>
  </div>
</div>
<script>
    const rangeInput = document.querySelector('.range-input-bar');
const number = document.querySelector('.range-input-number');

rangeInput.addEventListener('input', () => {
    number.style.display="block";
  number.textContent = rangeInput.value;
});
</script>
