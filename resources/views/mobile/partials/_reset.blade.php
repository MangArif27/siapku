@extends('mobile.index')
@section('konten')
@if(empty(Session::get('alert')))
@else
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sistem Informasi Rutan Kelas I Cilodong Depok 2.0</p>
        <p>
            {{Session::get('alert')}}
        </p>
        <!-- add hide-cookie to the class to delete the cookie-->
        <a href="#" class="close-menu btn btn-m btn-center-xl rounded-xs shadow-m bg-highlight text-uppercase font-900">Tutup
            Notifikasi</a>
    </div>
</div>
@endif
<div class="page-content pb-0">
    <div data-card-height="cover-full" class="card mb-0" style="background-image:url(images/pictures/ImageLogin.jpg)">
        <div class="card-center">
            <div class="text-center">
                <p class="font-600 color-highlight mb-1 font-16"></p>
                <h1 class="font-40 color-white">Reset Password</h1>
            </div>
            <div class="content px-4">
                <form action="{{ route('post.reset') }}" id="FormLogin" method="POST">
                    {{ csrf_field() }}
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="number" name="NoIdentitas" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <label for="form1a" class="color-highlight">No Identitas</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="text" name="email" class=" form-control validate-password" id="form1a" placeholder="E-mail">
                        <label for="form1a" class="color-highlight">Email/label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                    </div>
                </form>
                <button type="submit" form="FormLogin" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Reset</button>

                <div class="row pt-3 mb-3">
                    <div class="col-6 text-start font-11">
                        <a class="color-white opacity-50" href="/Apk/login">Sudah Punya Akun</a>
                    </div>
                    <div class="col-6 text-end font-11">
                        <a class="color-white opacity-50" href="/Apk/registrasi">Buat Akun</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-overlay bg-black opacity-85"></div>
    </div>
</div>
@endsection