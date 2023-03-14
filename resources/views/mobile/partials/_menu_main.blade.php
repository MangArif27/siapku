<div class="card rounded-0 bg-6" data-card-height="150">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28">SIAPKU</h1>
        <p class="mb-2 ps-3 font-12 color-white opacity-50">Sistem Aplikasi Kepegawaian dan Keuangan</p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<h6 class="menu-divider">Menu</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-welcome" href="/Apk/Index">
        <i class="fa fa-home gradient-red color-white"></i>
        <span>Home</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-homepages" href="/Apk/Profile">
        <i class="fa fa-user-circle gradient-green color-white"></i>
        <span>Profile</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-components" href="/Apk/Privacy-Police">
        <i class="fa fa-cog gradient-blue color-white"></i>
        <span>Privacy Police</span>
        <i class="fa fa-angle-right"></i>
    </a>
    @if(Session::get('login')== FALSE)
    <a id="nav-media" href="/Apk/login">
        <i class="fa fa-sign-in-alt gradient-magenta color-white"></i>
        <span>Login</span>
        <i class="fa fa-angle-right"></i>
    </a>
    @else
    <a href="/Apk/logout" id="nav-contact">
        <i class="fa fa-sign-out-alt gradient-teal color-white"></i>
        <span>Logout</span>
        <i class="fa fa-angle-right"></i>
    </a>
    @endif
</div>
<h6 class="menu-divider mt-4">Settings</h6>
<div class="list-group list-custom-small list-menu">
    <a href="#" data-menu="menu-colors">
        <i class="fa fa-brush gradient-highlight color-white"></i>
        <span>Highlights</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider font-10 mt-4" style=" width: 100%; padding-left: 10px; position: absolute; bottom: 0px;">
    Copyright 2023
    <script>
        new Date().getFullYear() <= 2023 && document.write("-" + new Date().getFullYear());
    </script>
    </br>IT Team Mitra Digital Persada.
</h6>