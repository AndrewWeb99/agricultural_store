var d = document;

var minus = d.getElementById("single-tovar-minus");
var plus = d.getElementById("single-tovar-plus");
var input = d.getElementById("single-tovar-input");


 
function incr(){
    var count = input.value;
    count++;
    input.value = count;
}
function decr(){
    var count = input.value;
    if(input.value <= 1){
        input.value = 1;
    } else{
        count--;
    }
    input.value = count;
}

var menu = d.getElementById("myTopnav");

d.getElementById("nav-toogle").onclick = menuopen;

function menuopen(){
    if(menu.classList.contains("myTopnav-hide")){
        menu.classList.add("myTopnav-active");
        menu.classList.remove("myTopnav-hide");
    }   
    else if(menu.classList.contains("myTopnav-active")){
        menu.classList.add("myTopnav-hide");
        menu.classList.remove("myTopnav-active");
    }
}


