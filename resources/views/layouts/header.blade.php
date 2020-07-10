<style>
    #header {
        text-align: center;
        width: 100%;
        height: 12%;
    }
</style>

<script type="text/javascript">
    var user_logged = localStorage.getItem('user');
</script>

<header id="header" class="col-xs-12">
    @yield("header")

    <div class="col-md-2 col-lg-2">
        <a href="https://www.wulfarmoir.es/"><img src="{{URL::asset('/img/logo-header.jpg')}}" title="WulfArmoir" alt="WulfArmoir" height="80%" width="100%"></a>
    </div>

    <h1 class="col-xs-8 text-center">Wulf Armoir</h1>

    <a id="login-link" href="./main/login/login.html">` + textHeaderLoginLink() + `</a>
    <a id="logout-link" class="` + showHideLogoutLink() + `" onclick="` + logout() + `" href="./index.html">logout</a>
    
</header>

<script type="text/javascript">
    //set text of login_link
    function textHeaderLoginLink() {
        if (user_logged) {
            return user_logged;
        } else {
            return 'Login';
        }
    }

    //show or hide logout link
    function showHideLogoutLink() {
        if (user_logged) {
            return 'logout-link-inline';
        } else {
            return 'logout-link-hidden';
        }
    }

    function logout() {
        localStorage.removeItem('user');
    }
</script>