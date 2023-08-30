<?php 
$cartAddFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $cartAddFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
$cartsql="SELECT * FROM CART";
$cartResult = $conn->query($cartsql);
$count = 0;

if(isset($_POST['submit'])){
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$country = $_POST["country"];
$state = $_POST["state"];
$address = $_POST["address"];
$postal = $_POST["postal"];

$check = "SELECT * FROM customer WHERE custEmail = '$email' ";
$checkResult = $conn->query($check);
if($checkResult->num_rows<1){
    $sql = "INSERT INTO customer (custFirstName, custLastName, custEmail, phoneNum, address, country, state, postalCode) VALUES ('$fname', '$lname', '$email', '$phone', '$address', '$country', '$state', '$postal') ";
    $result = $conn->query($sql);
}
$retrive = "SELECT * FROM customer WHERE custEmail = '$email' ";
$retriveResult = $conn->query($retrive);
if($retriveResult->num_rows>0){
    while($rows=mysqli_fetch_assoc($retriveResult)){
        $id = $rows['custID'];
    }
}



}
?>
<div class="container checkout mt-5">
    <h2>Checkout</h2>
  <div class="row align-items-start">
    <div class="col-md-8">
        <div class="row align-items-start">
            <div class="col" id="customer">
                <a>Customer info</a>
            </div>
            <div class="col" id="shipping">
                <a>Shipping info</a>
            </div>
            <div class="col" id="payment">
                <a>Payment method</a>
            </div>
        </div>
        <!-- Customer info -->
        <form action="<?php echo $cartAddFromAction; ?>" name="addForm" method="POST" enctype="multipart/form-data">
             <div class="customerInfo" id="customerInfo">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname">
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname">
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                    <!-- <div class="col-md-6 mt-4">
                        <button type="submit" class="btn">Next</button>
                    </div> -->
                    
                </div>
                
            </div>

            <!-- Shipping info -->
            <div class="shippingInfo" id="shippingInfo">
                <div class="row align-items-start mt-3">
                    <h4>Delivery Method</h4>
                    <div class="radio">
                        <div class="row align-items-start">
                            <div class="col">
                                <input type="radio" id="ship" name="ship" value="Ship"> 
                                <i class="fa-solid fa-truck" style="color: #3b3b3b;"></i>
                                Ship
                            </div>
                            <div class="col">
                                <input type="radio" id="pickup" name="ship" value="pickup">
                                <i class="fa-solid fa-store" style="color: #000000;"></i>
                                Pick Up
                            </div>
                        </div>
                    </div>

                    <!-- pickup -->
                    <div class="pickup" id="pickupDetail">
                        <div class="card" style="width: 100%">
                            <p>Address 1: Piassa in front of ...</p>
                        </div>
                    </div>
                    <!-- ship -->
                    <div class="ship" id="shipDetail">
                        <div class="row align-items-start">
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" id="country">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="postal">Postal Code</label>
                                    <input type="text" class="form-control" name="postal" id="postal">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6 mt-4">
                        <button type="submit" name="submit" class="btn">Submit</button>
                    </div>
                 </div>
            </div>

            <!-- Payment Methods -->
            <div class="payment" id="paymentMethod">
                <div class="row align-items-start">
                    <div class="pay">
                        <div class="row align-items-start">
                            <div class="col">
                                <a href="https://www.paypal.com/signin">
                                    <img src="assets/img/paypal.svg" alt="">
                                </a> 
                            </div>
                            <div class="col">
                                <a id="master">
                                    <img src="assets/img/mastercard.svg" alt="">
                                </a>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Master Card -->
                    <div class="master" id="masterCard">
                        <div class="row align-items-start mt-3">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="card" placeholder="Card no">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="code" placeholder="CVV">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="expire" placeholder="Expire Date YY/MM/DD">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="amount" placeholder="Enter Amount">
                            </div>
                            <div class="col-md-6 mt-4">
                                <button type="submit" class="btn">Done</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>


    <div class="col-md-4">
        <div class="card">
            <h3>
                Shopping Cart
                <i><?php echo $count;?></i>
            </h3>
            <div class="card-body">
                <ul>
                    <?php
                    
                    if($cartResult->num_rows>0){
                        while($cartrows=mysqli_fetch_assoc($cartResult)){
                            $prodId = $cartrows['prodId'];
                            $total = 0;
                            $prods = "SELECT * FROM product WHERE prodID = '$prodId'";
                            $prodResult = $conn->query($prods);
                            if($prodResult->num_rows>0){
                                while($prodrows=mysqli_fetch_assoc($prodResult)){
                                    $total += $prodrows['prodPrice'] * $cartrows['qty'];
                                    ?>
                                    <li class="mt-2">
                                        <img src="<?php echo $prodrows['prodImg']; ?>" alt="">
                                        <p><?php echo $prodrows['prodTitle'];?></p>
                                    </li>
                                    <?php
                                }
                            }
                            else{
                                echo 'empty';
                            }
                        }
                    }
                    ?>
                    <li class="mt-4">
                        <p>Total:</p>
                        <p><?php echo $total;?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   
  </div>
</div>
<script src="assets/js/checkout.js"></script>