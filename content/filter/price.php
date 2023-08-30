<?php
$price = $_POST['price'];
$sql = "SELECT * FROM product WHERE prodPrice <= ".$price." AND qty > 0";
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
?>