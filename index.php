<?php
require_once('config/config.php');
$cartsql="SELECT * FROM CART";
$cartResult = $conn->query($cartsql);
$count = 0;
if($cartResult->num_rows>0){
  while($cartrows=mysqli_fetch_assoc($cartResult)){
    $count += $cartrows['qty'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="Jewelry shop, Ethiopian Jewelry">
  <link href="https://fonts.cdnfonts.com/css/athena" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/script.js"></script>
    <title>Home</title>
  
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand" href="index.php">
          <img src="assets/img/Alem.png" alt="Alem">
        </a>
      </div>
      <div class="navmenubar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="index.php?page=home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=contact" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=shop" class="nav-link">Shop</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=checkout" class="nav-link">Login/Signup</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=cart" class="nav-link">
              <img src="assets/img/cart.svg" width="20px" alt="Jewelry cart"><i><?php echo $count;?></i>
            </a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
  <!-- content -->

  <?php
    $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : "home";
    include('content/'.$_GET["page"].'.php');
  ?>
  <!-- footer -->
  <div class="footer mt-5">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-1 img">
          <img src="assets/img/Alem.png" width="180px" alt="alem logo">
        </div>
        <div class="col-3 footer-menu">
          <ul>
            <li>
              <a href="index.php?page=home">Home</a>
            </li>
            <li>
              <a href="index.php?page=about">About</a>
            </li>
            <li>
              <a href="index.php?page=contact">Contact</a>
            </li>
            <li>
              <a href="index.php?page=shop">Products</a>
            </li>
          </ul>
        </div>
        <div class="col-1 category">
          <h5>Categories</h5>
          <ul>
            <li>
              <a href="index.php?page=shop&cat=ring">Rings</a>
            </li>
            <li>
              <a href="index.php?page=shop&cat=necklace">Necklace</a>
            </li>
            <li>
              <a href="index.php?page=shop&cat=earring">Earring</a>
            </li>
            <li>
              <a href="index.php?page=shop&cat=bracelet">Bracelets</a>
            </li>
          </ul>
        </div>
        <div class="col-2 text-center contact">
          <h5 class="mb-3">Contact us</h5>
          <p>+25161245446</p>
          <p>alemjewelry@gmail.com</p>
          <ul class="social ">
            <li><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></li>
            <li><i class="fa-brands fa-pinterest" style="color: #ffffff;"></i></li>
            <li><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></li>
            <li><i class="fa-brands fa-telegram" style="color: #ffffff;"></i></li>
            <li><i class="fa-brands fa-tiktok" style="color: #ffffff;"></i></li>
          </ul>
        </div>
        <div class="col-2 member">
          <h5>Become a member</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, harum.</p>
          <a href="">Join Now</a>
        </div>
        <div class="col-12 text-center copyRight">
          <p>©2023 Alem Jewelry. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>