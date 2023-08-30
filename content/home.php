<?php
$homeFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $homeFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST['addsTocart'])){
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
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=home">';
  }
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img
        src="https://images.pond5.com/box-luxurious-pearl-jewelry-pink-photo-218982993_iconl_nowm.jpeg"
        class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Custom designed diamond rings</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img
        src="https://images.pond5.com/artificial-jewelry-white-box-abstract-photo-137442390_iconl_nowm.jpeg"
        class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Second slide label</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img
        src="https://images.pond5.com/elegant-jewelry-box-beautiful-bijouterie-photo-208537445_iconl_nowm.jpeg"
        class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Second slide label</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pond5.com/stylish-jewelry-pearls-and-box-photo-215813449_iconl_nowm.jpeg" class="d-block w-100"
        alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Second slide label</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.pond5.com/red-gift-box-jewelry-photo-047905838_iconl_nowm.jpeg" class="d-block w-100"
        alt="Albo">
      <div class="carousel-caption d-none d-md-block">
        <h1>Traditional Ethiopian Jewelry</h1>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container text-center features mt-5">
  <div class="row align-items-start title">
    <div class="col">
      <a id="newArrivals">New Arrivals</a>
    </div>
    <div class="col">
      <a id="bestSellers">Best Sellers</a>
    </div>
    <div class="col">
      <a id="mostLiked">Most Liked</a>
    </div>
  </div>
  <!-- New Arrivals -->
  <div class="arrival" id="arrival">
    <div class="row align-items-start mt-5">
      <?php
      $today = date('y/m/d');
      $end = date('y/m/d', strtotime('-7 days'));
      $sqlNewArrivals = "SELECT * FROM product WHERE storedDate <= '$today' and storedDate >= '$end' AND qty > 0 LIMIT 4 ";
      $resultNewArrival = $conn -> query($sqlNewArrivals);
      if($resultNewArrival -> num_rows > 0){
        while($row=mysqli_fetch_assoc($resultNewArrival)){
          $id=$row['prodID'];
          ?>
          <div class="col-md-3">
            <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
              <div class="card">
              <img src="<?php echo $row["prodImg"]; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h6><?php echo $row["prodTitle"]; ?></h6>
                <div class="rate mb-2">
                  <?php
                  for($i=0;$i<$row["Rank"];$i++){
                    ?>
                    <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                    <?php
                  }
                  ?>
                </div>
                <p><?php echo $row['prodPrice']; ?></p>
                <form action="<?php echo $homeFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $row['prodID'];?>">
                  <input type="submit" value="Add To Cart" name="addsTocart">
                </form>
              </div>
              </div>
             </a>
          </div>

          <?php
        }
      }
      ?>
    </div>
  </div>

  <!-- Most Liked -->
  <div class="liked" id="liked">
    <div class="row align-items-start mt-5">
      <?php

      $sqlRate = "SELECT * FROM product WHERE (`Rank` = 5 OR `Rank` = 4) AND qty > 0 LIMIT 4";
      $resultRate = $conn -> query($sqlRate);
      if($resultRate -> num_rows > 0){
        while($rowRate = mysqli_fetch_assoc($resultRate)){
          $id=$rowRate['prodID'];
          ?>
          <div class="col-md-3">
            <a href="index.php?page=product_detail&id=<?php echo $id; ?>">
              <div class="card">
                <img src="<?php echo $rowRate["prodImg"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6><?php echo $rowRate["prodTitle"]; ?></h6>
                  <div class="rate mb-2">
                    <?php
                    for($i=0;$i<$rowRate["Rank"];$i++){
                      ?>
                      <i class="fa-solid fa-star" style="color: #fff47b;"></i>
                      <?php
                    }
                    ?>
                  </div>
                  <p><?php echo $rowRate['prodPrice']; ?></p>
                  <form action="<?php echo $homeFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $rowRate['prodID'];?>">
                    <input type="submit" value="Add To Cart" name="addsTocart">
                  </form>
                </div>
              </div>
            </a>
          </div>
          <?php
        }
      }

      ?>

    </div>
  </div>

  <!-- Best Sellers -->
  <div class="sellers" id="sellers">
    <p>nothing yet</p>
  </div>
</div>

<div class="container text-center mt-5 category">
  <h3>Shop By Category</h3>
  <p>Browse by your favorite categories</p>
  <div class="row align-items-center">
    <div class="col">
    <a href="index.php?page=shop&cat=earring">
      <div class="card">
        <img src="assets/img/earring.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="index.php?page=shop&cat=earring">
            <h5 class="card-title">Earrings</h5>
          </a>
        </div>
      </div>
    </a>
    </div>
    <div class="col">
    <a href="index.php?page=shop&cat=necklace">
      <div class="card">
        <img src="assets/img/necklace.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="index.php?page=shop&cat=necklace">
            <h5 class="card-title">Necklace</h5>
          </a>
        </div>
      </div>
    </a>
    </div>
    <div class="col">
    <a href="index.php?page=shop&cat=bracelet">
      <div class="card">
        <img src="assets/img/bracelet.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="index.php?page=shop&cat=bracelet">
            <h5 class="card-title">Bracelet</h5>
          </a>
        </div>
      </div>
    </a>
    </div>
    <div class="col">
    <a href="index.php?page=shop&cat=ring">
      <div class="card">
        <img src="assets/img/ring.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <a href="index.php?page=shop&cat=ring">
            <h5 class="card-title">Ring</h5>
          </a>
        </div>
      </div>
    </a>
    </div>
    <div class="col">
    <a href="index.php?page=shop&cat=set">
      <div class="card">
        <img
          src="https://media.istockphoto.com/id/172295006/photo/making-a-splash-with-gold-and-diamonds.jpg?b=1&s=612x612&w=0&k=20&c=b4WMzN6qW35PSwELuoKRJOSL-U5w59Hc-afTy-HdgUA="
          class="card-img-top" alt="...">
        <div class="card-body">
          <a href="index.php?page=shop&cat=set">
            <h5 class="card-title">Jewelry Set</h5>
          </a>
        </div>
      </div>
    </a>
    </div>
  </div>
</div>
<div class="off mt-5">
  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col">
        <img
          src="https://media.istockphoto.com/id/493442976/photo/elegant-girl-advertising-jewelry.webp?b=1&s=170667a&w=0&k=20&c=eHOvfjyEPhz8lU-mPvSCrFoz8foV3kGlad6JYVH9dYA="
          alt="">
      </div>
      <div class="col second">
        <p class="holy">Holiday Exclusive</p>
        <h4>30% off</h4>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
        <a class="mt-2" href="index.php?page=shop">Shop Now</a>
      </div>
    </div>
  </div>
</div>
<div class="container text-center testimonial mt-5">
  <h3>Happy customers</h3>

  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="card mt-5">

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://tse3.mm.bing.net/th?id=OIP.j7oTjdH7iPnr-_VMldDBEgHaFj&pid=Api&P=0&h=220" alt="...">
          <div class="card-body">
            <h5 class="card-title">W/ro Muluemebet Molamaru</h5>
            <p class="card-text">Some Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci,
              consequuntur! quick example text to build on the card title and make up the bulk of the
              card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam perferendis
              esse quasi ut eum excepturi? Odit sunt quaerat ipsam commodi.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="https://tse2.mm.bing.net/th?id=OIP.nUnYx1GjVEdf7km72Hf-zwHaHa&pid=Api&P=0&h=220" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mr. Robert Milkway</h5>
            <p class="card-text">Some Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci,
              consequuntur! quick example text to build on the card title and make up the bulk of the
              card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam perferendis
              esse quasi ut eum excepturi? Odit sunt quaerat ipsam commodi.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="https://tse2.mm.bing.net/th?id=OIP.88hQwxL9ILYl7PV_HXgWqgHaE8&pid=Api&P=0&h=220" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mr. Cheng Shi</h5>
            <p class="card-text">Some Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci,
              consequuntur! quick example text to build on the card title and make up the bulk of the
              card's content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam perferendis
              esse quasi ut eum excepturi? Odit sunt quaerat ipsam commodi.</p>
          </div>
        </div>

      </div>

    </div>
  </div>



</div>
<div class="container text-center partners mt-5">
  <h3>Our Partners</h3>
  <div class="row align-items-start mt-5">
    <div class="col">
      <img src="assets/img/p1.svg" alt="partner 1">
    </div>
    <div class="col">
      <img src="assets/img/p2.svg" alt="">
    </div>
    <div class="col">
      <img src="assets/img/p3.svg" alt="">
    </div>
    <div class="col">
      <img src="assets/img/p4.svg" alt="">
    </div>
    <div class="col">
      <img src="assets/img/p5.svg" alt="">
    </div>
    <div class="col">
      <img src="assets/img/p6.svg" alt="">
    </div>
  </div>
</div>
<script src="assets/js/features.js"></script>