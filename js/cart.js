var cart = {};
var orderCost;
function loadCart(){
    if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'));
        showCart();
    }
    else{
        $(".page-cart .wrapper").html("<h1>В вашей корзине ничего нет</h1>");
    }
}


function showCart(){
    cartCounter();
    if(!isEmpty(cart)){
        $(".page-cart .wrapper").html("<h1>В вашей корзине ничего нет</h1>");
    }
    else{
        $.post(
            "../vendor/core.php", 
            {
                "action" : "loadGoods"
            },
            function(data){
                data = JSON.parse(data);
                var goods = data;
                var sum;
                orderCost = 0;
                var out = '<h1>Корзина</h1>';
                out += '<div class="cart-container">';
                out += '<div class="cart-line">';
                out += '<div class="cart-item">Изображение</div>';
                out += '<div class="cart-item">Наименование</div>';
                out += '<div class="cart-item">Цена</div>';
                out += '<div class="cart-item">Количество</div>';
                out += '<div class="cart-item">Стоимость</div>';
                out += '</div>';
                for(var id in cart){
                    out += '<div class="cart-line">';
                    out += '<div class="cart-item"> <img src="../img/tovar/' + goods[id].img +'" alt=""></div>';
                    out += '<div class="cart-item">' + goods[id].name +'</div>';
                    out += '<div class="cart-item">' + goods[id].price +'</div>';
                    //счетчик товара
                    out += '<div class="cart-item">';
                    out += '<a class="single-tovar-minus" id="single-tovar-minus" data-id="' + id + '">-</a>';
                    out += '<input type="number" class="single-tovar-input" id="single-tovar-input" name="number" value="' + cart[id] + '">';
                    out += '<a class="single-tovar-plus" id="single-tovar-plus" data-id="' + id + '">+</a>';
                    out += '</div>';
                    //конец ячейки счетчика
                    sum = goods[id].price*cart[id];
                    orderCost = orderCost + sum;
                    out += '<div class="cart-item">' + sum + '</div>';
                    out += '<div class="cart-item"><button class="delGoods" data-id="' + id + '"><i class="fas fa-trash"></i></button></div>';
                    out += '</div>';
                }
                out += '</div>';

                //оформление заказа
                out += '<div class="cart-summary">';
                out += '<div class="cart-summary-cost">';
                out += '<div class="cart-summary-cost-item">Итого: ' + orderCost + ' тенге </div>';
                out += '<div class="cart-summary-cost-item">';
                out += '<button class="create-Sth place-order">Оформить заказ</button>';
                out += '</div>';
                out += '</div>';
                out += '</div>';

                /*console.log(out);
                console.log(goods[1].img);*/
                console.log(cart);
                $(".page-cart .wrapper").html(out);
                $(".delGoods").on('click', delGoods);
                $(".single-tovar-minus").on('click', tovarMinus);
                $(".single-tovar-plus").on('click', tovarPlus);
                $(".place-order").on('click', placeOrder);
            }
        );
    }
}

function placeOrder(){
    $.post(
        "../vendor/core.php",
        {
            "action" : "placeOrder",
            'cart' : JSON.stringify(cart),
            'orderCost' : orderCost
        }
    );
    for(var id in cart){
        delete cart[id];
    }
    saveCart();
    showCart();

}

function delGoods(){
    var id = $(this).attr("data-id");
    delete cart[id];
    saveCart();
    showCart();
}

function tovarMinus(){
    var id = $(this).attr("data-id");
    cart[id]--;
    saveCart();
    showCart();
}

function tovarPlus(){
    var id = $(this).attr("data-id");
    cart[id]++;
    saveCart();
    showCart();
}

function saveCart(){
    //сохраняем корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
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

function isEmpty(object){
    for(var key in object)
    if(object.hasOwnProperty(key)) return true;
    return false;
}

$(document).ready(function(){
    loadCart();
})