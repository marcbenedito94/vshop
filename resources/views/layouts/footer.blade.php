<style>
    #footer {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1rem;
        background-color: #efefef;
        text-align: center;
    }
</style>

<footer id="footer" class="col-xs-12 text-center">
    @yield('footer')

    <a id="link-aboutus" class="text-center" href="{{ url('/aboutUs') }}">¿Quiénes somos?</a>
</footer>