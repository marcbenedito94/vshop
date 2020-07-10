<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .item-shopping-cart {
            height: 130px;
        }

        .img-product-cart  {
            width: 80%;
            height: 90%;
            padding: 5% 10%;
        }

        .h-100 {
            height: 100%;
        }

        .mt-33 {
            margin-top: 33%;
        }

        .mt-10 {
            margin-top: 10%;
        }

        .units-of-product {
            width: 20%;
        }        
    </style>
</head>
<body>
<main id="main" class="container">
<div class="row" id="shopping-cart">
</div>
</main>

<a onclick="window.location='{{ url("make-order") }}'">Realizar Pedido</a>

<script type="text/javascript">
    var shopping_cart = document.getElementById('shopping-cart');
    var data = JSON.parse(localStorage.getItem('cart'));
    var aux_img_product = '';
    var img_product = '';
    var array_id_products = [];
    var array_img_products = [];
    var array_description_products = [];
    var array_price_products = [];
    var array_units_products = [];
    var array_total_price_product = [];
    var content_shopping_cart = '';
    var id_button_without_number = '';
    var text_of_units = '';
    var units_of_product = 0;
    var value_of_input_of_units = '';
    var last_number_of_id = '';
    var total_price_of_product = 0;
    var total_price = 0;

    storeDataInArrays();
    printShoppingCart();

    function storeDataInArrays() {
        for (var index_products_to_save = 0; index_products_to_save < data.length; index_products_to_save ++) {
            total_price += data[index_products_to_save].product_price;
            array_id_products.push(data[index_products_to_save].product_id);
            aux_img_product = '/img/productos/' + data[index_products_to_save].product_img;
            img_product = aux_img_product.split('_').join('/');
            array_img_products.push(img_product);
            array_description_products.push(data[index_products_to_save].product_description);
            array_price_products.push(data[index_products_to_save].product_price);
            array_units_products.push(data[index_products_to_save].product_units);
            array_total_price_product.push(data[index_products_to_save].product_total_price);
        }

        console.log(data);
    }

    function printShoppingCart() {
        for (var index_products = 0; index_products < data.length; index_products ++) {
            content_shopping_cart += 
            '<div id="item-shopping-cart-' + index_products + '" class="col-xs-12 col-md-10 col-lg-10 item-shopping-cart">' +
            '<div class="row">' +
            '<div class="col-xs-3 col-md-2 col-lg-2 h-100"><img class="img-product-cart" src="' + array_img_products[index_products] + '"></div>' +        
            '<div class="col-xs-4 col-md-4 col-lg-4 h-100"><p class="mt-10">' + array_description_products[index_products] + '</p></div>' +
            '<div class="col-xs-4 col-md-1 col-lg-1 h-100"><p id="price-of-unit-of-product-'+index_products+'" class="mt-33">' + array_price_products[index_products] + ' €</p></div>' +
            '<div class="col-xs-3 col-md-2 col-lg-2 h-100">' +
            '<button type="button" id="button-subtract-unit-' + index_products + '" class="mt-10" onclick="addSubtractUnitOfProduct(this.id)" value="subtract">-</button>' +
            '<input type="text" id="units-of-product-' + index_products + '" class="text-center units-of-product" value="' + array_units_products[index_products] + '">' +
            '<button type="button" id="button-add-unit-' + index_products + '" class="mt-10" onclick="addSubtractUnitOfProduct(this.id)" value="add">+</button>' +
            '</div>' +
            '<div class="col-xs-4 col-md-2 col-lg-2 h-100"><p id="total-price-of-product-'+index_products+'" class="mt-10">' + array_total_price_product[index_products] + ' €</p></div>' +        
            '</div>' +
            '</div>';
            
        }

        shopping_cart.innerHTML = content_shopping_cart;        
    }    

    function addSubtractUnitOfProduct(id_button) {
        id_button_without_number = id_button.substring(0, id_button.length-2);
        last_number_of_id = id_button.substring(id_button.length-1, id_button.length);
        text_of_units = document.getElementById('total-price-of-product-' + last_number_of_id);
        value_of_input_of_units = parseInt(document.getElementById('units-of-product-' + last_number_of_id).value);
        console.log(value_of_input_of_units + ' ' + typeof value_of_input_of_units);

        if (id_button_without_number === 'button-add-unit') {
            units_of_product = value_of_input_of_units + 1;
            document.getElementById('units-of-product-' + last_number_of_id).value = units_of_product;
            total_price_of_product = units_of_product * array_price_products[last_number_of_id] + ' €';
            text_of_units.innerHTML = total_price_of_product;
        } else if (id_button_without_number === 'button-subtract-unit') {
            units_of_product = value_of_input_of_units - 1;
            checkZeroUnits();
        }


    }

    function checkZeroUnits() {
        if (units_of_product > 0) {
            document.getElementById('units-of-product-' + last_number_of_id).value = units_of_product;
            total_price_of_product = units_of_product * array_price_products[last_number_of_id] + ' €';
            text_of_units.innerHTML = total_price_of_product;
        } else if (units_of_product <= 0) {
            units_of_product = 1;
            document.getElementById('units-of-product-' + last_number_of_id).value = units_of_product;
            total_price_of_product = units_of_product * array_price_products[last_number_of_id] + ' €';
            text_of_units.innerHTML = total_price_of_product;
        }
    }
</script>
</body>
</html>