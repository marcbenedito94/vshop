<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('components/headerLoginLogout/headerLoginLogout.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
      body {
        background-color: #a05000;
      }

      #header {
        height: 70px;
        background-color: #000000;
      }

      #header-logo {
        width: 65%;
      }

      #login-link {
        display: block;
        font-size: 1.5rem;
        color: white;
        cursor: pointer;
      }

      #logged-link {
        display: none;
      }

      #div-logged-menu {
        display: none;
      }

      #nav-list {
          list-style-type: none;
      }

      #sublist1 {
          list-style-type: none;
      }

      #subsublist1 {
          list-style-type: none;
          margin-left: 100px;
      }

      .white {
        color: white;
      }
    </style>

</head>
<body>

<header id="header" class="main-header">
<div class="container">
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2">
      <a onclick="window.location='{{ url("/") }}'"><img id="header-logo" src="{{URL::asset('/img/logo-header.jpg')}}" title="WulfArmoir" alt="WulfArmoir"></a>
    </div>

    <div class="col-xs-8 col-md-8 col-lg-6">
      <h1 id="header-title" class="text-center white">Wulf Armoir</h1>
    </div>

    <div id="header-login-logout" class="col-xs-2 col-md-2 col-lg-2">
      <a id="login-link" onclick="window.location='{{ url("login") }}'">Login</a>
    </div>

    <div id="header-shopping-cart" class="col-xs-2 col-md-2 col-lg-2"></div>

    <!-- <script src="{{ asset('components/headerLoginLogout/headerLoginLogout.js')}}"></script> -->
  </div>
</div>

</header>






<div id="div-nav" class="col-xs-4 col-md-4 col-lg-4 col-md-offset-2">
<a onclick="showHideMenu()">menu</a>

    <nav id="nav" style="display: none;">
        <ul id="nav-list">
            <li id="list1" onclick="showHideSublist1(event)">Recreación Histórica
            <ul id="sublist1" style="display: none;">
            <li>Armas
            <ul id="subsublist1">
                <li id="item-hachas" onclick="window.location='{{ url("rh-armas-hachas") }}'" style="margin-top: -24px;">Hachas</li>
                <li>Lanzas</li>
                <li>Mazas y Martillos de Guerra</li>
                <li id="item-hachas" onclick="window.location='{{ url("rh-armas-dagas") }}'">Dagas</li>
                <li>Espadas</li>
            </ul>
            </li>
            <li id="item-arqueria" style="margin-top: -96px;">Arqueria</li>
            <li class="sublist">Ropa</li>
            <li class="sublist">Competición</li>
            <li class="sublist">Tiendas</li>
            <li class="sublist">Campamento</li>
            </ul>
            </li>
        </ul>
    </nav>
</div>

<main id="main">

  {{ gettype($users_in_bbdd) }}
  {{ count($users_in_bbdd) }}

</main>

  <script type="text/javascript">


    function showHideSublist1(event) {
      var id_sublist1 = document.getElementById(event.target.id).firstElementChild.id;
      var state_sublist1 = document.getElementById(id_sublist1).style.display;

      if (state_sublist1 === 'none') {
        document.getElementById(id_sublist1).style.display = 'block';
      } else {
        document.getElementById(id_sublist1).style.display = 'none';
      }
    }

    function showHideMenu() {
      var state_nav = document.getElementById('nav').style.display;

      if (state_nav === 'none') {
        document.getElementById('nav').style.display = 'block';
      } else {
        document.getElementById('nav').style.display = 'none';
      }
    }

    var user_logged = localStorage.getItem('user');
    var shopping_cart = localStorage.getItem('cart');

    var header_login_logout = document.getElementById('header-login-logout');
    var header_shopping_cart = document.getElementById('header-shopping-cart');

    function userLogged () {
      if (user_logged) {
        return user_logged;
      }
    }

    function displayHideHeaderUserMenu() {
      var logout_link = document.getElementById('logout-link');

      if (!logout_link || null == logout_link || undefined == logout_link) {
        logout_link =
        '<h5 id="logout-link" class="white" onclick="logout()">Logout</h5>';
        $('#header-login-logout').append(logout_link);
      } else {
        $('#logout-link').remove();
      }
    }

    function locateToShoppingCart() {
      window.location = header_shopping_cart_url;
    }

    if (user_logged) {
      var user_logged_menu =
      '<h4 id="logged-link" class="white" onclick="displayHideHeaderUserMenu()">'+userLogged();+'</h4>';
      header_login_logout.innerHTML = user_logged_menu;
      $('#logged-link').css('display', 'block');
    } else {
      $('#login-link').css('display', 'block');
    }

    if (shopping_cart) {
      var header_shopping_cart_url = '{{ url("shopping-cart") }}';
      var header_shopping_cart_content =
      '<h4 id="shopping-cart-link" class="white" onclick="locateToShoppingCart()">Cesta+1</h4>';
      header_shopping_cart.innerHTML = header_shopping_cart_content;
    } else {
      var header_shopping_cart_content =
      '<h4 id="shopping-cart-link" class="white">Cesta0</h4>';
      header_shopping_cart.innerHTML = header_shopping_cart_content;
    }

    function logout() {
      localStorage.removeItem('user');
      window.location = '{{ url("/") }}';
    }
  </script>

  @extends('layouts.footer')

  @section('footer')

  @endsection
</body>
</html>
