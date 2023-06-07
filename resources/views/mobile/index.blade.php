<!DOCTYPE HTML>
<html lang="en">
@include('mobile.partials._head')

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    @foreach(DB::table('data_aplikasi')->where('nama_aplikasi',"SIRATU CILOK")->get() as $pesan)
    @if($pesan->pesan==1)
    <div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
        <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
        <div class="boxed-text-xl mt-4">
            <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
            <h2 class="font-700 mb-n1">Notifikasi !</h2>
            <p class="color-highlight">Sisten Informasi Rutan Kelas I Depok</p>
            <p>
                {{$pesan->isi_pesan}}
            </p>
            <!-- add hide-cookie to the class to delete the cookie-->
            <a href="#" class="close-menu btn btn-m btn-center-xl rounded-xs shadow-m bg-highlight text-uppercase font-900">Tutup
                Notifikasi</a>
        </div>
    </div>
    @endif
    @endforeach
    <div id="page">
        @if(Request::path() =="Apk/login" || Request::path() =="Apk/registrasi")
        @else
        @if(Session::get('status')=="PEGAWAI")
        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="#" class="header-title">SIAPKU</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        </div>
        <div class="page-title page-title-fixed">
            <h1>SIAPKU</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
        </div>
        <div class="page-title-clear"></div>
        @else
        <div class="header header-fixed header-logo-center header-auto-show">
            <a href="#" class="header-title">SIRATU CILOK</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        </div>
        <div class="page-title page-title-fixed">
            <h1>SIRATU CILOK</h1>
            <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
        </div>
        <div class="page-title-clear"></div>
        @endif
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