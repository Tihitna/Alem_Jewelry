window.onload = ()=>{
    let category = document.getElementById("category");
    let catList = document.getElementById("catList");
    let type = document.getElementById("type");
    let typeContent = document.getElementById("typeContent");

    
    category.addEventListener("click", showCat);
    type.addEventListener("click", showType);

}

function showType(){
    if(typeContent.classList == 'titleContent'){
        typeContent.classList.remove("titleContent");
        typeContent.classList.add("show");
    }
   else{
    typeContent.classList.add("titleContent");
    typeContent.classList.remove("show");
   }
}

function showCat(){
    if(catList.classList == 'titleContent'){
        catList.classList.remove("titleContent");
        catList.classList.add("show");
    }
   else{
    catList.classList.add("titleContent");
    catList.classList.remove("show");
   }
}