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
        height: 12%;
        background-color: #000000;
      }

      #header-logo {
        width: 65%;
      }

      #header-title {
        color: white;
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

      #p-advise-incorrect-data {
        color: red;
        display: none;
        margin-top: 2%;
        padding: 1% 2%;
        background-color: black;
        margin-left: 38%;
      }

      .btn-send {
        cursor: pointer;
        padding: 1% 2%;
        background-color: white;
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
</div>

</header>

<main id="main" class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <h4>Crear Usuario:</h4>

        <form method="get" action="/checkUserToRegister">
          <input type="text" id="new-user-fullname" name="new-user-fullname"><br/><br/>
          <input type="text" id="new-user-email" name="new-user-email"><br/><br/>
          <input type="text" id="new-user-username" name="new-user-username"><br/><br/>
          <input type="password" id="new-user-password" name="new-user-password"><br/><br/>

          {{ csrf_field() }}

          <input type="submit" id="btn-send-info-newuser" class="btn-send" value="Registrar">
        </form>

        <br/><br/>

        <h4>Entrar:</h4>

        <form method="get" action="/checkUserToLogin">
          <input type="text" id="user-email" name="userEmail"><br/><br/>
          <input type="password" id="user-password" name="userPassword"><br/><br/>

          {{ csrf_field() }}

          <input type="submit" id="btn-send-info-login" class="btn-send" value="Entrar">
        </form>

        <br/><br/>

          <p id="p-advise-incorrect-data" class="col-xs-8 col-md-3 col-lg-3 text-center">Datos no admitidos</p>
      </div>
    </div>
  </div>
</main>

  <script type="text/javascript">

var users_data = {{ $user_in_bbdd }}

console.log(users_data);


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

    function checkUserToLogin() {
      // var text_user_email = $('#user-email').val();
      // var text_user_password = $('#user-password').val();
      // var users_data =
      window.location='{{ url("checkUserToLogin") }}'
      // var is_valid_user = false;
      // console.log(users_data);
      // if (text_user_email && text_user_password) {
      //   // console.log(text_new_user_email);
      //   $(users_data).each(function(item) {
      //      var user_from_bbdd_to_compare = users_data[item].email;
      //      var password_from_bbdd_to_compare = users_data[item].password;
      //
      //      if (text_user_email === user_from_bbdd_to_compare && text_user_password === password_from_bbdd_to_compare) {
      //       is_valid_user = true;
      //      }
      //   });
      //
      //   if (is_valid_user) {
      //     var username = text_user_email.substr(0, text_user_email.indexOf('@'));
      //     localStorage.setItem('user', username);
      //     window.location = '{{ url("/") }}';
      //   } else {
      //     $('#p-advise-incorrect-data').show();
      //   }
      //
      // } else {
      //   $('#p-advise-incorrect-data').show();
      // }
    }

    $(document).ready(function(){
      $("#user-password").keypress(function(event) {
          //no recuerdo la fuente pero lo recomiendan para
          //mayor compatibilidad entre navegadores.
          var key_code = event.which || event.keyCode;
          if(key_code === 13){
            checkUserToLogin();
          }
      });

      $("#new-user-password").keypress(function(event) {
          //no recuerdo la fuente pero lo recomiendan para
          //mayor compatibilidad entre navegadores.
          var key_code = event.which || event.keyCode;
          if(key_code === 13){
            checkUserToRegister();
          }
      });
  });
  </script>

  @extends('layouts.footer')

  @section('footer')

  @endsection
</body>
</html>
