var cart = {}; //корзина

function init(){
    $.post(
        "../vendor/core.php", 
        {
            "action" : "loadGoods"
        }
    );
    if(isInCart()){
        $(".single-tovar-form").html("<a class='go-to-cart-button' href='./cart.php'>Перейти к корзине</a>");
    } 
    cartCounter();
}

$(".add-to-cart").on('click', addToCart);

function isInCart(){
    var id = $(".add-to-cart").attr('id');
    var count=0;
    for(var key in cart){
        if(id == key) count++;
    }
    if (count > 0) {
        return true;
    }
    else{
        return false;
    }
}

function cartCounter(){
    var size=0;
    for(var key in cart){
        size++;
    }
    if(size > 0){
        $(".cart-counter").html(size);
        $(".cart-counter").css('backgroundColor', '#f55123');
        $(".cart-counter").css('display', 'inline');
    }
    else{
        $(".cart-counter").css('display', 'none');
    }
}

function addToCart(){
    var id = $(this).attr('id');
    var number = document.getElementById('single-tovar-input');
    if(cart[id]==undefined){
        cart[id] = 1;
    }
    saveCart();
    init();
}

function saveCart(){
    //сохраняем корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}

function loadCart(){
    if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'));
    }
}

$(document).ready(function(){
    loadCart();
    init();
})