window.onload = ()=>{
    let master = document.getElementById("master");
    let masterCard = document.getElementById("masterCard");
    let shipping = document.getElementById("shipping");
    let shippingInfo =document.getElementById("shippingInfo");
    let payment = document.getElementById("payment");
    let paymentMethod = document.getElementById("paymentMethod");
    let customerInfo = document.getElementById("customerInfo");
    let customer = document.getElementById("customer");
    let ship = document.getElementById("ship");
    let pickup = document.getElementById("pickup");
    let pickupDetail = document.getElementById("pickupDetail");
    let shipDetail = document.getElementById("shipDetail");

    master.addEventListener("click", showMaster);
    shipping.addEventListener("click", showShipping);
    payment.addEventListener("click", showPayment);
    customer.addEventListener("click", showCustomerInfo);
    ship.addEventListener("click", showShip);
    pickup.addEventListener("click", showPickup);
}
function showPickup(){
    pickupDetail.style.display = "block";
    shipDetail.style.display = "none";
}
function showShip(){
    shipDetail.style.display = "block";
    pickupDetail.style.display = "none";
}
function showCustomerInfo(){
    paymentMethod.style.display = "none";
    shippingInfo.style.display = "none";
    customerInfo.style.display = "block";
}
function showPayment(){
    paymentMethod.style.display = "block";
    shippingInfo.style.display = "none";
    customerInfo.style.display = "none";
}
function showShipping(){
    shippingInfo.style.display="block";
    customerInfo.style.display="none";
    paymentMethod.style.display = "none";
    console.log(customerInfo);
}
function showMaster(){
    masterCard.style.display = 'block';
}