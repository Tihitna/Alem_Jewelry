window.onload = ()=>{
    
    let mostLiked = document.getElementById("mostLiked");
    let liked = document.getElementById("liked");
    let newArrivals = document.getElementById("newArrivals");
    let arrival = document.getElementById("arrival");
    let bestSellers =document.getElementById("bestSellers");
    let sellers = document.getElementById("sellers");



    mostLiked.addEventListener("click", showLiked);
    newArrivals.addEventListener("click", showNewArrivals);
    bestSellers.addEventListener("click", showBestSellers);
}
function showBestSellers(){
    sellers.style.display = 'block';
    arrival.style.display = 'none';
    liked.style.display = "none";
    console.log("seller");
}
function showNewArrivals(){
    arrival.style.display = 'Block';
    liked.style.display = "none";
    sellers.style.display = 'none';
}
function showLiked(){
    liked.style.display = "Block";
    arrival.style.display = 'none';
    sellers.style.display = 'none';
  }
