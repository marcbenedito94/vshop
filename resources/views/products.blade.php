<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
      body {
        background-color: #a05000;
      }

      #header {
        height: 12%;
        background-color: #000000;
      }

      #header-logo {
        width: 65%;
      }

      #nav {
        z-index: 
      };

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

      #main {
        overflow: scroll;
        z-index: 0;
      }

      .img-product {
        width: 90%;
      }
    </style>
    
</head>
<body>

<header id="header" class="main-header">
<div class="container">
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2">
      <a href="localhost:8000"><img id="header-logo" src="{{URL::asset('/img/logo-header.jpg')}}" title="WulfArmoir" alt="WulfArmoir"></a>
    </div>
        
    <div class="col-xs-8 col-md-8 col-lg-8">
      <h1 id="header-title" class="text-center">Wulf Armoir</h1>
    </div>
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
<div class="container">
<div class="row">
@foreach($products as $product)
  @php
    $product_url_img_in_bbdd = $product->url_img;
    $product_url_img_well = str_replace("_","/",$product_url_img_in_bbdd);
    $product_url_img_full = '/public/img/productos/' . $product_url_img_well;
  @endphp
  <div class="col-md-12 col-lg-12" onclick="window.location='{{ url('product-details/'.$product->id) }}'">
    <div class="row">
      <div class="col-xs-1 col-md-3 col-lg-3 col-md-offset-2 col-lg-offset-2">
        <img class="img-product" src="{{ asset('img/productos/' . $product_url_img_well) }}">
        <!-- <img class="img-product" src="public/img/productos/{{$product_url_img_well}}" title="WulfArmoir" alt="WulfArmoir"> -->
      </div>
      <div class="col-md-6 col-lg-6">
        {{ $product->description }} <br/><br/>
        {{ $product->price }} €
      </div>
      </div>
  </div>
@endforeach
</div>
</div>
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

    
  </script>

@extends('layouts.footer')

@section('footer')

@endsection
</body>
</html>