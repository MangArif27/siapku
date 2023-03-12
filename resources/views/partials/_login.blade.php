<!DOCTYPE html>
<html lang="en">
@include('partials._head')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <a class="hiddenanchor" id="reset"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('post.login') }}" method="POST">
                        {{ csrf_field() }}
                        <h1>Login</h1>
                        @if(\Session::has('alert'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>{{Session::get('alert')}}</strong>
                        </div>
                        @endif
                        <div>
                            <input type="number" name="nik" id="nik" class="form-control" placeholder="Username" required="" />
                        </div>
                        </br>
                        <div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Belum Punya Akun ?
                            <a href="#signup" class="to_register"> Klik Disini </a>
                        </p>
                    </div>
                    <div class="separator">
                        <p class="change_link">Lupa Password ?
                            <a href="/reseter" class="to_register"> Klik Kembali </a>
                        </p>
                    </div>
                    <div class="separator">
                        <p class="change_link">Jika Ingin Kembali ?
                            <a href="/" class="to_register"> Klik Kembali </a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1><img src="{{ asset('assets/images/Logo_Apk.png') }}" width="50px" alt=""></i> Rutan Kelas I Depok </h1>
                        <p>Copyright © 2019<script>
                                new Date().getFullYear() > 2018 && document.write("-" + new Date().getFullYear());
                            </script>, IT Team Mitra Digital Perkasa</p>
                    </div>
                    </form>
                </section>
            </div>
            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="{{ route('post.register') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h1>Create Account</h1>
                        <div class="form-group">
                            <input type="number" id="nik" name="nik" min="10" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="No Identitas KTP/SIM/PASPORT">
                            </br>
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="text" id="nama" name="nama" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="Nama Sesuai Identitas">
                        </div>
                        <label>Jenis Kelamin *:</label>
                        <p>
                            Laki-Laki : <input type="radio" class="flat" name="jenis_kelamin" id="genderM" value="Laki-Laki" required />
                            Perempuan : <input type="radio" class="flat" name="jenis_kelamin" id="genderF" value="Perempuan" />
                        </p>
                        <div class="form-group">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat (Sesuai KTP)"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" id="no_hp" name="no_hp" min="11" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="No Handphone">
                            </br>
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" min="8" name="password" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Scan KTP <span class="required">*</span></label>
                            <div class="col-md-15 col-sm-15 col-xs-15">
                                <input type="file" id="ktp" name="ktp" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Photo <span class="required">*</span></label>
                            <div class="col-md-15 col-sm-15 col-xs-15">
                                <input type="file" id="photo" name="photo" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Jika Sudah Punya Akun ?
                                <a href="/login" class="to_register"> Klik Disini </a>
                            </p>
                        </div>
                        <div class="separator">
                            <p class="change_link">Lupa Password ?
                                <a href="/reseter" class="to_register"> Klik Kembali </a>
                            </p>
                        </div>
                        <div class="separator">
                            <p class="change_link">Jika Ingin Kembali ?
                                <a href="/" class="to_register"> Klik Kembali </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><img src="{{ asset('assets/images/SMartPAs.png') }}" width="50px" alt=""></i> Rutan Kelas I Depok</h1>
                            <p>Copyright © 2019<script>
                                    new Date().getFullYear() > 2018 && document.write("-" + new Date().getFullYear());
                                </script>, IT Team Mitra Digital Perkasa</p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>