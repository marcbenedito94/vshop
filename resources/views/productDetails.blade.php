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
        #big-img-product {
            width: 100%;
        }

        #units-of-product {
            width: 2%;
        }
    </style>
</head>
<body>
<h1>Detalles Producto</h1>

<main id="main">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-md-4 col-lg-4">
                <img id="big-img-product" src="{{ asset('img/productos/' . substr($product_url_img_well,13,-3)) }}">
            </div>
        </div>
    </div>
</main>

<br/><br/>

<button type="button" id="button-subtract-unit" class="mt-10" onclick="addSubtractUnitOfProduct(this.id)" value="subtract">-</button>
<input type="text" id="units-of-product" class="text-center units-of-product" value="1">
<button type="button" id="button-add-unit" class="mt-10" onclick="addSubtractUnitOfProduct(this.id)" value="add">+</button>
            

<a onclick="addProductToCart()">Añadir a la cesta</a>

<script type="text/javascript">
    var id_repeated = false;
    var text_of_units = '';
    var value_of_input_of_units = '';
    var units_of_product_to_cart = '';
    var units_of_product = 0;
    var total_price_of_product = 0;
    var product_details = <?php echo json_encode($product); ?>;
    var cart_of_localStorage = localStorage.getItem('cart');
    cart_of_localStorage = cart_of_localStorage ? JSON.parse(cart_of_localStorage) : [];

    function addProductToCart() {
        checkLocalstorage();
    }

    function addSubtractUnitOfProduct(id_button) {
        text_of_units = document.getElementById('total-price-of-product');
        value_of_input_of_units = parseInt(document.getElementById('units-of-product').value);
        console.log(value_of_input_of_units + ' ' + typeof value_of_input_of_units);

        if (id_button === 'button-add-unit') {
            units_of_product = value_of_input_of_units + 1;
            document.getElementById('units-of-product').value = units_of_product;
            total_price_of_product = units_of_product * product_details['price'];
        } else if (id_button === 'button-subtract-unit') {
            units_of_product = value_of_input_of_units - 1;
            checkZeroUnits();
        }


    }

    function checkZeroUnits() {
        if (units_of_product > 0) {
            document.getElementById('units-of-product').value = units_of_product;
            total_price_of_product = units_of_product * product_details['price'];
        } else if (units_of_product <= 0) {
            units_of_product = 1;
            document.getElementById('units-of-product').value = units_of_product;
            total_price_of_product = units_of_product * product_details['price'];
        }
    }
    
    function checkLocalstorage() {
        if (cart_of_localStorage.length === 0) {
            addThisProductToCart();
        } else {
            checkUnitsOfProduct();
        }
    }

    function checkUnitsOfProduct() {
        for (var index_product_cart = 0; index_product_cart < cart_of_localStorage.length; index_product_cart ++) {
            if (product_details[0].id === cart_of_localStorage[index_product_cart].product_id) {
                addUnitOfProductToCart(cart_of_localStorage[index_product_cart]);
                id_repeated = true;
                break;
            } else {
                id_repeated = false;
            }
        }

        if (!id_repeated) {
            addThisProductToCart();
        }
    }

    function addUnitOfProductToCart(cart_product) {
        // console.log(cart_product);
        cart_product['product_units'] += parseInt(document.getElementById('units-of-product').value);;
        var price_total_product = cart_product['product_price'] * cart_product['product_units'];
        cart_product['product_total_price'] = price_total_product;
        localStorage.setItem("cart", JSON.stringify(cart_of_localStorage));
    }

    function addThisProductToCart() {
        units_of_product_to_cart = parseInt(document.getElementById('units-of-product').value);

        var cart_content = {
            product_id: product_details[0].id,
            product_description: product_details[0].description,
            product_img: product_details[0].url_img,
            product_units: units_of_product_to_cart,
            product_price: product_details[0].price,
            product_total_price: product_details[0].price
        };
    
        cart_of_localStorage.push(cart_content);
        localStorage.setItem("cart", JSON.stringify(cart_of_localStorage));
    }
</script>
</body>
</html>