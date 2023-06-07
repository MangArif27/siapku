@extends('mobile.index')
@section('konten')
@if(empty(Session::get('alert')))
@else
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sisten Informasi Rutan Kelas I Depok</p>
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
    <div data-card-height="cover-full" class="card" style="background-image:url(images/pictures/ImageLogin.jpg)">
        <div class="card-center">
            <div class="text-center">
                <p class="font-600 color-highlight mb-0 font-16"></p>
                <h1 class="font-40 color-white">Register</h1>
            </div>
            <div class="content px-1">
                <form action="{{ route('post.registrasi.mobile') }}" id="FormRegistrasi" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="number" name="nik" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <label for="form1a" class="color-highlight">No Identitas</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="text" name="nama" class="form-control validate-name" id="form1a" placeholder="Nama Sesuai Identitas">
                        <label for="form1a" class="color-highlight">Nama </label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-mars-double"></i>
                        <select name="jk" class="form-control validate-name">
                            <option value="default" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="form1a" class="color-highlight">Jenis Kelamin </label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-home"></i>
                        <input type="text" name="Alamat" class="form-control validate-name" id="form1a" placeholder="Alamat Sesuai Identitas">
                        <label for="form1a" class="color-highlight">Alamat </label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-phone"></i>
                        <input type="number" name="NoHandphone" class="form-control validate-name" type="tel" maxlength="12" id="form1a" placeholder="No Handphone/Whatsapp">
                        <label for="form1a" class="color-highlight">No Hp/Wa </label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" name="Email" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <label for="form1a" class="color-highlight">Email </label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="RegistrasiPassword" class="form-control validate-password" id="form1a" placeholder="Password">
                        <label for="form1a" class="color-highlight">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="row pt-1 mb-1">
                        <div class="col-6 text-start font-11">
                            <i class="fa fa-card"></i>
                            <a class="color-white opacity-50" href="#">Photo Diri</a>
                        </div>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <input type="file" name="PhotoDiri" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="row pt-1 mb-1">
                        <i class="fa fa-adress-card"></i>
                        <div class="col-6 text-start font-11">
                            <a class="color-white opacity-50" href="#">Photo Identitas</a>
                        </div>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <input type="file" name="PhotoIdentitas" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                </form>
                <div class="row pt-1 mb-1">
                    <div class="col-6 text-start font-11">
                        <a class="color-white opacity-50" href="#">Lupa Password</a>
                    </div>
                    <div class="col-6 text-end font-11">
                        <a class="color-white opacity-50" href="/Apk/registrasi">Login</a>
                    </div>
                </div>
                <button type="submit" form="FormRegistrasi" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-1 rounded-s">Simpan</button>
            </div>
        </div>
        <div class="card-overlay bg-black opacity-85"></div>
    </div>
</div>
@endsection