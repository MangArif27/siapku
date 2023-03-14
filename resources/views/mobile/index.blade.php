<!DOCTYPE HTML>
<html lang="en">
@include('mobile.partials._head')

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        @if(Request::path() =="Apk/login")
        @else
        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="index.html" class="header-title">SIAPKU</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        </div>
        <div class="page-title page-title-fixed">
            <h1>SIAPKU</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
        </div>
        <div class="page-title-clear"></div>
        @endif
        @include('mobile.partials._footer')
        @yield('konten')
        <!-- Page content ends here-->
        <!-- Main Menu-->

        <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-components">@include('mobile.partials._menu_main')</div>

        <!-- Colors Menu-->
        <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-height="480">
            @include('mobile.partials._menu_color')
        </div>
    </div>
    @include('mobile.partials._scripts')
</body>